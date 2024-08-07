<!-- Menghubungkan dengan view template master -->
@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Home')
 
 
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
 
	<p>Ini Adalah Halaman kontak</p>
	
    <table border="1">
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>lenovo@yahoo.co.id</td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td>:</td>
            <td>456789498</td>
        </tr>
    </table>
 
@endsection