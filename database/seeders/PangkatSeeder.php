<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PangkatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pangkats')->insert([

            // Tamtama
            ['nama_pangkat' => 'BHARADA', 'golongan' => 'I/a', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'BHARATU', 'golongan' => 'I/b', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'BHARAKA', 'golongan' => 'I/c', 'created_at' => now(), 'updated_at' => now()],

            // Bintara
            ['nama_pangkat' => 'BRIPDA', 'golongan' => 'II/a', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'BRIPTU', 'golongan' => 'II/b', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'BRIGADIR', 'golongan' => 'II/c', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'BRIPKA', 'golongan' => 'II/d', 'created_at' => now(), 'updated_at' => now()],

            // Bintara Tinggi
            ['nama_pangkat' => 'AIPDA', 'golongan' => 'III/a', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'AIPTU', 'golongan' => 'III/b', 'created_at' => now(), 'updated_at' => now()],

            // Perwira Pertama
            ['nama_pangkat' => 'IPDA', 'golongan' => 'III/c', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'IPTU', 'golongan' => 'III/d', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'AKP', 'golongan' => 'III/d', 'created_at' => now(), 'updated_at' => now()],

            // Perwira Menengah
            ['nama_pangkat' => 'KOMPOL', 'golongan' => 'IV/a', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'AKBP', 'golongan' => 'IV/b', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'KOMBES POL', 'golongan' => 'IV/c', 'created_at' => now(), 'updated_at' => now()],

            // Perwira Tinggi
            ['nama_pangkat' => 'BRIGJEN POL', 'golongan' => 'IV/d', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'IRJEN POL', 'golongan' => 'IV/e', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'KOMJEN POL', 'golongan' => 'IV/e', 'created_at' => now(), 'updated_at' => now()],
            ['nama_pangkat' => 'JENDERAL POL', 'golongan' => 'IV/e', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}