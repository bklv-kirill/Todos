<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Filterable;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "title",
        "discription",
        "user_id",
    ];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class)->orderByDesc("id");
    }
}
