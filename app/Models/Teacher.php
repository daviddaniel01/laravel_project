<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'email',
        'password',
        'avatar',
        'course_id',
        'birthdate',
        'status',
    ];

    public function getGenderAttribute(): string
    {
        return ($this->attributes['gender'] === 0) ? 'Nam' : 'Nữ';
    }

    public function getAgeAttribute(): int
    {
        return date_diff(date_create($this->attributes['birthdate']), date_create('now'))->y;
    }
}
