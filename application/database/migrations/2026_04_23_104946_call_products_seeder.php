<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'ProductsSeeder',
            '--force' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Product::truncate();
    }
};
