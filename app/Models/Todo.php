<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date_depart',
        'date_fin',
        'priority',
        'admin_id',
        'moderator_id',
        'active'

    ];
}
