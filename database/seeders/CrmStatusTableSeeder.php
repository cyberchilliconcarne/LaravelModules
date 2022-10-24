<?php

namespace Database\Seeders;

use App\Models\Crm\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2021-11-05 23:59:16',
                'updated_at' => '2021-11-05 23:59:16',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2021-11-05 23:59:16',
                'updated_at' => '2021-11-05 23:59:16',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2021-11-05 23:59:16',
                'updated_at' => '2021-11-05 23:59:16',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
