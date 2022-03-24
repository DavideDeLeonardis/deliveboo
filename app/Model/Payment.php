<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'type',
        'created_at',
        'updated_at',
    ];

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }
}
