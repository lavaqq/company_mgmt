<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\ReccurringInvoice;

class ReccurringInvoiceObserver
{
    /**
     * Handle the ReccurringInvoice "created" event.
     */
    public function created(ReccurringInvoice $reccurringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'create';
        $activity->table = $reccurringInvoice->getTable();
        $activity->record_id = $reccurringInvoice->id;
        $activity->save();
    }

    /**
     * Handle the ReccurringInvoice "updated" event.
     */
    public function updated(ReccurringInvoice $reccurringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'update';
        $activity->table = $reccurringInvoice->getTable();
        $activity->record_id = $reccurringInvoice->id;
        $activity->save();
    }

    /**
     * Handle the ReccurringInvoice "deleted" event.
     */
    public function deleted(ReccurringInvoice $reccurringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'delete';
        $activity->table = $reccurringInvoice->getTable();
        $activity->record_id = $reccurringInvoice->id;
        $activity->save();
    }

    /**
     * Handle the ReccurringInvoice "restored" event.
     */
    public function restored(ReccurringInvoice $reccurringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'restore';
        $activity->table = $reccurringInvoice->getTable();
        $activity->record_id = $reccurringInvoice->id;
        $activity->save();
    }

    /**
     * Handle the ReccurringInvoice "force deleted" event.
     */
    public function forceDeleted(ReccurringInvoice $reccurringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'force_delete';
        $activity->table = $reccurringInvoice->getTable();
        $activity->record_id = $reccurringInvoice->id;
        $activity->save();
    }
}
