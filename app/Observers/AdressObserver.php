<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Adress;

class AdressObserver
{
    /**
     * Handle the Adress "created" event.
     */
    public function created(Adress $adress): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'create';
        $activity->table = $adress->getTable();
        $activity->record_id = $adress->id;
        $activity->save();
    }

    /**
     * Handle the Adress "updated" event.
     */
    public function updated(Adress $adress): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'update';
        $activity->table = $adress->getTable();
        $activity->record_id = $adress->id;
        $activity->save();
    }

    /**
     * Handle the Adress "deleted" event.
     */
    public function deleted(Adress $adress): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'delete';
        $activity->table = $adress->getTable();
        $activity->record_id = $adress->id;
        $activity->save();
    }

    /**
     * Handle the Adress "restored" event.
     */
    public function restored(Adress $adress): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'restore';
        $activity->table = $adress->getTable();
        $activity->record_id = $adress->id;
        $activity->save();
    }

    /**
     * Handle the Adress "force deleted" event.
     */
    public function forceDeleted(Adress $adress): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'force_delete';
        $activity->table = $adress->getTable();
        $activity->record_id = $adress->id;
        $activity->save();
    }
}
