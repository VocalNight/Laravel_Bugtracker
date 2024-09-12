<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bug extends Model
{
    use HasFactory;

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class, 'CreatedBy');
    }

    public function assignedTo(): BelongsTo {
        return $this->belongsTo(User::class, 'AssignedTo');
    }

    public $timestamps = false;

    protected $fillable = [
        'title',
        'Project',
        'Description',
    ];
}
