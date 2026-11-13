<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        // 'salary',
        'department_id',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(department::class);
    }
}
