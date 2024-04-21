<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable=[
    "purchase_date",
    "purchase_nbr",
    "purchase_status",
    "purchase_type",
];
public function purchaseDetail(){
    return $this->hasMany(PurchaseDetail::class);
}
}