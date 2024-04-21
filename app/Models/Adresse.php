<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable=[
        "adresse_name",
    ];
    public function customer(){
        return $this->hasMany(Customer::class);

    }

}
