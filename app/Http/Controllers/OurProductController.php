<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Pre_order;
use App\Trivia_Quiz;
use App\Work_with_us;
use App\Product;
use App\Transaction;
use App\Product_order;
use DB;
use Response;
use App\LogSummary;
use Carbon\Carbon;

class OurProductController extends Controller
{
    public function index()
    {
        return view('ourproduct');
    }

    public function show($id_product)
    {
        return view('detail')->with('id_product', $id_product);
    }
    
    public function subscription(Request $req){
        $subscriber = Subscriber::where('email', $req ->input('email'))->count();   
        if($subscriber == 0){
            $subscriber = new Subscriber;
            $subscriber -> email = $req ->input('email');
            $subscriber -> save();
            return response()->json(200);
        }else{
            return response()->json(500);
        }
    }

     public function preorder(Request $req){
        $pre_order = new Pre_order;
        $pre_order -> email = $req ->input('email');
        $pre_order -> desc = $req ->input('desc');
        $pre_order -> save();
        return response()->json(200);
    }

     public function workwithus(Request $req){ 
            $workwithus = new Work_with_us;
            $workwithus -> name = $req ->input('name');
            $workwithus -> email = $req ->input('email');
            $workwithus -> company = $req ->input('company');
            $workwithus -> phone = $req ->input('phone');
            $workwithus -> desc = $req ->input('desc');
            $workwithus -> save();
            return response()->json(200);
    }

    public function ShowDetailProduct($id_product, $qty){
        $detail_product = DB::table('photo_product')->join('product', 'product.id_product', 'photo_product.id_product')->where('product.id_product', $id_product)->get();

        return view('detail')->with('detail_product', $detail_product)
        ->with('qty', $qty);      
    }

    public function Checkout(Request $request){
        $product = Product::where('id_product', $request->input('id_product'))->get();

        if ($request){
            return view('checkout')
            ->with('product', $product)
            ->with('quantity', $request->input('quantity'));
        } 

        ////////////////////////////////Execute///////////////////////////////////////////
        ////////////////////////////////EndExecute////////////////////////////////////////
    }

    public function PostCheckout(Request $request){
        //Random String
        $randomString='';
        $checkstring = true;
        while($checkstring){
            $randomString='';
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

             $count = DB::table('transaction')->where('transaction_code', $randomString)->count();
             if($count < 1){
                 $checkstring = false;
             }
        }

        $transaction = new Transaction;
        $transaction -> transaction_code = $randomString;
        $transaction -> id = $request->input('id');
        $transaction -> total_fee = $request->input('total_fee');
        $transaction -> address = $request->input('address');
        $transaction -> postal_code = $request->input('postal_code');
        $transaction -> bank_transfer = $request->input('bank_transfer');
        $transaction -> service = $request->input('service');
      //  $transaction -> created_at = $current = Carbon::now();
        $transaction -> postal_fee = $request->input('postal_fee');
        $transaction -> province = $request->input('province');
        $transaction -> city = $request->input('city');
        $transaction -> weight = $request->input('weight'); 
        $transaction -> save();

       $array_id_product = $request->input('id_product');
       $array_quantity = $request->input('quantity');

        $i = 0;
        foreach($array_id_product as $item){
            $product_order = new Product_order;
            $product_order -> id_product = $array_id_product[$i];
            $product_order -> transaction_code = $randomString;
            $product_order -> quantity = $array_quantity[$i];
            $product_order -> save();  
            $i++;
        }
            
        $transactions = Transaction::where('id', $request->input('id'))->orderBy('created_at', 'desc')->get();

        return view('profile')->with('transactions' ,$transactions);
        //return response()->json($transactions);
    }
        //random unique_code
        //
        //$data = [];
        // for($z=0;$z<300;$z++){
        //     $randomString='';
        //     // $randomHour = rand(01, 23);
        //     // $randomMinute = rand(01, 59);
        //     // $randomSecond = rand(1, 59);
        //     // $randomTanggal = rand(1, 29);

        //     $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //     $charactersLength = strlen($characters);
        //     for ($i = 0; $i < 7; $i++) {
        //         $randomString .= $characters[rand(0, $charactersLength - 1)];
        //     }
        //     $data[] = $randomString;
        //      $count = DB::table('unique_code')->where('unique_code', $randomString)->count();
        //      if($count < 1){
        //         $workwithus = new Work_with_us;
        //         $workwithus -> unique_code = $randomString;
        //         $workwithus -> type_unique_code = 'Personal';
        //         // $workwithus -> logging_date = '2017-04-01 '.$randomHour.':'.$randomMinute.':'.$randomSecond;
        //         $workwithus -> save(); 
                
        //         //$j++;
        //      }
        // }

        //random id_device
        // $j = 0;
        // $checkstring = false;
        // $data = [];
        // for($z=0;$z<300;$z++){
        //     $randomString='';
        //     // $randomHour = rand(01, 23);
        //     // $randomMinute = rand(01, 59);
        //     // $randomSecond = rand(1, 59);
        //     // $randomTanggal = rand(1, 29);

        //     $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        //     $charactersLength = strlen($characters);
        //     for ($i = 0; $i < 32; $i++) {
        //         $randomString .= $characters[rand(0, $charactersLength - 1)];
        //     }
        //     $data[] = $randomString;
        //      $count = DB::table('device')->where('id_device', $randomString)->count();
        //      if($count < 1){
        //         $workwithus = new Work_with_us;
        //         $workwithus -> id_device = $randomString;
        //        // $workwithus -> logging_date = '2017-04-01 '.$randomHour.':'.$randomMinute.':'.$randomSecond;
        //         $workwithus -> save(); 

                
        //         //$j++;
        //      }
        // }


        //random log_open_app
        // $dataDevice =  DB::table('device')->get();
        // for ($count=0; $count< 318; $count++){
        // $randomOpenApp = rand(1, 4);
        // for($zs=0; $zs< $randomOpenApp; $zs++){    
        //     $randomHour = rand(01, 21);
        //     $randomMinute = rand(01, 59);
        //     $randomSecond = rand(1, 59);
        //     $randomTanggal = rand(1, 29);

        //     $id_device = $dataDevice[$count]->id_device;
        //     $logging_date =  '2017-04-'.$randomTanggal.' '.$randomHour.':'.$randomMinute.':'.$randomSecond;

        //         try {
        //             $query = DB::table('log_open_app')
        //                                         ->insert(
        //                                             array(
        //                                                     'id_device' => $id_device, 
        //                                                     'logging_date' => $logging_date
        //                                                 )
        //                                             );
        //             $checkSummary  = LogSummary::where('id_device',$id_device)->count();
        //             if($checkSummary > 0){
        //                 $avg_temp =  DB::table('log_open_app')
        //                             ->select(DB::raw("count(*) as counts"))
        //                             ->where('id_device',$id_device)
        //                             ->first();
        //                 $avg_user =  DB::table('log_open_app')
        //                             ->select(DB::raw("count(*) as counts"))
        //                             ->groupBy('id_device','logging_date')
        //                             ->having('id_device',$id_device)
        //                             ->first();
        //                 $countAvg = $avg_temp->counts / $avg_user->counts;	
        //                 $update = LogSummary::where('id_device',$id_device)->update(['avg_open_apps'=> $countAvg]);
        //             }else{
        //                 $avg_temp =  DB::table('log_open_app')
        //                             ->select(DB::raw("count(*) as counts"))
        //                             ->where('id_device',$id_device)
        //                             ->first();
        //                 $avg_user =  DB::table('log_open_app')
        //                             ->select(DB::raw("count(*) as counts"))
        //                             ->groupBy('id_device','logging_date')
        //                             ->having('id_device',$id_device)
        //                             ->first();
        //                 $countAvg = $avg_temp->counts / $avg_user->counts;	
        //                 $data = [
        //                     'id_device' => $id_device,
        //                     'avg_open_apps' => $countAvg,
        //                     'avg_object_scanned' => 0,
        //                     'avg_minutes' => rand(1,2),
        //                     'avg_correct_trivia' => 0,
        //                     'avg_wrong_trivia' => 0
        //                 ];
        //                 $update = LogSummary::create($data);
        //             }				
        //             //return Response::json(array('status_code'=> 200, 'Count' => $count));
        //         } catch(\PDOException $exception) {
        //             //return Response::json(array('status_code'=> 400, 'message' => 'An error occured'));
        //         }
        //         }	
        //     }
		
        //     return Response::json(array('status_code'=> 200, 'Count' => $count));
        
        //random scanmarker
        // $dataDevice =  DB::table('device')->get();
        // $object_name_array = array('YangQin', 'Organetto', 'Angklung', 'Koto', 'Concertina', 'Oud', 'Shehnai', 'Thobe', 'Saree', 'Cheongsam', 'Kebaya', 'Kimono', 'Renaissance', 'Beefeater', 'RuzBukhari', 'Biryani', 'LuRouFan', 'NasiGoreng', 'Lasagna', 'Sushi', 'SausageRolls', 'ArabHouse', 'Nagahut', 'HaicangRedBrickHouse', 'Rumahgadang', 'Trullo', 'Machiya', 'Oast', 'Kingdom', 'Pissa', '101Tower', 'IndiaGate', 'Monas', 'BigBen', 'Angklung', '101tower', 'Kingdom', 'Kebaya');
        // $category_array = array('Musik', 'Musik', 'Musik', 'Musik', 'Musik', 'Musik', 'Musik', 'Pakaian', 'Pakaian', 'Pakaian', 'Pakaian', 'Pakaian', 'Pakaian', 'Pakaian', 'Makanan', 'Makanan', 'Makanan', 'Makanan', 'Makanan', 'Makanan', 'Makanan', 'RumahAdat', 'RumahAdat', 'RumahAdat', 'RumahAdat', 'RumahAdat', 'RumahAdat', 'RumahAdat', 'Bangunan', 'Bangunan', 'Bangunan', 'Bangunan', 'Bangunan', 'Bangunan', 'Coloring', 'Coloring', 'Coloring', 'Pakaian'); 
        // for ($count=0; $count< 318; $count++){
        // $randomScan = rand(1, 6);
        // for($zs=0; $zs< $randomScan; $zs++){
        //             $randomCtgry = rand(0, 37);
        //             $randomHour = rand(01, 21);
        //             $randomMinute = rand(01, 59);
        //             $randomSecond = rand(1, 59);
        //             $randomTanggal = rand(1, 29);    

        //             $id_device = $dataDevice[$count]->id_device;
        //             $logging_date = '2017-04-'.$randomTanggal.' '.$randomHour.':'.$randomMinute.':'.$randomSecond;
        //             $object_name = $object_name_array[$randomCtgry];
        //             $category = $category_array[$randomCtgry];

        //             try {
        //                 $query = DB::table('log_scan_marker_category')
        //                                             ->insert(
        //                                                 array(
        //                                                         'id_device' => $id_device, 
        //                                                         'logging_date' => $logging_date,
        //                                                         'object_name' => $object_name,
        //                                                         'category' => $category
        //                                                     )
        //                                                 );
        //                     $checkSummary  = LogSummary::where('id_device',$id_device)->count();
        //                     if($checkSummary > 0){
        //                         $avg_temp =  DB::table('log_scan_marker_category')
        //                                     ->select(DB::raw("count(*) as counts"))
        //                                     ->where('id_device',$id_device)
        //                                     ->first();
        //                         $avg_user =  DB::table('log_scan_marker_category')
        //                                     ->select(DB::raw("count(*) as counts"))
        //                                     ->groupBy('id_device','logging_date')
        //                                     ->having('id_device',$id_device)
        //                                     ->first();
        //                         $countAvg = $avg_temp->counts / $avg_user->counts;	
        //                         $update = LogSummary::where('id_device',$id_device)->update(['avg_object_scanned'=> $countAvg]);
        //                     }else{
        //                         $avg_temp =  DB::table('log_scan_marker_category')
        //                                     ->select(DB::raw("count(*) as counts"))
        //                                     ->where('id_device',$id_device)
        //                                     ->first();
        //                         $avg_user =  DB::table('log_scan_marker_category')
        //                                     ->select(DB::raw("count(*) as counts"))
        //                                     ->groupBy('id_device','logging_date')
        //                                     ->having('id_device',$id_device)
        //                                     ->first();
        //                         $countAvg = $avg_temp->counts / $avg_user->counts;	
        //                         $data = [
        //                             'id_device' => $id_device,
        //                             'avg_open_apps' => 0,
        //                             'avg_object_scanned' => $countAvg,
        //                             'avg_minutes' => 1,
        //                             'avg_correct_trivia' => 0,
        //                             'avg_wrong_trivia' => 0
        //                         ];
        //                         $update = LogSummary::create($data);
        //                     }					
        //                 //return Response::json(array('status_code'=> 200, 'message' => 'Success Count Data'));
        //             } catch(\PDOException $exception) {
        //                 //return Response::json(array('status_code'=> 400, 'message' => 'An error occured'));
        //             }
        //         }	
        //     }
		
        //     return Response::json(array('status_code'=> 200, 'Count' => $count));

        //random trivia quiz
        //  $dataDevice =  DB::table('device')->get();
        // $correct_array = array('wrong', 'correct');
        // for ($count=0; $count< 318; $count++){
        // $randomScan = rand(1, 6);
        // for($zs=0; $zs< $randomScan; $zs++){
        //             $randomHour = rand(01, 21);
        //             $randomMinute = rand(01, 59);
        //             $randomSecond = rand(1, 59);
        //             $randomTanggal = rand(1, 29); 
        //             $randomTriviaQuiz = rand(01, 18);
        //             $randomCorrect = rand(0, 1);   

        //     $id_device = $dataDevice[$count]->id_device;
		// 	$logging_date = '2017-04-'.$randomTanggal.' '.$randomHour.':'.$randomMinute.':'.$randomSecond;
		// 	$id_trivia = $randomTriviaQuiz;
		// 	$result = $correct_array[$randomCorrect];
			
		// 	try {
		// 		$query = DB::table('log_trivia_quiz')
		// 									->insert(
		// 										array(
		// 												'id_device' => $id_device, 
		// 												'logging_date' => $logging_date,
		// 												'id_trivia' => $id_trivia,
		// 												'result' => $result
		// 											)
		// 										);
		// 		$checkSummary  = LogSummary::where('id_device',$id_device)->count();
		// 		if($checkSummary > 0){
		// 			if($result == 'wrong'){
		// 				$avg_temp =  DB::table('log_trivia_quiz')
		// 						->select(DB::raw("count(*) as counts"))
		// 						->where([['id_device','=', $id_device],['result','=','wrong']])
		// 						->first();
		// 				$avg_user =  DB::table('log_trivia_quiz')
		// 						->select(DB::raw("count(*) as counts"))
		// 						->where('result','=','wrong')
		// 						->groupBy('id_device','logging_date')
		// 						->having('id_device','=', $id_device)
		// 						->first();
		// 				$countAvg = $avg_temp->counts / $avg_user->counts;	
		// 				$update = LogSummary::where('id_device',$id_device)->update(['avg_wrong_trivia'=> $countAvg]);		

		// 			}else{
		// 				$avg_temp =  DB::table('log_trivia_quiz')
		// 						->select(DB::raw("count(*) as counts"))
		// 						->where([['id_device','=', $id_device],['result','=','correct']])
		// 						->first();
		// 				$avg_user =  DB::table('log_trivia_quiz')
		// 						->select(DB::raw("count(*) as counts"))
		// 						->where('result','=','correct')
		// 						->groupBy('id_device','logging_date')
		// 						->having('id_device','=', $id_device)
		// 						->first();
		// 				$countAvg = $avg_temp->counts / $avg_user->counts;	
		// 				$update = LogSummary::where('id_device',$id_device)->update(['avg_correct_trivia'=> $countAvg]);		
		// 			}
					
					
		// 		}else{
		// 			if($result == 'wrong'){
		// 				$avg_temp =  DB::table('log_trivia_quiz')
		// 						->select(DB::raw("count(*) as counts"))
		// 						->where([['id_device','=', $id_device],['result','=','wrong']])
		// 						->first();
		// 				$avg_user =  DB::table('log_trivia_quiz')
		// 						->select(DB::raw("count(*) as counts"))
		// 						->where('result','=','wrong')
		// 						->groupBy('id_device','logging_date')
		// 						->having('id_device','=', $id_device)
		// 						->first();

		// 				$countAvg = $avg_temp->counts / $avg_user->counts;
					
		// 				$data = [
		// 					'id_device' => $id_device,
		// 					'avg_open_apps' => 0,
		// 					'avg_object_scanned' => 0,
		// 					'avg_minutes' => 1,
		// 					'avg_correct_trivia' => 0,
		// 					'avg_wrong_trivia' => $countAvg
		// 				];
		// 				$update = LogSummary::create($data);		
		// 			}else{
		// 				$avg_temp =  DB::table('log_trivia_quiz')
		// 						->select(DB::raw("count(*) as counts"))
		// 						->where([['id_device','=', $id_device],['result','=','correct']])
		// 						->first();
		// 				$avg_user =  DB::table('log_trivia_quiz')
		// 						->select(DB::raw("count(*) as counts"))
		// 						->where('result','=','correct')
		// 						->groupBy('id_device','logging_date')
		// 						->having('id_device','=', $id_device)
		// 						->first();


		// 				$countAvg = $avg_temp->counts / $avg_user->counts;
					
		// 				$data = [
		// 					'id_device' => $id_device,
		// 					'avg_open_apps' => 0,
		// 					'avg_object_scanned' => 0,
		// 					'avg_minutes' => 1,
		// 					'avg_correct_trivia' => $countAvg,
		// 					'avg_wrong_trivia' => 0
		// 				];
		// 				$update = LogSummary::create($data);
		// 			}
					
		// 		}																		
		// 		//return Response::json(array('status_code'=> 200, 'message' => 'Success Count Data'));
		// 	} catch(\PDOException $exception) {
		// 		//return Response::json(array('status_code'=> 400, 'message' => 'An error occured'));
		// 	}
        //         }	
        //     }
		
        //     return Response::json(array('status_code'=> 200, 'Count' => $count));
}