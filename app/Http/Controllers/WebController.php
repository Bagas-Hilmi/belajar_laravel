<?php
 
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\Article; // Pastikan namespace model sesuai
 
 class WebController extends Controller
 {
     public function index()
     {
         $artikel = Article::all(); // Mengambil semua data artikel
         return view('article', ['artikel' => $artikel]); // Mengirim data ke view
     }
 }