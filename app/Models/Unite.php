<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    protected $fillable=["unit_name"];
    public function product(){
        return $this->hasMany(Product::class);
    }
}  