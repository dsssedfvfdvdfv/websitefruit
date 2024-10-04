<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';
    protected $fillable = [    
        'ProductID',
        'productName',
        'quantity',
        'price',
        'orderID',
        'create_at',       
    ];


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
}
