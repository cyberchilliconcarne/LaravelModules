<?php

namespace Modules\Asset\Database\Seeders;

use Modules\Asset\Entities\Asset;
use Modules\Asset\Entities\AssetCategory;
use Modules\Asset\Entities\AssetLocation;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssetLocation::factory()->create(['name' => 'Inventory']);
        AssetLocation::factory()->count(20)->create();

        $assetsCategories = collect([
            'Computer',
            'Keyboard',
            'Mouse',
            'Audio',
            'Key-Card',
            'Monitor',
        ]);

        $assetsCategories->each(fn ($asset) => AssetCategory::factory()->create([
            'name' => $asset
        ]));

        Asset::factory(100)->create();
    }
}
