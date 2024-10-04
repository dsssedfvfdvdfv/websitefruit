<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LicensePlatesController extends Controller
{
    public function index()
    {
        
       return view('licenseplates');
    }

    public function processForm($request)
    {
        $licensePlate = $request->input('license_plate');


        if (preg_match('/^(\d{2}[A-Z](\d{4}|\d{5}))$/', $licensePlate, $matches)) {
            $prefix = substr($matches[1], 0, 3);
            $suffix = substr($matches[1], 3);


            if (strlen($suffix) == 5) {
                $formattedLicensePlate = $prefix . '-' . substr($suffix, 0, 3) . '.' . substr($suffix, 3, 2);
            } elseif (strlen($suffix) == 4) {
                $formattedLicensePlate = $prefix . '-' . $suffix;
            }

            return "Biển số xe: " . $formattedLicensePlate;
        } else {
            return 'Biển số không hợp lệ';
        }
    }
    public function processlinceplates($request)
    {
        $licensePlate = $request->input('license_plate');

        // Xóa tất cả các dấu "-"
        $licensePlateWithoutHyphen = str_replace('-', '', $licensePlate);
        $licensePlateWithoutHyphenn = str_replace('.', '', $licensePlateWithoutHyphen);
        return "Biển số xe 5 số: " . $licensePlateWithoutHyphenn;
    }
    public function processlinceplates4number($request)
    {
        $licensePlate = $request->input('license_plate');

        // Xóa tất cả các dấu "-"
        $licensePlateWithoutHyphen = str_replace('-', '', $licensePlate);

        return "Biển số xe 4 số: " . $licensePlateWithoutHyphen;
    }
    public function processName($request)
    {
        $licensePlate = $request->input('license_plate');
        $formattedName = str_replace(" ", "", $licensePlate);

        return "Tên sau khi chuyển đổi: " . $formattedName;
    }
    public function processAll(Request $request)
    {
        $licensePlate = $request->input('license_plate');
        $result = [];

        if (preg_match('/^(\d{2}[A-Z](\d{4}|\d{5}))$/', $licensePlate)) {
            $result = $this->processForm($request);
        } elseif (preg_match('/^\d{2}[A-Z]-\d{3}\.\d{2}$/', $licensePlate)) {
            $result = $this->processlinceplates($request);
        } elseif (preg_match('/^\d{2}[A-Z]-\d{4}$/', $licensePlate)) {
            $result = $this->processlinceplates4number($request);
        } else {
            $result = $this->processName($request);
        }

        return $result;
    }


    public function convenrtName(Request $request)
    {
        $name = $request->input('name');
        $mangTen = explode(" ", $name);
        // for ($i = 0; $i < count($mangTen); $i++) {
        //     $ky_tu = $mangTen[$i];
        //     echo $ky_tu . " ";
        // }
        $tencuoicung= array_pop($mangTen);     
     
        // foreach ($mangTen as $name) {
        //     echo $name;
        // }
        $chuoiChuCaiDau = array();
        for ($i = 0; $i < count($mangTen); $i++) {
            $tu = $mangTen[$i];
            $chuCaiDau = mb_substr($tu, 0, 1, "UTF-8"); 
            $chuoiChuCaiDau[] = $chuCaiDau; 
        }    
        if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $name)) {
            return redirect()->back()->with('error','Không nhập ký tự đặc biệt');
        }elseif (preg_match('/[0-9]/', $name)) {
            return redirect()->back()->with('error','Không nhập số');
        }
        elseif($mangTen==null){
            return redirect()->back()->with('error','Không nhập khoảng trắng');
        }
        else if($chuoiChuCaiDau==null){
            $tenMoi = mb_strtolower($this->convert_name($tencuoicung)); 
        }
        else{
            $tenMoi = mb_strtolower($this->convert_name($tencuoicung)) . "." .  mb_strtolower($this->convert_name(implode("", $chuoiChuCaiDau)));
        }
        
         
     
       
        return 'Tên sau khi chuyển đổi là: ' . $tenMoi;
    }
  

    public function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}

   
}
