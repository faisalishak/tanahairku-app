<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\LogMarkerObject;
use App\LogSummary;
use DB;
class LogMarkerObjectController extends Controller
{
	public function __construct(){
      $this->middleware('auth');
  	}
   	public function index(){
   		
   		$logs = LogMarkerObject::select(DB::raw("id_device, DATE(logging_date) as logging_date, GROUP_CONCAT(DISTINCT object_name) as object_name, GROUP_CONCAT(DISTINCT category) as category"))
   				->groupBy(DB::raw("id_device, DATE(logging_date)"))
   				->limit(100)->get();
   		$client = new Client();
		$header = ['headers'=>['Authorization'=>'Bearer 4OKE5wIADVVCo5DGiAKHB+XbcP8SdW6V4McZbJ1A/DLALAmFP0NEDIGyoMWjNMt+sGTWx2SjAGNY/WrZufKCGg==']];
		$log = [
				"Inputs" =>["input1"=>
					$logs
		        ]
		        
        ];
        $test = json_encode($log);
        $ch = curl_init('https://asiasoutheast.services.azureml.net/subscriptions/7a38336d77ae429085b6d8af7c3b5eeb/services/650a9442d3494830b2ea54e48106965e/execute?api-version=2.0&format=swagger');                                                                      
		curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "\cert\ca-bundle.crt");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Authorization: Bearer qWa54LagS5I1/i2Le7Zp02/uGzBru0sQIw9ZsSVVh2iSp6b0XBEUJGYat4L2VHmhldXGiftjBNExu/cGfJiIXQ==')                                                                       
		);  
		curl_setopt($ch, CURLOPT_POST, 1);                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $test);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		                                                                                                                 
		                                                                                                                     
		$result = curl_exec($ch);

		return $result;
		//return response()->json($log);
   	}
   	public function visualizeAssRule(){
   		return view('admin.log.log_scan_marker');
   	}
   	public function apiObject(){
   		
   		$logs = LogMarkerObject::select(DB::raw("id_device, DATE(logging_date) as logging_date, GROUP_CONCAT(DISTINCT object_name) as object_name, GROUP_CONCAT(DISTINCT category) as category"))
   				->groupBy(DB::raw("id_device, DATE(logging_date)"))
   				->limit(50)->get();
   		$client = new Client();
		$header = ['headers'=>['Authorization'=>'Bearer 4OKE5wIADVVCo5DGiAKHB+XbcP8SdW6V4McZbJ1A/DLALAmFP0NEDIGyoMWjNMt+sGTWx2SjAGNY/WrZufKCGg==']];
		$log = [
				"Inputs" =>["input1"=>
					$logs
		        ]
		        
        ];
        $test = json_encode($log);
        $ch = curl_init('https://asiasoutheast.services.azureml.net/subscriptions/7a38336d77ae429085b6d8af7c3b5eeb/services/346873e387224c1eb02ee284211a2468/execute?api-version=2.0&format=swagger');                                                                      
		curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "\cert\ca-bundle.crt");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Authorization: Bearer HnVV4g8ArKzQBxD54tNe0bMBScgL7cr4tWVf6jHGlro8RsZexgabLUMHydWkmjwqAv6hvhCAV5a8j9TiJWY9Kg==')                                                                       
		);  
		curl_setopt($ch, CURLOPT_POST, 1);                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $test);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		                                                                                                                 
		                                                                                                                     
		$result = curl_exec($ch);
		return response()->json(json_decode($result));
   	}
   	public function getObject(){
   		return view('admin.log.object');
   	}
   	public function cluster(){
   		
   		$logs = LogSummary::select('id_device','avg_open_apps','avg_object_scanned','avg_minutes','avg_correct_trivia','avg_wrong_trivia')->get();
   		$client = new Client();
		$header = ['headers'=>['Authorization'=>'Bearer 4OKE5wIADVVCo5DGiAKHB+XbcP8SdW6V4McZbJ1A/DLALAmFP0NEDIGyoMWjNMt+sGTWx2SjAGNY/WrZufKCGg==']];
		$log = [
				"Inputs" =>["input1"=>
					$logs
		        ]
		        
        ];
        $test = json_encode($log);
        $ch = curl_init('https://asiasoutheast.services.azureml.net/subscriptions/7a38336d77ae429085b6d8af7c3b5eeb/services/d40ad07027a147d780423a5f2fd3348e/execute?api-version=2.0&format=swagger');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "\cert\ca-bundle.crt");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Authorization: Bearer ets3LN48AUCgg4MK0gJdKl7ulXjmq7vZkTuUndmtAJpTg00xvsEWcwxM8HS43FvVJddQvmgO83yTPxlByXCS6A==')                                                                       
		);  
		curl_setopt($ch, CURLOPT_POST, 1);                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $test);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		                                                                                                                 
		                                                                                                                     
		$result = curl_exec($ch);
		$parse = json_decode($result,true);
		$select = $parse['Results'];
		$output = $select['output1'];
		$data = [];
		foreach ($output as $item) {
			$data[] = [
				'id_device' => $item['id_device'],
				'avg_open_apps' => (int)$item['avg_open_apps'],
				'avg_object_scanned' => (int)$item['avg_object_scanned'],
				'avg_minutes' => (int)$item['avg_minutes'],
				'avg_correct_trivia' => (int)$item['avg_correct_trivia'],
				'avg_wrong_trivia' => (int)$item['avg_wrong_trivia'],
				'Assignments' => $item['Assignments']
			];
		}
		$count1 = collect($data)->where('Assignments','0')->count();
		$count2 = collect($data)->where('Assignments','1')->count();
		$max0 = collect($data)->where('Assignments','0')->max('avg_open_apps');
		$avg0 = ceil(collect($data)->where('Assignments','0')->avg('avg_open_apps'));
		$min0 = collect($data)->where('Assignments','0')->min('avg_open_apps');

		$max1 = collect($data)->where('Assignments','1')->max('avg_open_apps');
		$avg1 = ceil(collect($data)->where('Assignments','1')->avg('avg_open_apps'));
		$min1 = collect($data)->where('Assignments','1')->min('avg_open_apps');

		$maxOs0 = collect($data)->where('Assignments','0')->max('avg_object_scanned');
		$avgOs0 = ceil(collect($data)->where('Assignments','0')->avg('avg_object_scanned'));
		$minOs0 = collect($data)->where('Assignments','0')->min('avg_object_scanned');

		$maxOs1 = collect($data)->where('Assignments','1')->max('avg_object_scanned');
		$avgOs1 = ceil(collect($data)->where('Assignments','1')->avg('avg_object_scanned'));
		$minOs1 = collect($data)->where('Assignments','1')->min('avg_object_scanned');

		$maxOm0 = collect($data)->where('Assignments','0')->max('avg_minutes');
		$avgOm0 = ceil(collect($data)->where('Assignments','0')->avg('avg_minutes'));
		$minOm0 = collect($data)->where('Assignments','0')->min('avg_minutes');

		$maxOm1 = collect($data)->where('Assignments','1')->max('avg_minutes');
		$avgOm1 = ceil(collect($data)->where('Assignments','1')->avg('avg_minutes'));
		$minOm1 = collect($data)->where('Assignments','1')->min('avg_minutes');

		$maxOc0 = collect($data)->where('Assignments','0')->max('avg_correct_trivia');
		$avgOc0 = ceil(collect($data)->where('Assignments','0')->avg('avg_correct_trivia'));
		$minOc0 = collect($data)->where('Assignments','0')->min('avg_correct_trivia');

		$maxOc1 = collect($data)->where('Assignments','1')->max('avg_correct_trivia');
		$avgOc1 = ceil(collect($data)->where('Assignments','1')->avg('avg_correct_trivia'));
		$minOc1 = collect($data)->where('Assignments','1')->min('avg_correct_trivia');

		$maxOw0 = collect($data)->where('Assignments','0')->max('avg_wrong_trivia');
		$avgOw0 = ceil(collect($data)->where('Assignments','0')->avg('avg_wrong_trivia'));
		$minOw0 = collect($data)->where('Assignments','0')->min('avg_wrong_trivia');

		$maxOw1 = collect($data)->where('Assignments','1')->max('avg_wrong_trivia');
		$avgOw1 = ceil(collect($data)->where('Assignments','1')->avg('avg_wrong_trivia'));
		$minOw1 = collect($data)->where('Assignments','1')->min('avg_wrong_trivia');

		$jsons = [
			'datas' => $data,
			'open0' => ['max'=> $max0,
						'avg' => $avg0,
						'min' => $min0],
			'open1' => ['max'=> $max1,
						'avg' => $avg1,
						'min' => $min1],
			'os0' => ['max'=> $maxOs0,
						'avg' => $avgOs0,
						'min' => $minOs0],
			'os1' => ['max'=> $maxOs1,
						'avg' => $avgOs1,
						'min' => $minOs1],
			'om0' => ['max'=> $maxOm0,
						'avg' => $avgOm0,
						'min' => $minOm0],
			'om1' => ['max'=> $maxOm1,
						'avg' => $avgOm1,
						'min' => $minOm1],
			'oc0' => ['max'=> $maxOc0,
						'avg' => $avgOc0,
						'min' => $minOc0],	
			'oc1' => ['max'=> $maxOc1,
						'avg' => $avgOc1,
						'min' => $minOc1],
			'ow0' => ['max'=> $maxOw0,
						'avg' => $avgOw0,
						'min' => $minOw0],
			'ow1' => ['max'=> $maxOw1,
						'avg' => $avgOw1,
						'min' => $minOw1],	
			'jml' => ['zero' => $count1,
					  'one' => $count2]																												
						];
		return response()->json($jsons);
   	}
   	public function visualizeCluster(){
   		return view('admin.log.cluster');
   	}
}
