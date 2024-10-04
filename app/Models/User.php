<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Redis;
use Shetabit\Visitor\Traits\Visitor;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use Notifiable;
    use Visitor;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'avatar',
        'numberphone',
        'birthday',
        'sex',
        'user_type',
        'date_join',
        'date_off',
        'status',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getAllUser(){
        return self::all()     ;
    }
    // public static function createUser($name, $email, $password, $status,$role)
    // {
    //     $user = new self;
    //     $user->name = $name;
    //     $user->email = $email;
    //     $user->password = $password;
    //     $user->status = $status;
    //     $user->role=$role;
    //     $user->save();
    //     return $user;
    // }
    public static function createUser($name, $email, $password, $status, $role,$user_type)
{
    return self::create([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'status' => $status,
        'role' => $role,
        'user_type'=>$user_type
    ]);
}
   
public static function updateAccount($id,$name,$address,$avatar,$numberphone,$birthday,$sex,$user_type,$role){
    $user=User::select()->where('id',$id)->first();
    $user->update([
        'name'=>$name,
        'address'=>$address,
        'avatar'=>$avatar,
        'numberphone'=>$numberphone,
        'birthday'=>$birthday,
        'sex'=>$sex,
        'user_type'=>$user_type,
        'role'=>$role
    ]);
}
    public static function updateStatus($userId, $newStatus)
    {
        $user = self::find($userId);

        if ($user) {
            $user->status = $newStatus;
            return $user->save(); // Lưu thay đổi và trả về true nếu thành công
        }

        return false; // Người dùng không tồn tại
    }

    public static function edit($id){
        return self::select()->where('id',$id)->first();
    }
    public static function deleteAccout($id){
        $user=self::findOrFail($id);
        if($user){
            $user->delete();
        }
        return false;
    }
    
}
