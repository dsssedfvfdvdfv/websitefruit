<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Online extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'sessionid',
        'lasttime',
        'created_at',
        'updated_at',
        'ip'
    ];

    public static function loadAll(){
        return self::all();
    }
    public static function getCountUser($sessionid,$lasttime,$ip){
        $user=new self;
        $user->sessionid=$sessionid;
        $user->lasttime=$lasttime;
        $user->ip=$ip;
        $user->save();
        return $user;
    }
    public static function updatetime($sessionid){   
        try {
            $user = self::select()->where('sessionid', $sessionid)->first();
            if ($user) {
                $user->lasttime = now('Asia/Ho_Chi_Minh');
                $user->save();              
                return true; 
            } else {
                echo "Không tìm thấy bản ghi với $sessionid: " . $sessionid;
                return false;
            }
        } catch (\Exception $e) {
            // In ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
            return false; 
        }
    }
    
   
}
