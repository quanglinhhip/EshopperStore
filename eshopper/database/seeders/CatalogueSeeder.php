<?php

namespace Database\Seeders;

use App\Models\Catalogue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Catalogue::factory()->count(5)->create();
    }
}