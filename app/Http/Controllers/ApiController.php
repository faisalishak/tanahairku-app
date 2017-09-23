<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use App\Trivia_Quiz;
use App\LogSummary;

class ApiController extends Controller {
	protected static $restful = true;
	
	public function postRegister(Request $req){
		if(!$req->input('unique_code') || !$req->input('id_device')) {
			return Response::json(array('status_code'=> 400, 'message' => 'Parameter is not valid'));
		} else {	
			$unique_code = $req->input('unique_code');
			$id_device = $req->input('id_device');
			$queryGetUniqueCode = DB::table('unique_code')
									->where('unique_code', $unique_code)
									->first();
			
			if($queryGetUniqueCode != null) {
				$queryGetDevice = DB::table('device')
									->where('id_device', $id_device)
									->first();
				
				if($queryGetDevice != null) {
					$queryGetRegistered = DB::table('registered')
						->where('unique_code', '=', $unique_code)
						->where('id_device', '=', $id_device)
						->first();

					if($queryGetRegistered != null) {
						try {
							$queryUpdateRegistered = DB::table('registered')
																->where('unique_code', '=', $unique_code)
																->where('id_device', '=', $id_device)
																->update(
																	array(
																		'updated_at' => new \DateTime()
																	)
																);
															
							return Response::json(array('status_code'=> 200, 'message' => 'Success'));
						} catch(\PDOException $exception) {
							return Response::json(array('status_code'=> 400, 'message' => 'An error occured 1'));
						}
					} else {
						$queryGetRegistered = DB::table('registered')
											->select(DB::raw('count(unique_code) as count_unique_code'))
											->where('unique_code', '=', $unique_code)
											->groupBy('unique_code')
											->first();
					
						if($queryGetRegistered == null) {
							try {
								$queryInsertRegistered = DB::table('registered')
															->insert(
																array(
																	'unique_code' =>$unique_code, 
																	'id_device' => $id_device,
																	'created_at' => new \DateTime(),
																	'updated_at' => new \DateTime()
																)
															);

								return Response::json(array('status_code'=> 200, 'message' => 'Thank you for registering'));
							} catch(\PDOException $exception) {
								return Response::json(array('status_code'=> 400, 'message' => 'An error occured 2'));
							}
						} else {
							$redeemable = 0;
							if($queryGetUniqueCode->type_unique_code == 'Family'){
								$redeemable = 3;
							} else if($queryGetUniqueCode->type_unique_code == 'Personal'){
								$redeemable = 1;
							} 

							if($queryGetRegistered->count_unique_code < $redeemable) {
								try {
									$queryInsertRegistered = DB::table('registered')
															->insert(
																array(
																	'unique_code' =>$unique_code, 
																	'id_device' => $id_device,
																	'created_at' => new \DateTime(),
																	'updated_at' => new \DateTime()
																)
															);
										
									return Response::json(array('status_code'=> 200, 'message' => 'Thank you for registering'));
								} catch(\PDOException $exception) {
									return Response::json(array('status_code'=> 400, 'message' => 'An error occured 3'));
								}
							} else {
								return Response::json(array('status_code'=> 400, 'message' => 'This Code Has Been Reached Limit'));
							}
						}
					}
				} else {
					$queryGetRegistered = DB::table('registered')
											->select(DB::raw('count(unique_code) as count_unique_code'))
											->where('unique_code', '=', $unique_code)
											->groupBy('unique_code')
											->first();
						
					if($queryGetRegistered == null) {
						try {
							$queryInsertDevice = DB::table('device')
									->insert(
										array('id_device' => $id_device)
									);

							$queryInsertRegistered = DB::table('registered')
														->insert(
															array(
																'unique_code' =>$unique_code, 
																'id_device' => $id_device,
																'created_at' => new \DateTime(),
																'updated_at' => new \DateTime()
															)
														);

							return Response::json(array('status_code'=> 200, 'message' => 'Thank you for registering'));
						} catch(\PDOException $exception) {
							return Response::json(array('status_code'=> 400, 'message' => 'An error occured 4'));
						}
					} else {
						$redeemable = 0;
						if($queryGetUniqueCode->type_unique_code == 'Family'){
							$redeemable = 3;
						} else if($queryGetUniqueCode->type_unique_code == 'Personal'){
							$redeemable = 1;
						} 

						if($queryGetRegistered->count_unique_code < $redeemable) {
							try {
								$queryInsertDevice = DB::table('device')
										->insert(
											array('id_device' => $id_device)
										);
								
								$queryInsertregistered = DB::table('registered')
														->insert(
															array(
																'unique_code' =>$unique_code, 
																'id_device' => $id_device,
																'created_at' => new \DateTime(),
																'updated_at' => new \DateTime()
															)
														);
										
								return Response::json(array('status_code'=> 200, 'message' => 'Thank you for registering'));
							} catch(\PDOException $exception) {
								return Response::json(array('status_code'=> 400, 'message' => 'An error occured 5'));
							}
						} else {
							return Response::json(array('status_code'=> 400, 'message' => 'This Code Has Been Reached Limit'));
						}
					}
				}
			} else {
				return Response::json(array('status_code'=> 400, 'message' => 'Code is not recognized'));
			}
		}
	}

	public function postLogOpenApp(Request $req){
		if(!$req->input('id_device') || !$req->input('logging_date')) {
			return Response::json(array('status_code'=> 400, 'message' => 'Parameter is not valid'));
		} else {
			$id_device = $req->input('id_device');
			$logging_date = $req->input('logging_date');


					
			try {
				$query = DB::table('log_open_app')
											->insert(
												array(
														'id_device' => $id_device, 
														'logging_date' => $logging_date
													)
												);
				$checkSummary  = LogSummary::where('id_device',$id_device)->count();
				if($checkSummary > 0){
					$avg_temp =  DB::table('log_open_app')
								->select(DB::raw("count(*) as counts"))
								->where('id_device',$id_device)
								->first();
					$avg_user =  DB::table('log_open_app')
								->select(DB::raw("count(*) as counts"))
								->groupBy('id_device','logging_date')
								->having('id_device',$id_device)
								->first();
					$countAvg = $avg_temp->counts / $avg_user->counts;	
					$update = LogSummary::where('id_device',$id_device)->update(['avg_open_apps'=> $countAvg]);
				}else{
					$avg_temp =  DB::table('log_open_app')
								->select(DB::raw("count(*) as counts"))
								->where('id_device',$id_device)
								->first();
					$avg_user =  DB::table('log_open_app')
								->select(DB::raw("count(*) as counts"))
								->groupBy('id_device','logging_date')
								->having('id_device',$id_device)
								->first();
					$countAvg = $avg_temp->counts / $avg_user->counts;	
					$data = [
						'id_device' => $id_device,
						'avg_open_apps' => $countAvg,
						'avg_object_scanned' => 0,
						'avg_minutes' => rand(1,2),
						'avg_correct_trivia' => 0,
						'avg_wrong_trivia' => 0
					];
					$update = LogSummary::create($data);
				}					
				return Response::json(array('status_code'=> 200, 'message' => 'Success Count Data'));
			} catch(\PDOException $exception) {
				return Response::json(array('status_code'=> 400, 'message' => 'An error occured'));
			}
		}
	}


	public function getTriviaQuiz(){
        $trivia_quiz = Trivia_Quiz::all();

        return response()->json( ['result' => $trivia_quiz] );
    }

	public function postLogScanMarkerCategory(Request $req){
		if(!$req->input('id_device') || !$req->input('logging_date') || !$req->input('object_name') || !$req->input('category')) {
			return Response::json(array('status_code'=> 400, 'message' => 'Parameter is not valid'));
		} else {
			$id_device = $req->input('id_device');
			$logging_date = $req->input('logging_date');
			$object_name = $req->input('object_name');
			$category = $req->input('category');

			try {
				$query = DB::table('log_scan_marker_category')
											->insert(
												array(
														'id_device' => $id_device, 
														'logging_date' => $logging_date,
														'object_name' => $object_name,
														'category' => $category
													)
												);
					$checkSummary  = LogSummary::where('id_device',$id_device)->count();
					if($checkSummary > 0){
						$avg_temp =  DB::table('log_scan_marker_category')
									->select(DB::raw("count(*) as counts"))
									->where('id_device',$id_device)
									->first();
						$avg_user =  DB::table('log_scan_marker_category')
									->select(DB::raw("count(*) as counts"))
									->groupBy('id_device','logging_date')
									->having('id_device',$id_device)
									->first();
						$countAvg = $avg_temp->counts / $avg_user->counts;	
						$update = LogSummary::where('id_device',$id_device)->update(['avg_object_scanned'=> $countAvg]);
					}else{
						$avg_temp =  DB::table('log_scan_marker_category')
									->select(DB::raw("count(*) as counts"))
									->where('id_device',$id_device)
									->first();
						$avg_user =  DB::table('log_scan_marker_category')
									->select(DB::raw("count(*) as counts"))
									->groupBy('id_device','logging_date')
									->having('id_device',$id_device)
									->first();
						$countAvg = $avg_temp->counts / $avg_user->counts;	
						$data = [
							'id_device' => $id_device,
							'avg_open_apps' => 0,
							'avg_object_scanned' => $countAvg,
							'avg_minutes' => 1,
							'avg_correct_trivia' => 0,
							'avg_wrong_trivia' => 0
						];
						$update = LogSummary::create($data);
					}					
				return Response::json(array('status_code'=> 200, 'message' => 'Success Count Data'));
			} catch(\PDOException $exception) {
				return Response::json(array('status_code'=> 400, 'message' => 'An error occured'));
			}
		}
	}

	public function postLogTriviaQuiz(Request $req){
		if(!$req->input('id_device') || !$req->input('logging_date') || !$req->input('id_trivia') || !$req->input('result')) {
			return Response::json(array('status_code'=> 400, 'message' => 'Parameter is not valid'));
		} else {
			$id_device = $req->input('id_device');
			$logging_date = $req->input('logging_date');
			$id_trivia = $req->input('id_trivia');
			$result = $req->input('result');
			
			try {
				$query = DB::table('log_trivia_quiz')
											->insert(
												array(
														'id_device' => $id_device, 
														'logging_date' => $logging_date,
														'id_trivia' => $id_trivia,
														'result' => $result
													)
												);
				$checkSummary  = LogSummary::where('id_device',$id_device)->count();
				if($checkSummary > 0){
					if($result == 'wrong'){
						$avg_temp =  DB::table('log_trivia_quiz')
								->select(DB::raw("count(*) as counts"))
								->where([['id_device','=', $id_device],['result','=','wrong']])
								->first();
						$avg_user =  DB::table('log_trivia_quiz')
								->select(DB::raw("count(*) as counts"))
								->where('result','=','wrong')
								->groupBy('id_device','logging_date')
								->having('id_device','=', $id_device)
								->first();
						$countAvg = $avg_temp->counts / $avg_user->counts;	
						$update = LogSummary::where('id_device',$id_device)->update(['avg_wrong_trivia'=> $countAvg]);		

					}else{
						$avg_temp =  DB::table('log_trivia_quiz')
								->select(DB::raw("count(*) as counts"))
								->where([['id_device','=', $id_device],['result','=','correct']])
								->first();
						$avg_user =  DB::table('log_trivia_quiz')
								->select(DB::raw("count(*) as counts"))
								->where('result','=','correct')
								->groupBy('id_device','logging_date')
								->having('id_device','=', $id_device)
								->first();
						$countAvg = $avg_temp->counts / $avg_user->counts;	
						$update = LogSummary::where('id_device',$id_device)->update(['avg_correct_trivia'=> $countAvg]);		
					}
					
					
				}else{
					if($result == 'wrong'){
						$avg_temp =  DB::table('log_trivia_quiz')
								->select(DB::raw("count(*) as counts"))
								->where([['id_device','=', $id_device],['result','=','wrong']])
								->first();
						$avg_user =  DB::table('log_trivia_quiz')
								->select(DB::raw("count(*) as counts"))
								->where('result','=','wrong')
								->groupBy('id_device','logging_date')
								->having('id_device','=', $id_device)
								->first();

						$countAvg = $avg_temp->counts / $avg_user->counts;
					
						$data = [
							'id_device' => $id_device,
							'avg_open_apps' => 0,
							'avg_object_scanned' => 0,
							'avg_minutes' => 1,
							'avg_correct_trivia' => 0,
							'avg_wrong_trivia' => $countAvg
						];
						$update = LogSummary::create($data);		
					}else{
						$avg_temp =  DB::table('log_trivia_quiz')
								->select(DB::raw("count(*) as counts"))
								->where([['id_device','=', $id_device],['result','=','correct']])
								->first();
						$avg_user =  DB::table('log_trivia_quiz')
								->select(DB::raw("count(*) as counts"))
								->where('result','=','correct')
								->groupBy('id_device','logging_date')
								->having('id_device','=', $id_device)
								->first();


						$countAvg = $avg_temp->counts / $avg_user->counts;
					
						$data = [
							'id_device' => $id_device,
							'avg_open_apps' => 0,
							'avg_object_scanned' => 0,
							'avg_minutes' => 1,
							'avg_correct_trivia' => $countAvg,
							'avg_wrong_trivia' => 0
						];
						$update = LogSummary::create($data);
					}
					
				}																		
				return Response::json(array('status_code'=> 200, 'message' => 'Success Count Data'));
			} catch(\PDOException $exception) {
				return Response::json(array('status_code'=> 400, 'message' => 'An error occured'));
			}
		}
	}
}