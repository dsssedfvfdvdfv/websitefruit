<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable=[
        'Company',
        'Owner',
        'ContactSigingDate',
        'numberphone',
        'email',
        'adress',
    ];

    public static function getCompanyActive(){
        return self::where('status',true)
        ->pluck('id','Company')
        ->toArray()
        ;
    }
}
