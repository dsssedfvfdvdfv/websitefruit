<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function submitreview(Request $request){
        $content = $request->input('comment'); 
        $value = Cookie::get('cookieName'); 
        $id = $request->input('idproduct');
        $data = [
            'CodeID' => $value,
            'comment' => $content,
            'productID' => $id,
            'typeaccount' => 1
        ];            
            Review::create($data);               
            return response()->json($data);           
    }
    
   
    
}
