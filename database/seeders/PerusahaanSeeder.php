<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perusahaan::factory(1)->createMany([
            ["name" => "Castel"],
            ["name" => "Avigra"],
            ["name" => "CMC"],
            ["name" => "Nolta"],
            ["name" => "Nest Residince"]
        ]);
    }
}
