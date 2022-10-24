<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Asset\Database\Seeders\AssetStatusTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            AssetStatusTableSeeder::class,
            CrmStatusTableSeeder::class,
            TaskStatusTableSeeder::class,
        ]);
    }
}
