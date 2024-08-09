<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// panggil model pegawai
use App\Models\Pegawai;
 
 
class PegawaiController extends Controller
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
    	// mengambil data pegawai
    	$pegawai = Pegawai::all();
 
    	// mengirim data pegawai ke view pegawai
    	return view('pegawai', ['pegawai' => $pegawai]);
    }
	public function tambah()
    {
    	return view('pegawai_tambah');
	}

	public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required'
    	]);
 
        Pegawai::create([
    		'nama' => $request->nama,
    		'alamat' => $request->alamat
    	]);
 
    	return redirect('/pegawai');
    }

	public function edit($id)
	{
		$pegawai = pegawai::find($id);
			return view('pegawai_edit', ['pegawai'=> $pegawai]);
	}
	
	public function update($id, Request $request)
	{
		$this->validate($request,[
		'nama' => 'required',
		'alamat' => 'required'
		]);
	
		$pegawai = Pegawai::find($id);
		$pegawai->nama = $request->nama;
		$pegawai->alamat = $request->alamat;
		$pegawai->save();
		return redirect('/pegawai');
	}

	public function delete($id)
	{
		$pegawai = Pegawai::find($id);

		if ($pegawai) {
			$pegawai->delete();
			return redirect('/pegawai')->with('success', 'Pegawai deleted successfully');
		}

		return redirect('/pegawai')->with('error', 'Pegawai not found');
	}

}