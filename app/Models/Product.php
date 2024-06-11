<?php
namespace App\Models;

use App\Mail\StockLowMail;
use App\Notifications\StockLowNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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


    protected static function boot()
    {
        parent::boot();

        static::updated(function ($product) {
            if ($product->stock <= 5) {
                $stockManagers = User::where('role', 'stock manager')->get();
                
                foreach ($stockManagers as $manager) {
                    Log::info('Sending email and notification to stock manager', ['email' => $manager->email]);
                    Mail::to($manager->email)->send(new StockLowMail($product));
                    $manager->notify(new StockLowNotification($product)); 
                }
            }
        });
    }

}