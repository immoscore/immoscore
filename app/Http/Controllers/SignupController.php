<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\Models\User;
use App\Role;
use Dwij\Laraadmin\Helpers\LAHelper;
use Dwij\Laraadmin\Models\LAConfigs;
use Illuminate\Support\Facades\Crypt;
use Mail;
use Log;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class SignupController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index() {
        $roleCount = Role::count();
        if ($roleCount != 0) {
            if ($roleCount != 0) {
                $roles = Role::where("name", "!=", "SUPER_ADMIN")->whereIn("id",["10","11","12"])->whereNull("deleted_at")->get();
                
                return view('front-end.userforms.signup', ["roles" => $roles]);
//				return redirect('admin');
            }
        } else {
            return view('errors.error', [
                'title' => 'Migration not completed',
                'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
            ]);
        }
    }

    public function savedata(Request $request) {
//        dd($request->all());
        $rules = Module::validateRules("Users", $request);
//dd($rules);
        $validator = Validator::make($request->all(), [
                    'name' => 'required|min:5',
                    'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $insert_id = Module::insert("Users", $request);

        DB::table('role_user')->insert([
            'user_id' => $insert_id,
            'role_id' => $request->role_id,
        ]);

        $user['email'] = $request->input('email');
        $user['name'] = $request->input('name');
        $encrypted = encrypt($insert_id . "-" . time());
        $user['id'] = $encrypted;
        DB::table('users')->where('id', $insert_id)->update([
            'remember_token' => $user['id']
        ]);

        DB::table('my_profiles')->insert([
            'user_id' => $insert_id
        ]);

        Mail::send(['html' => 'emails.email_Verification'], ["user" => $user], function ($m) use ($user) {
            $m->from(LAConfigs::getByKey('default_email'), LAConfigs::getByKey('sitename'));
            $m->to($user['email'], $user['name'])->subject('Verification Email!');
        });


        return redirect()->back()->withSuccess('Thanks for Joining us.Please check your inbox to verify your email and set your Password.');
//            return redirect()->route('signup');
    }

    public function varify_email(Request $request) {
        $token = $id = $request->input('id');
        $id = explode("-", decrypt($id));
        $curtime = time();
        $total_time = $id[1] - $curtime;

        $id = $id[0];
        $user = User::where("id", "=", $id)->whereNull("deleted_at")->first();
        $id = $token;


        $roleCount = \App\Role::count();
        if ($roleCount != 0) {
            if ($roleCount != 0) {
                return view('front-end.userforms.reset_password', [
                    'token' => $token,
                    'user_details' => $user
                ]);
            }
        } else {
            return view('errors.error', [
                'title' => 'Migration not completed',
                'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
            ]);
        }
    }

    public function change_password(Request $request) {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
                    'password' => 'required|min:6',
                    'password_confirmation' => 'required|min:6|same:password'
        ]);
        $token = $id = $request->input('token');
        $id = explode("-", decrypt($id));
        $curtime = time();
        $total_time = $id[1] - $curtime;

        $id = $id[0];
        $user = User::where("id", "=", $id)->whereNull("deleted_at")->first();

        if ($validator->fails()) {
            return \Redirect::to(config('laraadmin.adminRoute') . '/profiles/' . $id)->withErrors($validator);
        }

        $user = User::where("id", $id)->first();
        $user->password = bcrypt($request->input('password'));

        $user->save();
        Mail::send('emails.send_login_cred_varified', ['user' => $user, 'password' => $request->input('password')], function ($m) use ($user) {
            $m->from(LAConfigs::getByKey('default_email'), LAConfigs::getByKey('sitename'));
            $m->to($user->email, $user->name)->subject('Login Credentials changed');
        });

        if (\Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password])
        ) {
            return redirect()->intended('admin/my_profiles');
        }
        exit();
        \Session::flash('success_message', 'Your Password has been successfully updated. Please Login.');
        return redirect('/signin')->withSuccess('Your Password has been successfully updated. Please Login.');
        exit();
        // Send mail to User his new Password
        if (env('MAIL_USERNAME') != null && env('MAIL_USERNAME') != "null" && env('MAIL_USERNAME') != "") {

            // Send mail to User his new Password
            Mail::send('emails.send_login_cred_change', ['user' => $user, 'password' => $request->input('password')], function ($m) use ($user) {
                $m->from(LAConfigs::getByKey('default_email'), LAConfigs::getByKey('sitename'));
                $m->to($user->email, $user->name)->subject('LaraAdmin - Login Credentials chnaged');
            });
        } else {
            Log::info("User change_password: username: " . $user->email . " Password: " . $request->password);
        }
    }

//
    public function test_email() {
//        dd($request->all());
        $user = User::where("id", "=", "1")->whereNull("deleted_at")->first();

        Mail::send('emails.send_login_cred_varified', ['user' => $user, 'password' => "123"], function ($m) use ($user) {
//            echo LAConfigs::getByKey('default_email');die;
            $m->from(LAConfigs::getByKey('default_email'), LAConfigs::getByKey('sitename'));
            $m->to("testvikrs@mailinator.com", "Vikas")->subject('Login Credentials chnaged');
        });
    }

}
