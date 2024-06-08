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
        "categorie_id" ,
        "werhouse_id" ,
        "brand_id" ,
        "unite_id" ,
    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function unite(){
        return $this->belongsTo(Unite::class);
    }
    public function werhouse(){
        return $this->belongsTo(Werhouse::class);
    }
    public function purchaseDetail(){
        return $this->hasMany(PurchaseDetail::class);
    }
}