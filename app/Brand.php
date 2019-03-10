<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $fillable = ['user_id','name','description', 'owner','slug', 'url','createDate'];


  public function sneakers()
  {
      return $this->hasMany(Sneaker::class);
  }


}
