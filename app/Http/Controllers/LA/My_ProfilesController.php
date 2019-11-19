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
use App\Models\My_Profile;
use Dwij\Laraadmin\Models\LAConfigs;
use Mail;

class My_ProfilesController extends Controller {

    public $show_action = true;
    public $view_col = 'name_of_employer';
    public $listing_cols = ['id', 'user_id', 'occupation', 'name_of_university', 'parents', 'scholarship', 'savings', 'rental_type', 'name_of_employer', 'designation', 'business', 'phone_number', 'contact_person_id', 'email_address', 'contract_type', 'salary', 'start_date', 'end_date', 'address', 'area', 'monthly_rent', 'immoscore_guarantee'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('My_Profiles', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('My_Profiles', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the My_Profiles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if (Module::hasAccess("My_Profiles", "view")) {
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

            $rental_histories = DB::table('rental_histories')->select('rental_histories.*',"users.name as owner_name","my_properties.address as address")
                            ->join("users","users.id","=","rental_histories.owner_name")
                            ->join("my_properties","my_properties.id","=","rental_histories.address")
                            ->where("rental_histories.user_id", $user->id)->whereNull('rental_histories.deleted_at')->get();
            $step = $request->input('step');
            $extensions = $this->get_extensions();

            if (isset($my_profile->id)) {

                $module = Module::get('My_Profiles');
                $module->row = $my_profile;
                if ($user->role_id == "10") {



                    return view('la.my_profiles.tenant_my_file', [
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
                                'no_padding' => "no-padding"
                            ])->with('my_profile', $my_profile);
                } elseif ($user->role_id == "11") {
                    $my_properties = DB::table('my_properties')
                                    ->where("my_properties.user_id", $user->id)->whereNull('my_properties.deleted_at')->get();

                    $my_advertise = DB::table('my_properties')
                                    ->select('my_properties.*')
                                    ->join("advertises", "advertises.property_id", "=", "my_properties.id")
                                    ->where("advertises.user_id", $user->id)->whereNull('my_properties.deleted_at')->whereNull('advertises.deleted_at')->get();


                    return view('la.my_profiles.landlord_profile', [
                                'module' => $module,
                                'view_col' => $this->view_col,
                                'no_header' => true,
                                'rental_histories' => $rental_histories,
                                'quittances' => $quittances,
                                'payment_details' => $payment_details,
                                'document_ids' => $document_ids,
                                'step' => $step,
                                'user' => $user,
                                'my_properties' => $my_properties,
                                'my_advertise' => $my_advertise,
                                'extensions' => $extensions,
                                'no_padding' => "no-padding"
                            ])->with('my_profile', $my_profile);
                }
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("my_profile"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
        /*
          //my_profiles
          return redirect(config('laraadmin.adminRoute') . "/profile_details");
          exit();
          $module = Module::get('My_Profiles');

          if (Module::hasAccess($module->id)) {
          return View('la.my_profiles.index', [
          'show_actions' => $this->show_action,
          'listing_cols' => $this->listing_cols,
          'module' => $module
          ]);
          } else {
          return redirect(config('laraadmin.adminRoute') . "/");
          } */
    }

    /**
     * Show the form for creating a new my_profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created my_profile in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Module::hasAccess("My_Profiles", "create")) {

            $rules = Module::validateRules("My_Profiles", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("My_Profiles", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.my_profiles.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified my_profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("My_Profiles", "view")) {

            $my_profile = My_Profile::find($id);
            if (isset($my_profile->id)) {
                $module = Module::get('My_Profiles');
                $module->row = $my_profile;

                return view('la.my_profiles.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('my_profile', $my_profile);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("my_profile"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    public function profile_details(Request $request) {
        if (Module::hasAccess("My_Profiles", "view")) {
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

            $rental_histories = DB::table('rental_histories')
                            ->where("rental_histories.user_id", $user->id)->whereNull('rental_histories.deleted_at')->get();
            $step = $request->input('step');
            $extensions = $this->get_extensions();

            if (isset($my_profile->id)) {
                $module = Module::get('My_Profiles');
                $module->row = $my_profile;

                return view('la.my_profiles.profile_details', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'rental_histories' => $rental_histories,
                            'quittances' => $quittances,
                            'payment_details' => $payment_details,
                            'document_ids' => $document_ids,
                            'step' => $step,
                            'extensions' => $extensions,
                            'no_padding' => "no-padding"
                        ])->with('my_profile', $my_profile);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("my_profile"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified my_profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $step = $_GET["step"];
        if (Module::hasAccess("My_Profiles", "edit")) {
            $my_profile = My_Profile::find($id);

            if (isset($my_profile->id)) {
                $module = Module::get('My_Profiles');

                $module->row = $my_profile;
                $user = Auth::user();
                if ($user->role_id == "10") {
                    return view('la.my_profiles.edit', [
                                'module' => $module,
                                'view_col' => $this->view_col,
                                "step" => $step
                            ])->with('my_profile', $my_profile);
                } elseif ($user->role_id == "11") {
                    return view('la.my_profiles.landlord_edit', [
                                'module' => $module,
                                'view_col' => $this->view_col,
                                "step" => $step
                            ])->with('my_profile', $my_profile);
                }
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("my_profile"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified my_profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {


        if (Module::hasAccess("My_Profiles", "edit")) {
            $user = Auth::user();

            if ($request->input('store_tenant_details') == "true") {
                $id = DB::table('my_profiles')->select("*")->where('user_id', $user->id)->first();
                $id = $id->id;
                $save_data = array("currently_renting_or_looking" => $request->input("tenant_looking"), "property_type" => $request->input("property_type"));
                DB::table('my_profiles')
                        ->where('id', $id)
                        ->update($save_data);
                return redirect(config('laraadmin.adminRoute') . "/my_profiles");
            }
            $my_profile = DB::table('my_profiles')->where("user_id", $user->id)->whereNull('deleted_at')->first();
            if ($user->role_id == "11") {
                $validator = Validator::make($request->all(), [
                            'phone_number' => 'required'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $insert_id = Module::updateRow("My_Profiles", $request, $id);
                return redirect(config('laraadmin.adminRoute') . "/my_profiles");
            } elseif ($user->role_id == "10") {
                $step = $request->input('step');
                $cstep = $request->input('cstep');
                if ($cstep == "1") {
                    $validator = Validator::make($request->all(), [
                                'phone_number' => 'required',
                                'id_number' => 'required',
                                'document_type' => 'required'
                    ]);
                } else if ($cstep == "2") {
                    if ($request->input('pets') == "No") {
                        $request->merge(["select_pet_name" => ""]);
                    }
                    $validator = Validator::make($request->all(), [
                                'dob' => 'required',
                                'gender' => 'required',
                                'marital_status' => 'required'
                    ]);
                    /*    if ($my_profile->occupation == "Student") {
                      $validator = Validator::make($request->all(), [
                      'dob' => 'required',
                      'gender' => 'required',
                      'marital_status' => 'required'
                      ]);
                      } else if ($my_profile->occupation == "Employed") {
                      $validator = Validator::make($request->all(), [
                      'name_of_employer' => 'required',
                      'phone_number' => 'required',
                      'email_address' => 'required'
                      ]);
                      } */
                } else if ($cstep == "3") {
//                    dd($request->all());
                    if ($request->input("occupation") == "Student") {
                        $date = DateTime::createFromFormat("m/d/Y", $request->input('start_date'));
                        $start_date = $date->format('Y-m-d');
                        $date = DateTime::createFromFormat("m/d/Y", $request->input('end_date'));
                        $end_date = $date->format('Y-m-d');
                        $request->merge(["start_date" => $start_date, "end_date" => $end_date]);
                        $validator = Validator::make($request->all(), [
                                    'name_of_university' => 'required',
                                    'contact_person_id' => 'required',
                                    'email_address' => 'required',
                                    'start_date' => 'required',
                                    'end_date' => 'required'
                        ]);

//                        dd($validator);
                    } else if ($request->input("occupation") == "Employed") {
                        $date = DateTime::createFromFormat("m/d/Y", $request->input('contract_start_date'));
                        $contract_start_date = $date->format('Y-m-d');
                        $date = DateTime::createFromFormat("m/d/Y", $request->input('contract_end_date'));
                        $contract_end_date = $date->format('Y-m-d');
                        $request->merge(["contract_start_date" => $contract_start_date, "contract_end_date" => $contract_end_date]);
                        $validator = Validator::make($request->all(), [
                                    'occupation' => 'required',
                                    'name_of_employer' => 'required',
                                    'contract_type' => 'required',
                                    'contract_start_date' => 'required',
                                    'contract_end_date' => 'required',
                                    'contact_person_id' => 'required',
                                    'email_address' => 'required'
                        ]);
                        if ($validator->fails()) {
                            return redirect()->back()->withErrors($validator)->withInput();
                        }
                        $save_data = array(
                            "landlord_name" => $request->input('contact_person_id'),
                            "landlord_email" => $request->input('email_address'));
                        $this->save_user($save_data, "employer");
                    } else {
                        $validator = Validator::make($request->all(), [
                                    'occupation' => 'required'
                        ]);
                    }
                } else if ($cstep == "4") {
                    $validator = Validator::make($request->all(), [
                                'address' => 'required',
                                'area' => 'required',
                                'monthly_rent' => 'required',
                                'rental_type' => 'required'
                    ]);
                    $date = DateTime::createFromFormat("m/d/Y", $request->input('lease_start_date'));
                    $lease_start_date = $date->format('Y-m-d');
                    $date = DateTime::createFromFormat("m/d/Y", $request->input('lease_end_date'));
                    $lease_end_date = $date->format('Y-m-d');
                    $request->merge(["lease_start_date" => $lease_start_date, "lease_end_date" => $lease_end_date]);
                    $save_data = array("address" => $request->input('address'),
                        "landlord_name" => $request->input('landlord_name'),
                        "landlord_email" => $request->input('landlord_email'),
                        "area" => $request->input('area'),
                        "monthly_rent" => $request->input('monthly_rent'),
                        "rental_type" => $request->input('rental_type'),
                        "lease_start_date" => $lease_start_date,
                        "lease_end_date" => $lease_end_date);
                    $this->save_user($save_data, "guest");
                } else if ($cstep == "5") {
                    $validator = Validator::make($request->all(), [
                                'immoscore_guaranter' => 'required'
                    ]);
                    $save_data = array("immoscore_guaranter" => $request->input('immoscore_guaranter'));
                }
//            $rules = Module::validateRules("My_Profiles", $request, true);
//
//            $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                if ($cstep != "4" && $cstep != "5") {
                    $insert_id = Module::updateRow("My_Profiles", $request, $id);
                } else {
                    DB::table('my_profiles')
                            ->where('id', $id)
                            ->update($save_data);
                }
                $my_profile = DB::table('my_profiles')->where("user_id", $user->id)->whereNull('deleted_at')->first();
//                echo $cstep;die;

                if (($my_profile->occupation != "Employed" && $my_profile->occupation != "Student" && !in_array($cstep, [1, 2])) || $cstep == "5") {
                    return redirect(config('laraadmin.adminRoute') . "/my_profiles");
                } else {
                    if ($my_profile->currently_renting_or_looking == "renting" && $my_profile->property_type == "residential" && $step == 3) {
                        return redirect(config('laraadmin.adminRoute') . "/my_profiles/" . $my_profile->id . "/edit?step=4");
                    } else {
                        return redirect(config('laraadmin.adminRoute') . "/my_profiles/" . $my_profile->id . "/edit?step=$step");
                    }
                }
            } else {
                return redirect(config('laraadmin.adminRoute') . "/");
            }
        }
    }

    /**
     * Remove the specified my_profile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("My_Profiles", "delete")) {
            My_Profile::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.my_profiles.index');
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
        $values = DB::table('my_profiles')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('My_Profiles');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/my_profiles/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("My_Profiles", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/my_profiles/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("My_Profiles", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.my_profiles.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string) $output;
            }
        }
        $out->setData($data);
        return $out;
    }

    public function display_details(Request $request) {
        if (Module::hasAccess("My_Profiles", "view")) {
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

            $rental_histories = DB::table('rental_histories')
                            ->where("rental_histories.user_id", $user->id)->whereNull('rental_histories.deleted_at')->get();
            $step = $request->input('step');
            $extensions = $this->get_extensions();

            if (isset($my_profile->id)) {
                $module = Module::get('My_Profiles');
                $module->row = $my_profile;

                return view('la.my_profiles.profile_details', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'rental_histories' => $rental_histories,
                            'quittances' => $quittances,
                            'payment_details' => $payment_details,
                            'document_ids' => $document_ids,
                            'step' => $step,
                            'extensions' => $extensions,
                            'no_padding' => "no-padding"
                        ])->with('my_profile', $my_profile);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("my_profile"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    public function tenant_details($id) {

        if (Module::hasAccess("My_Profiles", "view")) {
            $user = DB::table('users')->where("id", $id)->whereNull('deleted_at')->first();

            $my_profile = DB::table('my_profiles')->where("user_id", $user->id)->whereNull('deleted_at')->first();

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

            $rental_histories = DB::table('rental_histories')
                            ->where("rental_histories.user_id", $user->id)->whereNull('rental_histories.deleted_at')->get();
            $step = 1;
            $extensions = $this->get_extensions();

            if (isset($my_profile->id)) {

                $module = Module::get('My_Profiles');
                $module->row = $my_profile;
                if ($user->role_id == "10") {



                    return view('la.my_profiles.tenant_my_file_details', [
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
                                'no_padding' => "no-padding"
                            ])->with('my_profile', $my_profile);
                } elseif ($user->role_id == "11") {
                    $my_properties = DB::table('my_properties')
                                    ->where("my_properties.user_id", $user->id)->whereNull('my_properties.deleted_at')->get();

                    $my_advertise = DB::table('my_properties')
                                    ->select('my_properties.*')
                                    ->join("advertises", "advertises.property_id", "=", "my_properties.id")
                                    ->where("advertises.user_id", $user->id)->whereNull('my_properties.deleted_at')->whereNull('advertises.deleted_at')->get();


                    return view('la.my_profiles.landlord_profile', [
                                'module' => $module,
                                'view_col' => $this->view_col,
                                'no_header' => true,
                                'rental_histories' => $rental_histories,
                                'quittances' => $quittances,
                                'payment_details' => $payment_details,
                                'document_ids' => $document_ids,
                                'step' => $step,
                                'user' => $user,
                                'my_properties' => $my_properties,
                                'my_advertise' => $my_advertise,
                                'extensions' => $extensions,
                                'no_padding' => "no-padding"
                            ])->with('my_profile', $my_profile);
                }
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("my_profile"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
        /*
          //my_profiles
          return redirect(config('laraadmin.adminRoute') . "/profile_details");
          exit();
          $module = Module::get('My_Profiles');

          if (Module::hasAccess($module->id)) {
          return View('la.my_profiles.index', [
          'show_actions' => $this->show_action,
          'listing_cols' => $this->listing_cols,
          'module' => $module
          ]);
          } else {
          return redirect(config('laraadmin.adminRoute') . "/");
          } */
    }

    function save_user($request_data, $user_type) {


        $get_old_user = DB::table('users')->where('email', $request_data["landlord_email"])->first();
        if (isset($get_old_user->id))
            return;




        if ($user_type == "guest") {
            $insert_id = DB::table('users')->insertGetId(
                ['name' => $request_data["landlord_name"], 'email' => $request_data["landlord_email"],"user_type"=>"guest"]
        );
            DB::table('role_user')->insert([
                'user_id' => $insert_id,
                'role_id' => "14",
            ]);

        } else {
            $insert_id = DB::table('users')->insertGetId(
                ['name' => $request_data["landlord_name"], 'email' => $request_data["landlord_email"],"user_type"=>"employer"]
        );
            DB::table('role_user')->insert([
                'user_id' => $insert_id,
                'role_id' => "14",
            ]);
        }
        $user['email'] = $request_data["landlord_email"];
        $user['name'] = $request_data["landlord_name"];
        $encrypted = encrypt($insert_id . "-" . time());
        $user['id'] = $encrypted;
        DB::table('users')->where('id', $insert_id)->update([
            'remember_token' => $user['id']
        ]);

//        DB::table('my_profiles')->insert([
//            'user_id' => $insert_id
//        ]);

        Mail::send(['html' => 'emails.email_Verification'], ["user" => $user], function ($m) use ($user) {
            $m->from(LAConfigs::getByKey('default_email'), LAConfigs::getByKey('sitename'));
            $m->to($user['email'], $user['name'])->subject('Verification Email!');
        });
    }

}
