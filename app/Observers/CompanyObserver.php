<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Company;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     */
    public function created(Company $company): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'create';
        $activity->table = $company->getTable();
        $activity->record_id = $company->id;
        $activity->save();
    }

    /**
     * Handle the Company "updated" event.
     */
    public function updated(Company $company): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'update';
        $activity->table = $company->getTable();
        $activity->record_id = $company->id;
        $activity->save();
    }

    /**
     * Handle the Company "deleted" event.
     */
    public function deleted(Company $company): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'delete';
        $activity->table = $company->getTable();
        $activity->record_id = $company->id;
        $activity->save();
    }

    /**
     * Handle the Company "restored" event.
     */
    public function restored(Company $company): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'restore';
        $activity->table = $company->getTable();
        $activity->record_id = $company->id;
        $activity->save();
    }

    /**
     * Handle the Company "force deleted" event.
     */
    public function forceDeleted(Company $company): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->user()->id;
        $activity->action = 'force_delete';
        $activity->table = $company->getTable();
        $activity->record_id = $company->id;
        $activity->save();
    }
}
