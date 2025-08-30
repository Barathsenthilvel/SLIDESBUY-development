<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MigrateProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:migrate-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate existing product images to assets/media/products directory';

    /**
     * Execute the console command.
     *
     * @return int
     */
        public function handle()
    {
        $this->info('Setting up product images directory...');

        $productsDir = public_path('assets/media/products');

        // Create directory if it doesn't exist
        if (!File::exists($productsDir)) {
            File::makeDirectory($productsDir, 0755, true);
            $this->info("✓ Created directory: {$productsDir}");
        } else {
            $this->info("✓ Directory already exists: {$productsDir}");
        }

        // Check if directory is writable
        if (is_writable($productsDir)) {
            $this->info("✓ Directory is writable");
        } else {
            $this->warn("⚠ Directory is not writable. Please check permissions.");
        }

        $this->info("\nSetup completed! Images will be stored in: {$productsDir}");
        return 0;
    }
}
