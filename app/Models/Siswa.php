<?php

namespace App\Models;
use Illuminate\Support\Facades\Log;

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
    public static function add($nama, $nis, $alamat)
    {
        try {
                DB::insert('INSERT INTO siswa (nama, nis, alamat, created_at, updated_at) VALUES (?, ?, ?, ?, ?)', 
                    [$nama, $nis, $alamat, now(), now()]);

            return ['success' => true, 'message' => 'Data siswa berhasil ditambahkan!'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Terjadi kesalahan saat menambahkan data siswa.'];
        }
    }

    public static function updateData($id, $nama, $nis, $alamat)
    {
        try {
            $query = 'UPDATE siswa
                      SET nama = ?,
                          nis = ?,
                          alamat = ?,
                          updated_at = ?
                      WHERE id = ?';
    
            $params = [$nama, $nis, $alamat, now(), $id];
    
            $result = DB::update($query, $params);
            Log::info('Update berhasil untuk ID: ' . $id);

            return ['success' => true, 'message' => 'Data siswa berhasil diperbarui!'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Terjadi kesalahan saat memperbarui data siswa.'];
        }
    }
} 