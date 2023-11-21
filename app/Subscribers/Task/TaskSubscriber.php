<?php

namespace App\Subscribers\Task;

use App\Events\Task\StoredTaskEvent;
use App\Models\Category;
use Illuminate\Events\Dispatcher;

class TaskSubscriber
{
//    /**
//     * Handle user login events.
//     */
//    public function countTotalSumOfCategory(StoredTaskEvent $event)
//    {
//        $category = Category::find($event->task->category_id);
//        $category->update([
//            'total_price' => $category->tasks->sum('price')
//        ]);
//    }
//
//    /**
//     * Register the listeners for the subscriber.
//     *
//     * @return array<string, string>
//     */
//    public function subscribe(Dispatcher $events): array
//    {
//        return [
//            StoredTaskEvent::class => 'countTotalSumOfCategory',
//        ];
//    }
}
