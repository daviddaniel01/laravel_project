<?php

namespace App\Models;

use App\Enums\StudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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

    public function getGenderNameAttribute(): string
    {
        return ($this->attributes['gender'] === 0) ? 'Nam' : 'Nữ';
    }

    public function getAgeAttribute(): int
    {
        return date_diff(date_create($this->attributes['birthdate']), date_create('now'))->y;
    }

    public function getStatusAttribute(): string
    {
        return StudentStatusEnum::getKeyByValue($this->attributes['status']);
    }
}
