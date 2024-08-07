<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table pegawai
        DB::table('pegawai')->insert([
            'pegawai_nama' => 'Joni',
            'pegawai_jabatan' => 'Web Designer',
            'pegawai_umur' => 25,
            'pegawai_alamat' => 'Jl. Panglateh'
        ]);
    }
}