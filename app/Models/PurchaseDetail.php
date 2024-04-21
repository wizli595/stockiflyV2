<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        "quantite",
        "unite_cost", 
        "total",   
    ];
    public function purchase(){
        return $this->hasOne(Purchase::class);
    }
    public function product(){
        return $this->hasOne(Product::class);
    }
}