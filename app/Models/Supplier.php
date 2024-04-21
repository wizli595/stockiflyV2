<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable=[
        "supplier_shop_name",
    ];
    public function user(){
        return $this->belongsTo(User::class);
        
    }
}