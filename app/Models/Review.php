<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'CodeID',
        'rating',
        'productID',
        'comment',
        'created_at',
        'typeaccount',
        
    ];

    public static function editProduct($id){
        return self::select()->where('id',$id)->first();
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

    public static function loadComment($id){
        return self::select()
    ->join('customers', 'reviews.CodeID', '=', 'customers.username')
    ->join('infomationcustomer', 'customers.id', '=', 'infomationcustomer.customerID')
    ->where('reviews.productID', $id)
    ->get();

    }
    public static function loadCommentCount($id){
     return self::select()
    ->join('customers', 'reviews.CodeID', '=', 'customers.username')
    ->join('infomationcustomer', 'customers.id', '=', 'infomationcustomer.customerID')
    ->where('reviews.productID', $id) 
    ->count();

    }

    public static function deleteProduct($id){
        $id=self::select()->where('id',$id)->first();
        if($id){
            $id->delete();
        }
        return false;
    }
}
