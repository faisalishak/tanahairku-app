<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use Session;
use DB;

class UsersController extends Controller
{
	 public function __construct(){
      $this->middleware('auth');
  	}
	

	public function getDashboard() {
		return view('admin.dashboard');
	}

	

	public function getVideo() {
		return view('admin.video_admin');
	}

	public function postAddvideo() {
		DB::table('video')
		->insert(array(
					'video_name' => Input::get('video_name'),
					'id_country' => Input::get('id_country'),
					'video_url' => Input::get('video_url'),
					'video_desc' => Input::get('video_desc')
					)
				);
		
		return redirect('admin/video');
	}

	public function postUpdatevideo() {
		DB::table('video')
            ->where('id_video', Input::get('id_video'))
            ->update(array(
							'video_name' => Input::get('video_name'),
							'id_country' => Input::get('id_country'),
							'video_url' => Input::get('video_url'),
							'video_desc' => Input::get('video_desc')
						)
					);
		
		return redirect('admin/video');
	}

	public function postDeletevideo() {
		DB::table('video')->where('id_video', Input::get('id_video'))->delete();
		return redirect('admin/video');
	}
		
	public function getRegistered() {
		return view('admin.Registered');
	}

	public function postDeleteregistered() {
		DB::table('registered')->where('id_registered', Input::get('id_registered'))->delete();
		return redirect('admin/registered');
	}

	
}
