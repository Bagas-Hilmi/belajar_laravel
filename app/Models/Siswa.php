<?php
 
 namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    protected $table = "siswa";
    
    protected $fillable = ['nama', 'nis', 'alamat'];

    static function get_dtSiswa()
    {
        $db = DB::select('SELECT 
        a.id_siswa, 
        a.nama, 
        a.nis, 
        a.alamat, 
        a.created_at,                      
        a.updated_at
        FROM siswa a
        ORDER BY a.nama ASC ');

        return $db;                        
    }    
    
}
