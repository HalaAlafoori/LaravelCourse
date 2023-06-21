<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //protected $fillable=['name'];
    protected $table='categories';
    //  public $timestamp=false;
    public $timestamps = false;
    protected $guarded=['id'];

    public function products(){
        return $this->belongsToMany(Product::class,'product_id');
    }
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
