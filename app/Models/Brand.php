<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = [

        'name',
        'slug',
        'status',
        'category_id'
    ];

    public function  category(){

        return $this->belongsTo(Category::class,'category_id','id');

    }
}
