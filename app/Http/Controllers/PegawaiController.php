<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\Pegawai;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
 
class PegawaiController extends Controller
{
    public function index()
    {
    	$pegawai = Pegawai::all();
    	return view('pegawai',['pegawai'=>$pegawai]);
    }
 
	public function cetak_pdf()
	{
		$pegawai = Pegawai::all();
		
		// Debugging untuk memastikan data sudah ada
		Log::info($pegawai);
	
		$pdf = Pdf::loadView('pegawai_pdf', ['pegawai' => $pegawai]);
		
		// Mengembalikan respon PDF
		return $pdf->download('laporan-pegawai.pdf');
	}
}