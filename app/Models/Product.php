<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        "product_name",
        "product_code",
        "buying_price",
        "selling_price",
        "stock",
        "product_image",
    ];
    public function categorie(){
        return $this->hasOne(Categorie::class);
    }
    public function brand(){
        return $this->hasOne(Brand::class);
    }
    public function unite(){
        return $this->hasOne(Unite::class);
    }
    public function werhouse(){
        return $this->hasOne(Werhouse::class);
    }
    public function purchaseDetail(){
        return $this->hasMany(PurchaseDetail::class);
    }
}