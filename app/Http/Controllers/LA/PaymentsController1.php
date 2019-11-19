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
use App\Models\Payment;

class PaymentsController extends Controller {

    public $show_action = true;
    public $view_col = 'owner_name';
    public $listing_cols = ['id', 'owner_name', 'iban_number'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Payments', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Payments', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Payments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $module = Module::get('Payments');
        $list = $request->input('list');
        if ($list == 1) {
            return View('la.payments.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
        } else {
            $user = Auth::user();
            $my_profile = DB::table('my_profiles')->where("user_id", $user->id)->whereNull('deleted_at')->first();
            $user = Auth::user();
            $my_profile = DB::table('my_profiles')
                            ->select("my_profiles.*", "users.name as user_name", "universities.name as univercity_name", "employers.name as employer_name")
                            ->leftJoin("users", "users.id", "=", "my_profiles.user_id")
                            ->leftJoin("universities", "universities.id", "=", "my_profiles.name_of_university")
                            ->leftJoin("employers", "employers.id", "=", "my_profiles.name_of_employer")
                            ->where("user_id", $user->id)->whereNull('my_profiles.deleted_at')->first();

            $id = $my_profile->id;

            $quittances = DB::table('quittances')
                            ->leftJoin("uploads", "uploads.id", "=", "quittances.uploaded_file")
                            ->where("quittances.user_id", $user->id)->whereNull('quittances.deleted_at')->get();

            $payment_details = DB::table('payment_details')
                            ->leftJoin("uploads", "uploads.id", "=", "payment_details.payment_receipt_upload")
                            ->where("payment_details.user_id", $user->id)->whereNull('payment_details.deleted_at')->get();

            $document_ids = DB::table('document_ids')
                            ->leftJoin("uploads", "uploads.id", "=", "document_ids.uploaded_id")
                            ->where("document_ids.user_id", $user->id)->whereNull('document_ids.deleted_at')->get();

            $rental_histories = DB::table('rental_histories')->select('rental_histories.*', "users.name as owner_name", "my_properties.address as address")
                            ->join("users", "users.id", "=", "rental_histories.owner_name")
                            ->join("my_properties", "my_properties.id", "=", "rental_histories.address")
                            ->where("rental_histories.user_id", $user->id)->whereNull('rental_histories.deleted_at')->get();

            $payments = DB::table('payments')->select('payments.*','users.name as owner_name')
                            ->leftjoin("users","users.id","=","payments.owner_name")
                            ->whereNull('payments.deleted_at')->get();
//            dd($payments);
            $step = $request->input('step');
            $extensions = $this->get_extensions();
            if (Module::hasAccess($module->id)) {
                return view('la.payments.tenant_index', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'rental_histories' => $rental_histories,
                            'quittances' => $quittances,
                            'payment_details' => $payment_details,
                            'document_ids' => $document_ids,
                            'step' => $step,
                            'user' => $user,
                            'extensions' => $extensions,
                            'payments' => $payments,
                            'no_padding' => "no-padding"
                        ])->with('my_profile', $my_profile);
            } else {
                return redirect(config('laraadmin.adminRoute') . "/");
            }
        }
    }

    /**
     * Show the form for creating a new payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created payment in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Module::hasAccess("Payments", "create")) {

            $rules = Module::validateRules("Payments", $request);
            $user = Auth::user();
            $request->merge(['user_id'=>$user->id]);
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Payments", $request);
             return redirect(config('laraadmin.adminRoute') . "/payments?list=1");
//            return redirect()->route(config('laraadmin.adminRoute') . '.payments.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified payment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Payments", "view")) {

            $payment = Payment::find($id);
            if (isset($payment->id)) {
                $module = Module::get('Payments');
                $module->row = $payment;

                return view('la.payments.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('payment', $payment);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("payment"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified payment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Module::hasAccess("Payments", "edit")) {
            $payment = Payment::find($id);
            if (isset($payment->id)) {
                $module = Module::get('Payments');

                $module->row = $payment;

                return view('la.payments.edit', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                        ])->with('payment', $payment);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("payment"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Payments", "edit")) {

            $rules = Module::validateRules("Payments", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                ;
            }

            $insert_id = Module::updateRow("Payments", $request, $id);
            return redirect(config('laraadmin.adminRoute') . "/payments?list=1");
//            return redirect()->route(config('laraadmin.adminRoute') . '.payments.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified payment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Payments", "delete")) {
            Payment::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.payments.index');
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
        $values = DB::table('payments')->select($this->listing_cols)->where("user_id",$user->id)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Payments');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }

                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/payments/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Payments", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/payments/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Payments", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.payments.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
