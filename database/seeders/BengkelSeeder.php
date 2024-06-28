<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bengkel;

class BengkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = 2; // Misalnya, ID pengguna yang sesuai
        Bengkel::create([
        'title' => 'Bengkel Sentosa',
        'description_bengkel' => 'Menyediakan layanan Service Motor',
        'adress' => 'Jl. Raya Indramayu No. 123',
        'telepon' => '0897788557',
        'latitude' => -6.200000,
        'longitude' => 106.816666,
        'user_id' => $userId,
        ]);
        Bengkel::create([
            'title' => 'Bengkel Putri',
            'description_bengkel' => 'Menyediakan layanan Service Motor',
            'adress' => 'Jl. Raya Karangampel No. 1',
            'telepon' => '0897788557',
            'latitude' => -6.210000,
            'longitude' => 106.820000,
            'user_id' => $userId,
            ]);

    }
}
