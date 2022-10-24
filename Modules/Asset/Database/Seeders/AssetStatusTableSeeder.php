<?php

namespace Modules\Asset\Database\Seeders;

use Modules\Asset\Entities\AssetStatus;
use Illuminate\Database\Seeder;

class AssetStatusTableSeeder extends Seeder
{
    public function run()
    {
        $assetStatuses = [
            [
                'id'         => 1,
                'name'       => 'Available',
                'created_at' => '2021-11-05 23:59:50',
                'updated_at' => '2021-11-05 23:59:50',
            ],
            [
                'id'         => 2,
                'name'       => 'In Use',
                'created_at' => '2021-11-05 23:59:50',
                'updated_at' => '2021-11-05 23:59:50',
            ],
            [
                'id'         => 3,
                'name'       => 'Broken',
                'created_at' => '2021-11-05 23:59:50',
                'updated_at' => '2021-11-05 23:59:50',
            ],
            [
                'id'         => 4,
                'name'       => 'Out for Repair',
                'created_at' => '2021-11-05 23:59:50',
                'updated_at' => '2021-11-05 23:59:50',
            ],
        ];

        AssetStatus::insert($assetStatuses);
    }
}
