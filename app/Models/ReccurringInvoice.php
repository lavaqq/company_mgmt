<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class ReccurringInvoice extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function reccurringInvoiceItems(): HasMany
    {
        return $this->hasMany(ReccurringInvoiceItem::class);
    }
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
    public function getTotalExclTax(): float
    {
        $totalItem = $this->reccurringInvoiceItems()->sum('amount');
        $totalExclTax = $totalItem;
        return $totalExclTax;
    }
    public function getTotalInclTax(): float
    {
        $totalItem = $this->reccurringInvoiceItems()->sum('amount');
        $taxRate = $this->tax_rate;
        $totalItem += $totalItem * ($taxRate / 100);
        $totalInclTax = $totalItem;
        return $totalInclTax;
    }
    public function getTotalTax(): float
    {
        $totalItem = $this->reccurringInvoiceItems()->sum('amount');
        $taxRate = $this->tax_rate;
        $totalTax = $totalItem * ($taxRate / 100);
        return $totalTax;
    }

    public static function scopeActive()
    {
        $currentDate = Carbon::now();
        $reccurringInvoices = ReccurringInvoice::where(function ($query) use ($currentDate) {
            $query->where('end_date', '>=', $currentDate)
                ->orWhere('is_indefinite_duration', true);
        })
            ->get();
        return $reccurringInvoices;
    }

    public function getIssueDates()
    {
        $startDate = Carbon::parse($this->start_date);
        $frequency = $this->frequency;
        $issueDates = array();

        if ($this->is_indefinite_duration) {
            $endDate = $startDate->copy()->addYear();
        } else {
            $endDate = Carbon::parse($this->end_date);
        }

        switch ($frequency) {
            case 'weekly':
                $interval = '1 week';
                break;
            case 'monthly':
                $interval = '1 month';
                break;
            case 'quarterly':
                $interval = '3 months';
                break;
            case 'yearly':
                $interval = '1 year';
                break;
        }
        $date = $startDate->copy();
        while ($date <= $endDate) {
            $issueDates[] = $date->format('Y-m-d');
            $date->add($interval);
        }
        return $issueDates;
    }

    public function needsToCreateInvoice()
    {
        $currentDate = Carbon::now();
        $startDate = Carbon::parse($this->start_date);
        $frequency = $this->frequency;
        $latestInvoice = $this->invoices()->latest()->first();
        if (!$latestInvoice) {
            return true;
        }
        if ($latestInvoice->issue_date < $startDate->format('Y-m-d')) {
            return true;
        }
        $issueDates = $this->getIssueDates();
        $nextIssueDate = null;
        foreach ($issueDates as $issueDate) {
            if ($issueDate > $latestInvoice->issue_date) {
                $nextIssueDate = $issueDate;
                break;
            }
        }
        if ($nextIssueDate && $nextIssueDate <= $currentDate->format('Y-m-d')) {
            return false;
        }
        switch ($frequency) {
            case 'weekly':
                $interval = '1 week';
                break;
            case 'monthly':
                $interval = '1 month';
                break;
            case 'quarterly':
                $interval = '3 months';
                break;
            case 'yearly':
                $interval = '1 year';
                break;
        }
        if ($this->is_indefinite_duration && $latestInvoice->issue_date >= $currentDate->copy()->sub($interval)->format('Y-m-d')) {
            return true;
        }
        return false;
    }
}
