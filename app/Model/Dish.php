<?php

namespace App\Model;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'slug',
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function createSlug($name)
    {
        $slug = Str::slug($name, '-');

        $oldDish = Dish::where('slug', $slug)->first();

        $counter = 0;
        while ($oldDish) {
            $newSlug = $slug . '-' . $counter;
            $oldDish = Dish::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }

}
