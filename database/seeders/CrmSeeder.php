<?php

namespace Database\Seeders;

use App\Models\Crm\CrmCustomer;
use App\Models\Crm\CrmDocument;
use App\Models\Crm\CrmNote;
use Illuminate\Database\Seeder;

class CrmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CrmCustomer::factory()->count(30)->hasCrmNotes(rand(1, 10))->hasCrmDocuments(rand(1,10))->create();
    }
}
