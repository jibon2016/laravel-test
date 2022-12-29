<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    private static $user,$image,$imageName,$directory,$imageUrl,$extension;

    public static function createUserInfo($request, $user_id){
        self::$user = new UserInfo();

        self::$user->user_id        =  $user_id;
        self::$user->first_name     =  $request->firstName;
        self::$user->last_name      =  $request->lastName;
        self::$user->address        =  $request->address;
        self::$user->image          =  self::getImageUrl($request);

        self::$user->save();

        return self::$user;
    }

    public static function updateUserInfo($request, $user_id)
    {
        self::$user = UserInfo::find($user_id);
        
        if($request->file('image'))
        {
            if(file_exists(self::$user->image))
            {
                unlink(self::$user->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$user->image;
        }

        self::$user->user_id        =  $user_id;
        self::$user->first_name     =  $request->firstName;
        self::$user->last_name      =  $request->lastName;
        self::$user->address        =  $request->address;
        self::$user->image          =  self::$imageUrl;

        self::$user->save();
        return self::$user;
    }

    public static function getImageUrl($request)
    {
        self::$image        =$request->file('image');
        self::$extension    =self::$image->getClientOriginalExtension();
        self::$imageName    = time().'.'.self::$extension;
        self::$directory    ='User/';
        self::$image->move(self::$directory,self::$imageName);

        return self::$directory.self::$imageName;
    }
}
