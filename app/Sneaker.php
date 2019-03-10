<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Sneaker extends Model
{
    protected $fillable = ['user_id','brand_id','name', 'slug', 'description','release','available', 'price','sport','colorway','size','cover'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
