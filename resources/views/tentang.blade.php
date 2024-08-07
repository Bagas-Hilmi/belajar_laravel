<!-- Menghubungkan dengan view template master -->
@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman tentang')
 
 
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
 
	<p>Ini Adalah Halaman Tentang</p>
	<p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, iste ipsa qui recusandae quas ea quidem 
        consectetur adipisci id tempora aut blanditiis officiis fugiat ipsum facere architecto temporibus aperiam tempore 
        quam. Adipisci repellendus incidunt neque alias voluptatum id quibusdam laudantium optio laboriosam, in officia, vero soluta vitae consequatur cupiditate natus.

    </p>
 
@endsection