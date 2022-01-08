<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderMail;
use App\Models\Users;
use App\Jobs\SendMailJob;
use App\Models\Demoform;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function signup(Request $request) {
        $err_message='';
        $data = $request->all();
        $rules = [
            'name' => 'required|max:50|min:3|alpha_num',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/[A-Z]/|regex:/[~!@#$%^&*]/|regex:/[0-9]/',
        ];
        $messages = [
            'name.required' => 'Name Required',
            'name.max' => 'Name must be maximum character of 50',
            'name.min' => 'Name must be minimum character of 3',
            'name.alpha_num' => 'Name must be alpha numeric',
            'email.required' => 'Email Required',
            'email.email' => 'Invalid Email',
            'password.required' => 'Password Required',
            'password.min' => 'Password must be minimum character of 8',
            'password.regex' => 'Password must contain atleast one special character, one capital letter and one number'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if($validator->fails()) {
            $err = $validator->errors()->all();
            foreach($err as $key => $value) {
                $err_message = $value;
                break;
            }
            return ['status' => 'error', 'message' => $err_message];
        } else {
            Users::create($data);
            return ['status' => 'success', 'message' => 'success'];
        }
    }


    public function email() {
        $user = ['email' => 'surendar21094@gmail.com', 'name' => 'Surendar', 'id' => 1];
        $to = "surendar021094@gmail.com";
        //Log::channel('db')->error('Test Queue');
        //SendMailJob::dispatch($user);
        Mail::to($to)->send(new ReminderMail($user));
        return ['status' => 'success', 'message' => 'Mail send successfully'];
    }

    public function addDemoForm(Request $request) {
        $data = $request->all();
        $demo = Demoform::create($data);
        if($demo->wasChanged()) {
            return ['status' => 'failed', 'message' => 'Inserted failed'];
        } else {
            return ['status' => 'success', 'message' => 'Insert Success'];
        }
    }

    public function editDemoForm(Request $request) {
        $id = $request->route('id');
        //$data = $request->all();
        //$data = Demoform::find($id, ['name', 'email', 'enumfield']);
        //$data = Demoform::all('name', 'email', 'enumfield')->where('id', $id);
        $data = DB::table('demoform')->select('name', 'email', 'enumfield')->where('id', $id)->get();
        return $data;
        $data = Demoform::where('id', $id)->get(['name', 'email', 'enumfield']);
        return $data;
        $demo = Demoform::where('id', 13)->update($data);
        return ['status' => 'success', 'message' => 'Update Success'];
    }
}
