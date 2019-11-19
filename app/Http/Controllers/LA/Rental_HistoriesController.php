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
use App\Models\Rental_History;
use App\Models\User;
use App\Models\My_property;

class Rental_HistoriesController extends Controller {

    public $show_action = true;
    public $view_col = 'owner_name';
    public $listing_cols = ['id', 'owner_name', 'email', 'address', 'city', 'country', 'rental_type', 'housing_type', 'area', 'rent', 'start_date', 'end_date', 'user_id'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Rental_Histories', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Rental_Histories', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Rental_Histories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $module = Module::get('Rental_Histories');
        $landlords = User::whereNull('deleted_at')->where('role_id', "11")->lists("name", "id");

        //loop for get first landlord id
        foreach ($landlords as $first_landlord_id => $name) {
            break;
        }

        $properties = My_property::whereNull('deleted_at')->where('user_id', $first_landlord_id)->lists("address", "id");

        if (Module::hasAccess($module->id)) {
            return View('la.rental_histories.index', [
                'show_actions' => $this->show_action,
                'landlords' => $landlords,
                'properties' => $properties,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new rental_history.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created rental_history in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Module::hasAccess("Rental_Histories", "create")) {

            $rules = Module::validateRules("Rental_Histories", $request);
            $user = Auth::user();
            $request->merge(["user_id" => $user->id]);
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Rental_Histories", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.rental_histories.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified rental_history.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Rental_Histories", "view")) {

            $rental_history = Rental_History::find($id);
            if (isset($rental_history->id)) {
                $module = Module::get('Rental_Histories');
                $module->row = $rental_history;

                return view('la.rental_histories.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('rental_history', $rental_history);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("rental_history"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified rental_history.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Module::hasAccess("Rental_Histories", "edit")) {
            $rental_history = Rental_History::find($id);
            $landlords = User::whereNull('deleted_at')->where('role_id', "11")->lists("name", "id");
            $properties = My_property::whereNull('deleted_at')->where('user_id', $rental_history->owner_name)->lists("address", "id");
            if (isset($rental_history->id)) {
                $module = Module::get('Rental_Histories');

                $module->row = $rental_history;

                return view('la.rental_histories.edit', [
                            'module' => $module,
                            'landlords' => $landlords,
                            'properties' => $properties,
                            'view_col' => $this->view_col,
                        ])->with('rental_history', $rental_history);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("rental_history"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified rental_history in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Rental_Histories", "edit")) {

            $rules = Module::validateRules("Rental_Histories", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                ;
            }

            $insert_id = Module::updateRow("Rental_Histories", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.rental_histories.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified rental_history from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Rental_Histories", "delete")) {
            Rental_History::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.rental_histories.index');
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
        $user = Auth::user();
        $values = DB::table('rental_histories')->select($this->listing_cols)->where("user_id", $user->id)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Rental_Histories');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/rental_histories/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Rental_Histories", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/rental_histories/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Rental_Histories", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.rental_histories.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
