<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Werhouse extends Model
{
    use HasFactory;
    protected $fillable=["werhouse_name","werhouse_adresse","werhouse_capacity"];
    public function product(){
        return $this->hasMany(Product::class);
    }
}