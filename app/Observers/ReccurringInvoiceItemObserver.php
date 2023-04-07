<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\ReccuringInvoiceItem;

class ReccurringInvoiceItemObserver
{
    /**
     * Handle the ReccuringInvoiceItem "created" event.
     */
    public function created(ReccuringInvoiceItem $reccuringInvoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'create';
        $activity->table = $reccuringInvoiceItem->getTable();
        $activity->record_id = $reccuringInvoiceItem->id;
        $activity->save();
    }

    /**
     * Handle the ReccuringInvoiceItem "updated" event.
     */
    public function updated(ReccuringInvoiceItem $reccuringInvoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'update';
        $activity->table = $reccuringInvoiceItem->getTable();
        $activity->record_id = $reccuringInvoiceItem->id;
        $activity->save();
    }

    /**
     * Handle the ReccuringInvoiceItem "deleted" event.
     */
    public function deleted(ReccuringInvoiceItem $reccuringInvoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'delete';
        $activity->table = $reccuringInvoiceItem->getTable();
        $activity->record_id = $reccuringInvoiceItem->id;
        $activity->save();
    }

    /**
     * Handle the ReccuringInvoiceItem "restored" event.
     */
    public function restored(ReccuringInvoiceItem $reccuringInvoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'restore';
        $activity->table = $reccuringInvoiceItem->getTable();
        $activity->record_id = $reccuringInvoiceItem->id;
        $activity->save();
    }

    /**
     * Handle the ReccuringInvoiceItem "force deleted" event.
     */
    public function forceDeleted(ReccuringInvoiceItem $reccuringInvoiceItem): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'force_delete';
        $activity->table = $reccuringInvoiceItem->getTable();
        $activity->record_id = $reccuringInvoiceItem->id;
        $activity->save();
    }
}
