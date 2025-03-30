<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateProductSlugs extends Command
{
    protected $signature = 'products:generate-slugs';
    protected $description = 'Generate slugs for products that do not have one';

    public function handle()
    {
        $products = Product::whereNull('slug')->get();
        $count = 0;

        foreach ($products as $product) {
            $product->slug = Str::slug($product->name);
            $product->save();
            $count++;
        }

        $this->info("Generated slugs for {$count} products.");
    }
}
