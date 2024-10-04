<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'productname',
        'description',
        'price',
        'stock_quantity',
        'SupplierID',
        'hot',
        'image',
        'status',
        'orderposition',
        'CategoryID',
        'alias',
        'view',
        'keyword',
        'description_keyword',
        'slug',
        'sale'
    ];


    public static function getAllProduct()
{
    return self::select('b.Company as SupplierName','c.name as MethodName', 'a.*')
        ->from('products as a')
        ->join('suppliers as b', 'a.SupplierID', '=', 'b.id')
        ->join('categories as c', 'a.CategoryID', '=', 'c.id')
        ->get();
    }

    
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

  
    public static function deleteProduct($id){
        $id=self::select()->where('id',$id)->first();
        if($id){
            $id->delete();
        }
        return false;
    }

 
   
}
