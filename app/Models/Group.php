<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = ['name', 'description', 'location'];

    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;


    // define relationship with users table and User model
    public function users() {
        return $this->hasMany(User::class);
    }
}
