<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\User;
use App\Notifications\StockLowNotification;

class CheckProductStock extends Command
{
    protected $signature = 'check:product-stock';
    protected $description = 'Check product stock and send notifications if stock is low';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $products = Product::where('stock', '<=', 5)->get();
        $users = User::where('role','==','stock manager');

        foreach ($products as $product) {
            foreach ($users as $user) {
                $user->notify(new StockLowNotification($product));
            }
        }

        $this->info('Low stock notifications have been sent.');
    }
}
