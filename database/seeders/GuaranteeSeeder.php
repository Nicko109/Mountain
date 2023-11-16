<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Guarantee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuaranteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guarantee::factory(50)->create();
    }
}
