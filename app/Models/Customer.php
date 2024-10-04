<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\Customer as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Shetabit\Visitor\Traits\Visitor;

class Customer extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;
    use Notifiable;
    use Visitor;
    protected $table = 'customers';
    protected $fillable = [
        'username',
        'password',
        'level',
        'create_at',
        'updated_at',
        'remember_token',
        'user_type',
        'status'
    ];
    public function informationCustomer()
    {
        return $this->hasOne(infomationCustomer::class);
    }
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function getAll(){
        return self::all();
    }
    public static function getData($type = 'get', $select = '*', $condition = '', $join = '', $perPage = '') {
        $query = self::select($select);
    
        if ($condition != '') {
            $query->where($condition);
        }
    
        if ($join != '') {
            $query->join($join[0], $join[1], $join[2], $join[3]);
        }                                           
        switch ($type) {
            case 'count':
                $results = $query->count();
                break;
            case 'sale':
                $results = $query->sum($select);
                break;
            case 'get':
                if ($perPage) {
                    $results = $query->paginate($perPage);
                } else {
                    $results = $query->get();
                }
                break;
            default:
                $results = $query->first();
                break;
        }
    
        return $results;
    }
    public static function functionBoth($data, $condition) { 
        return self::updateOrCreate($condition, $data);
    }
    public static function createCustomer($username,$password,$level,$user_type,$status){
        return self::create([
            'username'=>$username,
            'password'=>$password,
            'level'=>$level,
            'user_type'=>$user_type,
            'status'=>$status
        ]);
    }
    public static function updateStatus($id,$newStatus){
        $customer=self::select()->where('id',$id)->first();
        $customer->update([
            'status'=>$newStatus
        ]);
    }
   
    public static function deleteStatus($id){
        $customer=self::select()->where('id',$id)->first();
        if($customer){
            $customer->delete();
        }
        return false;
    }
}
