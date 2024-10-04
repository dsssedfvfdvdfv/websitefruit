<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infomationCustomer extends Model
{
    use HasFactory;
    protected $table = 'infomationcustomer';
    protected $fillable = [
        'firstname',
        'lastname',
        'numberphone',
        'email',
        'city',
        'adress',
        'birthday',
        'sex',
        'customerID',
        'avatar',
        'created_at'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
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
 
}
