<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'skill', 'bio', 'group_id'];


    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    // define relationship with groups table and Group model
    public function group() {
        return $this->belongsTo(Group::class);
    }
}
