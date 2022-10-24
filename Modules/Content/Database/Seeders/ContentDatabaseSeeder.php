<?php

namespace Modules\Content\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Content\Entities\ContentCategory;
use Modules\Content\Entities\ContentPage;
use Modules\Content\Entities\ContentTag;

class ContentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ContentCategory::factory(15)->create();
        ContentTag::factory(25)->create();

        ContentPage::factory(100)
            ->hasCategories(ContentCategory::all()->random(rand(1,4)))
            ->hasTags(ContentTag::all()->random(rand(4,10)))
            ->create();
    }
}
