<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;

class UserSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
    }
}
