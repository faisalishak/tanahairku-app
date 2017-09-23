<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;

class CodeController extends Controller
{
	public function __construct(){
      $this->middleware('auth');
  	}
    public function getCode() {
		$data = DB::table('unique_code')->get();
		return view('admin.unique_code')->with('data',$data);
	}

	public function postAddcode(Request $req) {
		$data = DB::table('unique_code')->insert(
			array(
					'unique_code' => $req->input('unique_code'),
					'type_unique_code' => $req->input('type_unique_code')
				)
		);
        if($data){
		    return redirect('admin/code');
        }    
	}

	public function postUpdatecode(Request $req) {
		DB::table('unique_code')
            ->where('unique_code', $req->input('unique_code'))
            ->update(array('unique_code' => $req->input('unique_code_update')));
		
		return redirect('admin/code');
	}

	public function postDeletecode(Request $req) {
		DB::table('unique_code')->where('unique_code', $req->input('unique_code'))->delete();
		return redirect('admin/code');
	}
}
