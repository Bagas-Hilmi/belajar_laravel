<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan baris ini
use Faker\Factory as Faker;
 
class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 20; $x++){
 
        	// insert data dummy pegawai dengan faker
        	DB::table('pegawai')->insert([
        		'nama' => $faker->name,
        		'alamat' => $faker->address,
        	]);
 
        }
 
    }
}