<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\Models\Upload_CSV;

class Upload_CSVsController extends Controller {

    public $show_action = true;
    public $view_col = 'upload_csv_data';
    public $listing_cols = ['id', 'upload_csv_data', 'csv_file'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Upload_CSVs', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Upload_CSVs', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Upload_CSVs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        die;
        $module = Module::get('Upload_CSVs');

        if (Module::hasAccess($module->id)) {
            return View('la.upload_csvs.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new upload_csv.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created upload_csv in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Module::hasAccess("Upload_CSVs", "create")) {


            if ($request->hasFile('csv_file')) {

                $path = $request->file('csv_file')->getRealPath();
                $data = \Excel::load($path)->get();
                $column_names = $data->first()->keys()->toArray();
                $table_name = "calculate_from_data_".time();
                
                Schema::create($table_name, function($table) use ($column_names) {
                    $table->increments('id');
                    foreach ($column_names as $column_name) {
                        $table->string($column_name);
                    }
                });

                if ($data->count()) {
                    foreach ($data as $key => $value) {
                        $row = array();
                        foreach ($column_names as $column_name) {
                            $row[$column_name] = $value->$column_name;
                        }
                        $arr[] = $row;   
                    }
                    if (!empty($arr)) {
                        \DB::table($table_name)->insert($arr);
                        dd('Insert Record successfully.');
                    }
                }
            }

            $rules = Module::validateRules("Upload_CSVs", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $file = file_get_contents($_FILES["csv_file"]["tmp_name"]); //Input::file('csv_file');
            echo "<pre>";
            print_r($file);
            die;

            $insert_id = Module::insert("Upload_CSVs", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.upload_csvs.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified upload_csv.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Upload_CSVs", "view")) {

            $upload_csv = Upload_CSV::find($id);
            if (isset($upload_csv->id)) {
                $module = Module::get('Upload_CSVs');
                $module->row = $upload_csv;

                return view('la.upload_csvs.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('upload_csv', $upload_csv);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("upload_csv"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified upload_csv.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Module::hasAccess("Upload_CSVs", "edit")) {
            $upload_csv = Upload_CSV::find($id);
            if (isset($upload_csv->id)) {
                $module = Module::get('Upload_CSVs');

                $module->row = $upload_csv;

                return view('la.upload_csvs.edit', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                        ])->with('upload_csv', $upload_csv);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("upload_csv"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified upload_csv in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Upload_CSVs", "edit")) {

            $rules = Module::validateRules("Upload_CSVs", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                ;
            }

            $insert_id = Module::updateRow("Upload_CSVs", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.upload_csvs.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified upload_csv from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Upload_CSVs", "delete")) {
            Upload_CSV::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.upload_csvs.index');
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
        $values = DB::table('upload_csvs')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Upload_CSVs');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/upload_csvs/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Upload_CSVs", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/upload_csvs/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Upload_CSVs", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.upload_csvs.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
