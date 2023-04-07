<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\InvoiceItem;

class InvoiceItemObserver
{
    /**
     * Handle the InvoiceItem "created" event.
     */
    public function created(InvoiceItem $invoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'create';
        $activity->table = $invoiceItem->getTable();
        $activity->record_id = $invoiceItem->id;
        $activity->save();
    }

    /**
     * Handle the InvoiceItem "updated" event.
     */
    public function updated(InvoiceItem $invoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'update';
        $activity->table = $invoiceItem->getTable();
        $activity->record_id = $invoiceItem->id;
        $activity->save();
    }

    /**
     * Handle the InvoiceItem "deleted" event.
     */
    public function deleted(InvoiceItem $invoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'delete';
        $activity->table = $invoiceItem->getTable();
        $activity->record_id = $invoiceItem->id;
        $activity->save();
    }

    /**
     * Handle the InvoiceItem "restored" event.
     */
    public function restored(InvoiceItem $invoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'restore';
        $activity->table = $invoiceItem->getTable();
        $activity->record_id = $invoiceItem->id;
        $activity->save();
    }

    /**
     * Handle the InvoiceItem "force deleted" event.
     */
    public function forceDeleted(InvoiceItem $invoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'force_delete';
        $activity->table = $invoiceItem->getTable();
        $activity->record_id = $invoiceItem->id;
        $activity->save();
    }
}
