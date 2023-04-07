<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\ReccuringInvoice;

class ReccurringInvoiceObserver
{
    /**
     * Handle the ReccuringInvoice "created" event.
     */
    public function created(ReccuringInvoice $reccuringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'create';
        $activity->table = $reccuringInvoice->getTable();
        $activity->record_id = $reccuringInvoice->id;
        $activity->save();
    }

    /**
     * Handle the ReccuringInvoice "updated" event.
     */
    public function updated(ReccuringInvoice $reccuringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'update';
        $activity->table = $reccuringInvoice->getTable();
        $activity->record_id = $reccuringInvoice->id;
        $activity->save();
    }

    /**
     * Handle the ReccuringInvoice "deleted" event.
     */
    public function deleted(ReccuringInvoice $reccuringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'delete';
        $activity->table = $reccuringInvoice->getTable();
        $activity->record_id = $reccuringInvoice->id;
        $activity->save();
    }

    /**
     * Handle the ReccuringInvoice "restored" event.
     */
    public function restored(ReccuringInvoice $reccuringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'restore';
        $activity->table = $reccuringInvoice->getTable();
        $activity->record_id = $reccuringInvoice->id;
        $activity->save();
    }

    /**
     * Handle the ReccuringInvoice "force deleted" event.
     */
    public function forceDeleted(ReccuringInvoice $reccuringInvoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'force_delete';
        $activity->table = $reccuringInvoice->getTable();
        $activity->record_id = $reccuringInvoice->id;
        $activity->save();
    }
}
