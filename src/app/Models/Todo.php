<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Filterable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "title",
        "discription",
        "is_done",
        "group_id",
        "user_id",
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class)->withDefault(["title" => "Без группы"]);
    }
}
