<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use Session;
use App\PhotoProduct;

class ProductController extends Controller
{
    public function index(){
    	$product = Product::All();
    	return view('admin.product.product')->with('product',$product);
    }
    public function getCreate(){
    	return view('admin.product.tambah');
    }
    public function postCreate(Request $request){
    	if($request->file('tumbnail') == ''){
                    $fileName = '';

                }else{
                        
                        $destinationPath = 'img'; // upload path
                        $extension = $request->file('tumbnail')->getClientOriginalExtension(); // getting image extension
                        $fileName = str_slug($request->input('product_name'), "-").'.'.$extension; // renameing image
                        $request->file('tumbnail')->move($destinationPath, $fileName);
                        //Image::make($destinationPath.'/'.$fileName)->resize(1280,720)->save();
     } 
    	$data =  [
    			'product_name' => $request->input('product_name'),
    			'description' => $request->input('description'),
                'tumbnail' => $fileName,
                'price' => $request->input('price'),
                'weight' => $request->input('weight'),
                'specification' => $request->input('specification')
    	];
    	$create = Product::create($data);

    	$finds = Product::where('tumbnail',$fileName)->first();

    	if($request->input('image')){
    		$img = $request->input('image');
    		$i = 1;
    		foreach ($img as $img) {
    			$destinationPath = '/img/product_photo'; // upload path
                $extension = $img->getClientOriginalExtension(); // getting image extension
                $fileName = str_slug($request->input('product_name'), "-").'-'.$i.'.'.$extension; // renameing image
                $img->move($destinationPath, $fileName);

                $photo = [
                	'photo_url' => $fileName,
                	'id_product' => $finds->id_product
                ];
                PhotoProduct::create($photo);
                $i++;
    		}
    	}

    	if($create){
    		Session::flash('success','Product has been save');
    		return redirect('/admin/product/create');
    	}
    }
}
