<?php

namespace App\Http\Filters;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TaskFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const DEADLINE = 'deadline';
    public const IS_FINISHED = 'is_finished';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';
    public const CATEGORY_ID = 'category_id';
    public const COMPLAINT = 'complaint';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::DEADLINE => [$this, 'deadline'],
            self::IS_FINISHED => [$this, 'isFinished'],
            self::PRICE_FROM => [$this, 'priceFrom'],
            self::PRICE_TO => [$this, 'priceTo'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::COMPLAINT => [$this, 'complaint'],
        ];

    }


    public function title(Builder $builder, $value) {
        $builder->where('title', 'like', "%$value%");
    }
    public function description(Builder $builder, $value) {
        $builder->where('description', 'like', "%$value%");
    }
    public function deadline(Builder $builder, $value) {
        $deadline = \Carbon\Carbon::parse($value)->format('Y-m-d');
        $builder->whereDate('deadline', $deadline);
    }

    public function isFinished(Builder $builder, $value)
    {

        $builder->where('is_finished', $value);
    }

    public function priceFrom(Builder $builder, $value) {
        $builder->where('price', '>=', $value);
    }
    public function priceTo(Builder $builder, $value) {
        $builder->where('price', '<=', $value);
    }
    public function categoryId(Builder $builder, $value) {
        $builder->where('category_id',  $value);
    }
    public function complaint(Builder $builder, $value)
    {
        $builder->whereHas('complaints', function ($query) use ($value) {
            $query->where('title', 'like', "%$value%");
        });
    }
}
