<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\Book;
use Illuminate\Support\Facades\Session; 
use App\Exports\BookExport;
use App\Imports\BookImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

 
class BookController extends Controller
{
	use ValidatesRequests;

	public function index()
	{
		$book = Book::all();
		return view('Book',['Book'=>$book]);
	}
 
	public function export_excel()
	{
		return Excel::download(new BookExport, 'book.xlsx');
	}
 
	public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_book di dalam folder public
		$file->move('file_book',$nama_file);
 
		// import data
		Excel::import(new BookImport, public_path('/file_book/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Book Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/book');
	}
}