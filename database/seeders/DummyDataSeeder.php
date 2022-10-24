<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Asset\Database\Seeders\AssetSeeder;
use Modules\Content\Database\Seeders\ContentDatabaseSeeder;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CrmSeeder::class,
            ProductSeeder::class,
            ContentDatabaseSeeder::class,
            AssetSeeder::class,
            FaqSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
