<?php

namespace App\Http\Filters;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends AbstractFilter
{
    public const TITLE = 'title';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
        ];

    }


    public function title(Builder $builder, $value) {
        $builder->where('title', 'like', "%$value%");
    }
}
