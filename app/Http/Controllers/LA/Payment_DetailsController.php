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
use App\Models\Payment_Detail;

class Payment_DetailsController extends Controller {

    public $show_action = true;
    public $view_col = 'pay_date';
    public $listing_cols = ['id', 'pay_date', 'payment_receipt_upload'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Payment_Details', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Payment_Details', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Payment_Details.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $module = Module::get('Payment_Details');

        if (Module::hasAccess($module->id)) {
            return View('la.payment_details.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new payment_detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created payment_detail in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Module::hasAccess("Payment_Details", "create")) {
            $user = Auth::user();
            $request->merge(["user_id" => $user->id]);
            $rules = Module::validateRules("Payment_Details", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Payment_Details", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.payment_details.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified payment_detail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Payment_Details", "view")) {

            $payment_detail = Payment_Detail::find($id);
            if (isset($payment_detail->id)) {
                $module = Module::get('Payment_Details');
                $module->row = $payment_detail;

                return view('la.payment_details.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('payment_detail', $payment_detail);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("payment_detail"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified payment_detail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Module::hasAccess("Payment_Details", "edit")) {
            $payment_detail = Payment_Detail::find($id);
            if (isset($payment_detail->id)) {
                $module = Module::get('Payment_Details');

                $module->row = $payment_detail;

                return view('la.payment_details.edit', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                        ])->with('payment_detail', $payment_detail);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("payment_detail"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified payment_detail in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Payment_Details", "edit")) {
            $user = Auth::user();
            $request->merge(["user_id" => $user->id]);
            $rules = Module::validateRules("Payment_Details", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                ;
            }

            $insert_id = Module::updateRow("Payment_Details", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.payment_details.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified payment_detail from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Payment_Details", "delete")) {
            Payment_Detail::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.payment_details.index');
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
        $values = DB::table('payment_details')->select($this->listing_cols)->where("user_id", $user->id)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Payment_Details');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($j == 2) {
                $quittance = DB::table('payment_details')->leftJoin("uploads", "uploads.id", "=", "payment_details.payment_receipt_upload")->where("payment_details.id", $data->data[$i][0])->first();

                $data->data[$i][$j] = '<a class="preview" target="_blank" href="' . url('') . '/files/' . $quittance->hash . '/' . $quittance->name . '">';
                if (isset($extensions[$quittance->extension])) {
                    $data->data[$i][$j] .= '<img src="' . url('') . '/storage/icons/' . $extensions[$quittance->extension] . '">';
                } else {
                    $data->data[$i][$j] .= '<i class="fa fa-file-o"></i>';
                }
            }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/payment_details/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }


            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Payment_Details", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/payment_details/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Payment_Details", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.payment_details.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
