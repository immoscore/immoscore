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
use App\Models\Visit;

class VisitsController extends Controller {

    public $show_action = true;
    public $view_col = 'address';
    public $listing_cols = ['id', 'address', 'application_id', 'upcoming_date', 'post_date', 'visit_type'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Visits', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Visits', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Visits.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $module = Module::get('Visits');

        if (Module::hasAccess($module->id)) {
            return View('la.visits.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new visit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created visit in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Module::hasAccess("Visits", "create")) {
            $user = Auth::user();
            if ($request->input('visit_id') != "") {
                if ($request->input('status') != '') {
                    $save_data = array("status" => $request->input('status'), "comment" => $request->input('comment'));
                    if ($request->input('status') == "Interested") {
                        $save_data["visit_type"] = "Post";
                    }
                    DB::table('visits')->where("id", $request->input('visit_id'))
                            ->update($save_data);
                } else if ($request->input('avaibale_status') != '') {
                    $save_data = array("avaibale_status" => $request->input('avaibale_status'), "comment" => $request->input('comment'));
                    if ($request->input('avaibale_status') == "Available") {
                        $save_data["visit_type"] = "Offer";
                    }

                    DB::table('visits')->where("id", $request->input('visit_id'))
                            ->update($save_data);
                }

                return redirect()->route(config('laraadmin.adminRoute') . '.searches.index');
            } else {
                $date = DateTime::createFromFormat("m/d/Y" , $request->input('appointment_date'));
                $appointment_date = $date->format('Y-m-d');
                if ($request->input('status') == "Available") {

                    DB::table('apply_applications')->where("id", $request->input('application_id'))
                            ->update(["comment" => $request->input('comment'), "apply_type" => "Upcoming", "status" => "Available"]);
                    $save_data = array("address" => $request->input('address_id'), "application_id" => $request->input('application_id'),
                        "upcoming_date" => $appointment_date, "visit_type" => "Upcoming", "user_id" => $user->id);
                    DB::table('visits')
                            ->insertGetId($save_data);
                    return redirect()->route(config('laraadmin.adminRoute') . '.my_profiles.index');
                } else {
                    DB::table('apply_applications')->where("id", $request->input('application_id'))
                            ->update(["comment" => $request->input('comment'), "status" => "No longer available"]);
                    return redirect()->route(config('laraadmin.adminRoute') . '.my_profiles.index');
                }
            }
            die;
            $rules = Module::validateRules("Visits", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Visits", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.visits.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified visit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Visits", "view")) {

            $visit = Visit::find($id);
            if (isset($visit->id)) {
                $module = Module::get('Visits');
                $module->row = $visit;

                return view('la.visits.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('visit', $visit);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("visit"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified visit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Module::hasAccess("Visits", "edit")) {
            $visit = Visit::find($id);
            if (isset($visit->id)) {
                $module = Module::get('Visits');

                $module->row = $visit;

                return view('la.visits.edit', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                        ])->with('visit', $visit);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("visit"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified visit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Visits", "edit")) {

            $rules = Module::validateRules("Visits", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                ;
            }

            $insert_id = Module::updateRow("Visits", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.visits.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified visit from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Visits", "delete")) {
            Visit::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.visits.index');
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
        $values = DB::table('visits')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Visits');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/visits/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Visits", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/visits/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Visits", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.visits.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
