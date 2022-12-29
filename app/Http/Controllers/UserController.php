<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userInfo, $user;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('users.completeProfile');
    }

    public function updateProfile($user_id)
    {
        $this->userInfo =  UserInfo::find($user_id);
        return view('users.updateProfile', [
            'userInfo' => $this->userInfo
        ]);
    }

    public function saveUserInfo(Request $request, $user_id)
    {
        $request->validate([
            'firstName' => 'required|max:255',
            'lastName'  => 'required|max:255',
            'address'   => 'required',
            'image'     => 'mimes:jpg,png,jpeg',
        ]);
        if(UserInfo::find($user_id) == null)
        {
            $this->userInfo = UserInfo::createUserInfo($request, $user_id);
    
            return redirect()->to('/home')->with('message', "Information Stored!");
        }
        $this->userInfo = UserInfo::updateUserInfo($request, $user_id);
    
        return redirect()->to('/home')->with('message', "Information Updated!");

        
    }

    public function users()
    {
        $this->user = User::all();
        return view('users.all', [
            'users' => $this->user
        ]);
    }

    public function viewUser ($user_id)
    {
        $this->user = User::find($user_id);

        return view('users.view', [
            'user' => $this->user
        ]);
    }
}
