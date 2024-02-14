<?php

namespace App\Http\Filters\Group;

use App\Http\Filters\AbstractFilter;

use Illuminate\Database\Eloquent\Builder;

class GroupFilter extends AbstractFilter
{
    public const TITLE = "title";
    public const DATE = "date";
    
    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, "title"],
            self::DATE => [$this, "date"],
        ];
    }

    public function title(Builder $builder, $title)
    {
        $builder->where("title", "LIKE", "%{$title}%");
    }

    public function date(Builder $builder, $date)
    {
        if ($date === "new") $builder->orderByDesc("id")->get();
    }
} 