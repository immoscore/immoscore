<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
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
use App\Models\Region;
use App\Models\Woreda;
use App\Models\Kebele;
use App\Role;

use Dwij\Laraadmin\Helpers\LAHelper;
use Mail;
use Log;

class ProfilesController extends Controller
{
    public $show_action = true;
    public $view_col = 'name';
    public $listing_cols = ['id', 'name', 'email', 'role_id'];

    public function __construct() {
            // Field Access of Listing Columns
            if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
                    $this->middleware(function ($request, $next) {
                            $this->listing_cols = ModuleFields::listingColumnAccessScan('Users', $this->listing_cols);
                            return $next($request);
                    });
            } else {
                    $this->listing_cols = ModuleFields::listingColumnAccessScan('Users', $this->listing_cols);
            }
    }

    /**
     * Display a listing of the Profiles.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Module::hasAccess("Profiles", "view")) {
            $user = User::find($id);
            if (isset($user->id)) {
                $module = Module::get('Users');
                $module->row = $user;
                return view('la.profiles.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('user', $user);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("user"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
        
    /**
     * Change Password
     *
     * @return
     */
    public function change_password($id, Request $request) {

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
                        'password_confirmation' => 'required|min:6|same:password'
        ]);

        if ($validator->fails()) {
                return \Redirect::to(config('laraadmin.adminRoute') . '/profiles/'.$id)->withErrors($validator);
        }

        $user = User::where("id", $id)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        \Session::flash('success_message', 'Password is successfully changed');

        // Send mail to User his new Password
        if(env('MAIL_USERNAME') != null && env('MAIL_USERNAME') != "null" && env('MAIL_USERNAME') != "") {
                // Send mail to User his new Password
                Mail::send('emails.send_login_cred_change', ['user' => $user, 'password' => $request->password], function ($m) use ($user) {
                        $m->from(LAConfigs::getByKey('default_email'), LAConfigs::getByKey('sitename'));
                        $m->to($user->email, $user->name)->subject('LaraAdmin - Login Credentials chnaged');
                });
        } else {
                Log::info("User change_password: username: ".$user->email." Password: ".$request->password);
        }

        return redirect(config('laraadmin.adminRoute') . '/profiles/'.$id.'#tab-account-settings');
    }

}
