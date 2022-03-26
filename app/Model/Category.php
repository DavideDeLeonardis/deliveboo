<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('user_id', 'category_id');
    }
}
