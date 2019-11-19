<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role_id != 1) {
            return redirect()->intended('admin/my_profiles');
            exit();
        }
        $my_profile = DB::table('my_profiles')->where("user_id",$user->id)->whereNull('deleted_at')->first();
        return view('la.dashboard',["user"=>$user,"my_profile"=>$my_profile]);
    }
}