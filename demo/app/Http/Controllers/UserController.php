<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;

class UserController extends Controller
{
    public function show(Request $request) {
        $id = $request->route('id');
        return "User ID is => $id";
    }

    public function fields(Request $request, Users $users) {
        $data = $request->all();
        if ($request->hasHeader('X-header')) {
            echo $request->header('X-header')."<br/>";
        }
        if ($request->hasHeader('Content-Type')) {
            echo $request->header('Content-Type')."<br/>";
        }
        //$data = $users->allUsers();
        $rules = [
            'name' => 'required|max:50|min:3|alpha_num',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
        $message = [
            'name.required' => 'Name Required',
            'name.max' => 'Name can be maximum 50 characters only',
            'name.min' => 'Name must be minimum 3 characters',
            'name.alpha_num' => 'Name must be alpha numeric',
            'email.required' => 'Email Required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Already email available',
            'password.required' => 'Password Required',
        ];
        $err_message='';
        $validator = Validator::make($data, $rules, $message);
        if($validator->fails()) {
            $err = $validator->errors()->all();
            $err = (array) $err;
            foreach($err as $key => $value) {
                $err_message = $value;
                break;
            }
            return ['status' => 'error', 'message' => $err_message];
        } else {
            $users = Users::where('emails', 'test')->get();
            return ['status' => 'error', 'message' => $err_message];
            $err = Users::create($data);
            if($err) {
                return ['status' => 'error', 'message' => $err_message];
            } else {
                return ['status' => 'error', 'message' => 'Something went wrong'];
            }
        }
    }
}
