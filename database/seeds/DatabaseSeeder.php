<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Cleanup
        $publicDisk = Storage::disk('public');
        foreach ($publicDisk->directories() as $directory) {
            $publicDisk->deleteDirectory($directory);
        }
        
        $this->call(ProductsTableSeeder::class);
    }
}
