<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DB, Input;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        //if(null === Input::get("id") || trim(Input::get("id") == ""));
        
        $users = DB::table('users')->get();
        return view('user.index', ['users' => $users]);
    }
    public function getDetail() {
        if(null === Input::get("id") || trim(Input::get("id") == ""))	return redirect("grafik");

		$data['ctlUsers'] = DB::table('dp_users')
        ->where('U_ID', Session::get('SESSION_USER_ID'))
        ->orderBy('U_NAME', 'asc')
        ->get();
    $userId = Session::get('SESSION_USER_ID');
    $grafik = DB::table("dp_grafik")
    	->where("GR_ID", Input::get("id"))
    	->first();
    $data["ctlGrafik"] = $grafik;	

  	$detailGrafik = DB::table("dp_grafik_detil")
  		->where("GR_ID", Input::get("id"))
  		->get();
		$data["ctlDetailGrafik"] = $detailGrafik;
		//return $data;
    return view('grafik-detail', $data);
    }
}
