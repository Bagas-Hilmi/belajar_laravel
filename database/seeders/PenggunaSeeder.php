<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB; // Tambahkan baris ini
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
 
    	$faker = Faker::create('id');
 
    	for($i = 1; $i <= 10; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('pengguna')->insert([
    			'nama' => $faker->name,
    		]);
 
    	}
 
    }
}
