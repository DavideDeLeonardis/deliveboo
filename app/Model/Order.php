<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Dish;

class Order extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'address',
        'date',
        'time',
        'price_total',
        'created_at',
        'updated_at',
    ];

    public function dishes()
    {
        return $this->belongsToMany('App\Model\Dish')
            ->withPivot('quantity')
            ->withTrashed()
            ->withTimestamps();
    }

    public function payment()
    {
        return $this->belongsTo('App\Model\Payment');
    }
}
