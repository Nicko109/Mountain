<?php

namespace App\Jobs\Performer;

use App\Models\Performer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private array $performer, private array $data){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $performer = Performer::findOrFail($this->performer['id']);
        $performer->fill($this->data)->save();
    }
}
