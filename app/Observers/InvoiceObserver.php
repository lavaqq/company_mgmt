<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Invoice;

class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     */
    public function created(Invoice $invoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'create';
        $activity->table = $invoice->getTable();
        $activity->record_id = $invoice->id;
        $activity->save();
    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'update';
        $activity->table = $invoice->getTable();
        $activity->record_id = $invoice->id;
        $activity->save();
    }

    /**
     * Handle the Invoice "deleted" event.
     */
    public function deleted(Invoice $invoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'delete';
        $activity->table = $invoice->getTable();
        $activity->record_id = $invoice->id;
        $activity->save();
    }

    /**
     * Handle the Invoice "restored" event.
     */
    public function restored(Invoice $invoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'restore';
        $activity->table = $invoice->getTable();
        $activity->record_id = $invoice->id;
        $activity->save();
    }

    /**
     * Handle the Invoice "force deleted" event.
     */
    public function forceDeleted(Invoice $invoice): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'force_delete';
        $activity->table = $invoice->getTable();
        $activity->record_id = $invoice->id;
        $activity->save();
    }
}
