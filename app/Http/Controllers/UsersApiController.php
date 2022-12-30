<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UsersApiController extends Controller
{
    public function showUsers($id = null){
        if ($id == '') {
            $users = User::get();
            return response()->json(['user' => $users], 200);
        } else {
            $users = User::find($id);
            return response()->json(['user' => $users], 200);
        }
    }
    public function addUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                "phone" => "required",
                "email" => "required|email|unique:users",
                "password" => "required"
            ];
            $customMessage = [
                'phone.required' => "Phone Feild is required",
                'email.required' => " Email Feild is requird",
                'email.email' => "Email must be a valid email",
                "passowrd.required" => "Password is required",
            ];
            $validator = Validator::make($data, $rules, $customMessage);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $user = new User();
            $user->phone = $data['phone'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            $msg = "User Data Successfully Add";
            return response()->json(['message' => $msg], 201);
        }
    }

    public function updateUser(Request $request, $id) {
        if ($request->isMethod('put')) {
            $data = $request->all();
            $rules = [
                "phone" => "required",
                "password" => "required"
            ];
            $customMessage = [
                'phone.required' => "Phone Feild is required",
                "passowrd.required" => "Password is required",
            ];
            $validator = Validator::make($data, $rules, $customMessage);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $user =  User::findOrFail($id);
            $user->phone = $data['phone'];
            $user->password = bcrypt($data['password']);
            $user->save();
            $msg = "User Data Successfully Updated";
            return response()->json(['message' => $msg], 202);
        }
    }
    public function deleteUser ($id)
    {
        User::findOrFail($id)->delete();
        $msg = "User Deleted Successfully";
        return response()->json(['message' => $msg], 200);
    }
}
