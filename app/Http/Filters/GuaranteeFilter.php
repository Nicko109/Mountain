<?php

namespace App\Http\Filters;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class GuaranteeFilter extends AbstractFilter
{
    public const NUMBER = 'number';
    public const TASK_ID = 'task_id';



    protected function getCallbacks(): array
    {
        return [
            self::NUMBER => [$this, 'number'],
            self::TASK_ID => [$this, 'taskId'],
        ];

    }


    public function number(Builder $builder, $value) {
        $builder->where('number', 'like', "%$value%");
    }
    public function taskId(Builder $builder, $value) {
        $builder->where('task_id',  $value);
    }

}
