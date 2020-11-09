<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'photo',
        'description',
        'quantity',
        'category_id',
        'active',
        'inStock',
        'commands',
        'admin_id',
        'moderator_id',
        'category_id'

    ];
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'active',
        'moderator_id',
        'admin_id',
        'inStock',
        'slug',
        'commands'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category')->where('type', 'products');
    }

    public function moderator()
    {
        return $this->belongsTo('App\Models\Moderator', 'moderator_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }

    public function commands()
    {

        return $this->hasMany('App\Models\Command');
    }



    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUserAttribute()
    {

        if ($this->admin_id) {

            return $this->admin->fullname;
        }
        if ($this->moderator_id) {

            return $this->moderator->fullname;
        }
        return;
    }
}
