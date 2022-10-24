<?php

namespace Database\Seeders;

use App\Models\Faq\FaqCategory;
use App\Models\Faq\FaqQuestion;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FaqCategory::factory()->count(6)->create();
        FaqQuestion::factory(100)->create();
    }
}
