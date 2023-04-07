<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\InvoiceDiscount;

class InvoiceDiscountObserver
{
    /**
     * Handle the InvoiceDiscount "created" event.
     */
    public function created(InvoiceDiscount $invoiceDiscount): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'create';
        $activity->table = $invoiceDiscount->getTable();
        $activity->record_id = $invoiceDiscount->id;
        $activity->save();
    }

    /**
     * Handle the InvoiceDiscount "updated" event.
     */
    public function updated(InvoiceDiscount $invoiceDiscount): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'update';
        $activity->table = $invoiceDiscount->getTable();
        $activity->record_id = $invoiceDiscount->id;
        $activity->save();
    }

    /**
     * Handle the InvoiceDiscount "deleted" event.
     */
    public function deleted(InvoiceDiscount $invoiceDiscount): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'delete';
        $activity->table = $invoiceDiscount->getTable();
        $activity->record_id = $invoiceDiscount->id;
        $activity->save();
    }

    /**
     * Handle the InvoiceDiscount "restored" event.
     */
    public function restored(InvoiceDiscount $invoiceDiscount): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'restore';
        $activity->table = $invoiceDiscount->getTable();
        $activity->record_id = $invoiceDiscount->id;
        $activity->save();
    }

    /**
     * Handle the InvoiceDiscount "force deleted" event.
     */
    public function forceDeleted(InvoiceDiscount $invoiceDiscount): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'force_delete';
        $activity->table = $invoiceDiscount->getTable();
        $activity->record_id = $invoiceDiscount->id;
        $activity->save();
    }
}
