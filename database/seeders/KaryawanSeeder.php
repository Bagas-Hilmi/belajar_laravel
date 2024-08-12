<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

 
class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 110; $i++){

    	// insert data ke table Karyawan
        DB::table('karyawan')->insert([
        	'karyawan_nama' => $faker->name,
        	'karyawan_jabatan' => $faker->jobTitle,
        	'karyawan_umur' => $faker->numberBetween(25,40),
        	'karyawan_alamat' => $faker->address
        ]);
        
        }
    }
}