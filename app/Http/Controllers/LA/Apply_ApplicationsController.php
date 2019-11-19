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
use App\Models\Apply_Application;
use Dwij\Laraadmin\Models\LAConfigs;
use Mail;

class Apply_ApplicationsController extends Controller {

    public $show_action = true;
    public $view_col = 'user_id';
    public $listing_cols = ['id', 'user_id', 'address_id', 'status', 'date_time', 'apply_type'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Apply_Applications', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Apply_Applications', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Apply_Applications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $module = Module::get('Apply_Applications');

        if (Module::hasAccess($module->id)) {
            return View('la.apply_applications.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new apply_application.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created apply_application in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Module::hasAccess("Apply_Applications", "create")) {
            $rules = Module::validateRules("Apply_Applications", $request);

            $validator = Validator::make($request->all(), $rules);
            $properties = DB::table('my_properties')->select('my_properties.*','users.name as user_name','users.email as user_email')
                            ->join("users", "users.id", "=", "my_properties.user_id")
                            ->where('my_properties.id',$request->input('address_id'))
                            ->whereNull('my_properties.deleted_at')->first();

            $user = Auth::user();

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Apply_Applications", $request);


            $email_data = array("tenent"=>$user->name,"name"=>$properties->user_name,'address'=>$properties->address);

            Mail::send('emails.apply_property', ['user' => $email_data], function ($m) use ($properties) {
                $m->from(LAConfigs::getByKey('default_email'), LAConfigs::getByKey('sitename'));
                $m->to($properties->user_email, $properties->user_name)->subject('Immoscore : Applied Property');
            });
            return redirect(config('laraadmin.adminRoute') . "/searches?step=search");
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified apply_application.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Apply_Applications", "view")) {

            $apply_application = Apply_Application::find($id);
            if (isset($apply_application->id)) {
                $module = Module::get('Apply_Applications');
                $module->row = $apply_application;

                return view('la.apply_applications.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('apply_application', $apply_application);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("apply_application"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified apply_application.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Module::hasAccess("Apply_Applications", "edit")) {
            $apply_application = Apply_Application::find($id);
            if (isset($apply_application->id)) {
                $module = Module::get('Apply_Applications');

                $module->row = $apply_application;

                return view('la.apply_applications.edit', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                        ])->with('apply_application', $apply_application);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("apply_application"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified apply_application in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Apply_Applications", "edit")) {

            $rules = Module::validateRules("Apply_Applications", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                ;
            }

            $insert_id = Module::updateRow("Apply_Applications", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.apply_applications.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified apply_application from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Apply_Applications", "delete")) {
            Apply_Application::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.apply_applications.index');
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
        $values = DB::table('apply_applications')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Apply_Applications');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/apply_applications/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Apply_Applications", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/apply_applications/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Apply_Applications", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.apply_applications.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
