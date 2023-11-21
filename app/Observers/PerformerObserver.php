<?php

namespace App\Observers;

use App\Models\Performer;
use Illuminate\Support\Facades\Log;

class PerformerObserver
{
    /**
     * Handle the Performer "created" event.
     */
    public function created(Performer $performer): void
    {

        Log::channel('performer')->info('Успешно создано', ['performer' => $performer]);
    }

    /**
     * Handle the Performer "updated" event.
     */
    public function updated(Performer $performer): void
    {

        Log::channel('performer')->info('Успешно обновлено', ['performer' => $performer]);
    }

    /**
     * Handle the Performer "deleted" event.
     */
    public function deleted(Performer $performer): void
    {
        Log::channel('performer')->info('Успешно удалено', ['performer' => $performer]);
    }

    /**
     * Handle the Performer "restored" event.
     */
    public function restored(Performer $performer): void
    {
        //
    }

    /**
     * Handle the Performer "force deleted" event.
     */
    public function forceDeleted(Performer $performer): void
    {
        //
    }
}
