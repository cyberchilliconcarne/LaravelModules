<?php

namespace Database\Seeders;

use App\Models\Task\Task;
use App\Models\Task\TaskTag;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskTag::factory(25)->create();
        Task::factory()->count(100)->hasTags(TaskTag::all()->random())->create();
    }
}
