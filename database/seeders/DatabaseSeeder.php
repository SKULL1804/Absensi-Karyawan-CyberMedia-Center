<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Avatar;
use App\Models\Position;
use App\Models\Perusahaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(PerusahaanSeeder::class);

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => Role::where('name', 'admin')->first('id'),
            'position_id' => Position::where('name', 'Administrator')->first('id'),
            'perusahaan_id' => Perusahaan::where('name', 'Castel')->first('id'),
        ]);
    }
}
