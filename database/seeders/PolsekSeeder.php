<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Polsek;

class PolsekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_polsek' => 'Polsek Singosari'],
            ['nama_polsek' => 'Polsek Karangploso'],
            ['nama_polsek' => 'Polsek Pakis'],
            ['nama_polsek' => 'Polsek Pakisaji'],
            ['nama_polsek' => 'Polsek Poncokusumo'],
        ];

        Polsek::insert($data);
    }
}