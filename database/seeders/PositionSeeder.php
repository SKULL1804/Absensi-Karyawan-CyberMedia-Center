<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::factory(1)->createMany([
            ["name" => "Direktur"],
            ["name" => "Direktur Pelaksana"],
            ["name" => "Bedahara"],
            ["name" => "Asisten Bedahara"],
            ["name" => "Office Boy (OB)"],
            ["name" => "Administrator"],
            ["name" => "PKL"],
            ["name" => "Kepala Produksi"],
            ["name" => "Tim Produksi"],
            ["name" => "Instruktur"],
            ["name" => "Asisten Instruktur"],
        ]);
    }
}
