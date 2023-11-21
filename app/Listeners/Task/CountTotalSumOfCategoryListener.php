<?php

namespace App\Listeners\Task;


use App\Events\Task\StoredTaskEvent;
use App\Models\Category;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CountTotalSumOfCategoryListener implements ShouldQueue
{
    /**
//     * Create the event listener.
//     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StoredTaskEvent $event): void
    {
        $category = Category::find($event->task->category_id);
        $category->update([
            'total_price' => $category->tasks->sum('price')
        ]);

    }
}
