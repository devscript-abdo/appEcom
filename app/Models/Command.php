<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;


    protected $fillable = [
        'command_number',
        'command_quantity',
        'command_price',
        'product',
        'status',
        'payment_status',
        'payment_method',
        'code',
        'notes',
        'nom',
        'prenom',
        'email',
        'tele',
        'ville',
        'address',
        'lead_id',
        'product_id',
        'moderator_id',
        'delivery_id',
    ];

    public function lead()
    {

        return $this->belongsTo('App\Models\Lead');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function moderator()
    {
        return $this->belongsTo('App\Models\Moderator');
    }
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }


    public function getFullNameAttribute()
    {
        return "{$this->nom} {$this->prenom}";
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->command_number = 'CMD-' . strtoupper(uniqid());
        });
    }
}
