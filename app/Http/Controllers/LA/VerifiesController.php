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
use DateTime;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\Models\Verify;

class VerifiesController extends Controller {

    public $show_action = true;
    public $view_col = 'is_verified';
    public $listing_cols = ['id', 'is_verified', 'tenant_id'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Verifies', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Verifies', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Verifies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $module = Module::get('Verifies');
        $user = Auth::user();

        if ($user->user_type == "employer") {
            $user_profile = DB::table('my_profiles')->where("email_address", $user->email)->where("is_verified", "0")->get();
        } else {
            $user_profile = DB::table('my_profiles')->where("landlord_email", $user->email)->orderBy("is_verified", "desc")->get();
        }
        if (Module::hasAccess($module->id)) {
            return View('la.verifies.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'user_profile' => $user_profile,
                'user' => $user,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new verify.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created verify in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Module::hasAccess("Verifies", "create")) {

            $rules = Module::validateRules("Verifies", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Verifies", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.verifies.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified verify.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Verifies", "view")) {

            $verify = Verify::find($id);
            if (isset($verify->id)) {
                $module = Module::get('Verifies');
                $module->row = $verify;

                return view('la.verifies.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('verify', $verify);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("verify"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified verify.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        if (Module::hasAccess("Verifies", "edit")) {
            $verify = DB::table('my_profiles')->where("id", $id)->first();
            $user = Auth::user();
            if (isset($verify->id)) {
                $module = Module::get('Verifies');

                $module->row = $verify;

                return view('la.verifies.edit', [
                            'user' => $user,
                            'module' => $module,
                            'view_col' => $this->view_col,
                        ])->with('verify', $verify);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("verify"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified verify in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Verifies", "edit")) {

            $rules = Module::validateRules("Verifies", $request, true);
            $user = Auth::user();
            if ($user->user_type == "employer") {
                $date = DateTime::createFromFormat("m/d/Y", $request->input('contract_start_date'));
                $lease_start_date = $date->format('Y-m-d');
                $date = DateTime::createFromFormat("m/d/Y", $request->input('contract_end_date'));
                $lease_end_date = $date->format('Y-m-d');
                $request->merge(["lease_start_date" => $lease_start_date, "lease_end_date" => $lease_end_date]);
                $save_data = array("occupation" => $request->input('occupation'),
                    "name_of_employer" => $request->input('name_of_employer'),
                    "position" => $request->input('position'),
                    "contract_type" => $request->input('contract_type'),
                    "is_verified" => $request->input('is_verified'),
                    "verify_description" => $request->input('verify_description'),
                    "contract_start_date" => $lease_start_date,
                    "contract_end_date" => $lease_end_date);

            } else {
                $date = DateTime::createFromFormat("m/d/Y", $request->input('lease_start_date'));
                $lease_start_date = $date->format('Y-m-d');
                $date = DateTime::createFromFormat("m/d/Y", $request->input('lease_end_date'));
                $lease_end_date = $date->format('Y-m-d');
                $request->merge(["lease_start_date" => $lease_start_date, "lease_end_date" => $lease_end_date]);
                $save_data = array("address" => $request->input('address'),
                    "area" => $request->input('area'),
                    "monthly_rent" => $request->input('monthly_rent'),
                    "rental_type" => $request->input('rental_type'),
                    "is_verified" => $request->input('is_verified'),
                    "verify_description" => $request->input('verify_description'),
                    "lease_start_date" => $lease_start_date,
                    "lease_end_date" => $lease_end_date);
            }
            DB::table('my_profiles')
                    ->where('id', $id)
                    ->update($save_data);
            return redirect()->route(config('laraadmin.adminRoute') . '.verifies.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified verify from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Verifies", "delete")) {
            Verify::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.verifies.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Datatable Ajax fetch
     *
     * @return
     */
    public function dtajax() {
        $values = DB::table('verifies')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Verifies');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/verifies/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Verifies", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/verifies/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Verifies", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.verifies.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string) $output;
            }
        }
        $out->setData($data);
        return $out;
    }

}
