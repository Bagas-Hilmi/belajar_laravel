<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
 
use App\Mail\BagasngodingEmail;
use Illuminate\Support\Facades\Mail;
 
class BagasngodingController extends Controller
{
	public function index(){
 
		Mail::to("testing@malasngoding.com")->send(new BagasngodingEmail());
 
		return "Email telah dikirim";
 
	}
}
