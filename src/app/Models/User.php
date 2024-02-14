<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "login",
        "email",
        "password",
    ];

    public function setPasswordAttribute(string $password)
    {
        $this->attributes["password"] = Hash::make($password);
    }
}
