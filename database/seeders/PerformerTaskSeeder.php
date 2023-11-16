<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\PerformerTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerformerTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerformerTask::factory(50)->create();
    }
}
