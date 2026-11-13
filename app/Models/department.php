<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Employee;


class department extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name'];

    // public function employees(): HasMany
    // {
    //     return $this->hasMany(Employee::class);
    // }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
