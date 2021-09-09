<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = array('id','name','description','price','photo');

    public function product() {
        return $this->belongsTo('product');
    }
}
