<?php

namespace App\Http\FIlters\Todo;

use App\Http\Filters\AbstractFilter;

use Illuminate\Database\Eloquent\Builder;

class TodoFilter extends AbstractFilter
{
    public const TITLE = "title";
    public const GROUP_ID = "group_id";
    public const STATUS = "status";
    public const DATE = "date";

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, "title"],
            self::STATUS => [$this, "status"],
            self::DATE => [$this, "date"],
            self::GROUP_ID => [$this, "groupId"],
        ];
    }

    public function title(Builder $builder, $title)
    {
        $builder->where("title", "LIKE", "%{$title}%");
    }

    public function groupId(Builder $builder, $groupId)
    {
        $builder->where("group_id", $groupId);
    }

    public function status(Builder $builder, $status)
    {
        if ($status === "all") $builder->get();
        else $status === "done" ? $builder->where("is_done", true) : $builder->where("is_done", false);
    }

    public function date(Builder $builder, $date)
    {
        if ($date === "new") $builder->orderByDesc("id")->get();
    }
}