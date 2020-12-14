<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'banque',
        'code_delivery',
        'client',
        'total',
        'type',
        'designation',
        'admin_id',
        'delivery_id',
        'command_id',
        'client_id',
    ];


    public function admin(){

        return $this->belongsTo('App\Models\Admin');
    }

    public function delivery(){

        return $this->belongsTo('App\Models\Delivery');
    }
}
