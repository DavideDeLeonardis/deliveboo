<?php

namespace App\Model;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'image',
        'price',
        'availability',
        'course',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Model\Order');
    }
}
