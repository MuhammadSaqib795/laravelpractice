<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // protected $fillable = [
    //     'name',
    //     'city',
    //     'age',
    //     'book_id',
    //     'department_id',
    // ];
    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function department()
    {
        return $this->belongsTo(department::class);
    }
   
}
