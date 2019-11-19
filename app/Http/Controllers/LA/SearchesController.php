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
use App\Models\Search;

class SearchesController extends Controller {

    public $show_action = true;
    public $view_col = 'title';
    public $listing_cols = ['id', 'title'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Searches', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Searches', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Searches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if (Module::hasAccess("My_Profiles", "view")) {

            $user = Auth::user();

            $my_profile = DB::table('my_profiles')
                            ->select("my_profiles.*", "users.name as user_name", "universities.name as univercity_name", "employers.name as employer_name")
                            ->leftJoin("users", "users.id", "=", "my_profiles.user_id")
                            ->leftJoin("universities", "universities.id", "=", "my_profiles.name_of_university")
                            ->leftJoin("employers", "employers.id", "=", "my_profiles.name_of_employer")
                            ->where("user_id", $user->id)->whereNull('my_profiles.deleted_at')->first();
            $id = $my_profile->id;

            $step = $request->input('step');
            $extensions = $this->get_extensions();



        $favorites = DB::table('my_properties')->select('my_properties.*', 'apply_applications.user_id as applied_user')
                ->leftJoin("apply_applications", "apply_applications.address_id", "=", "my_properties.id")
                ->Join("favorites", "favorites.address_id", "=", "my_properties.id")->where("favorites.user_id","=",$user->id)
                ->groupBy("my_properties.id")
                ->get();

            if (isset($my_profile->id)) {

                $module = Module::get('My_Profiles');
                $module->row = $my_profile;
                if ($user->role_id == "10") {
                    $user_id = $user->id;
                    $properties = DB::table('my_properties')->select('my_properties.*', 'apply_applications.user_id as applied_user')
                                    ->leftJoin("apply_applications", "apply_applications.address_id", "=", "my_properties.id")
                                    ->where((function ($query) use ($user_id) {
                                        $query->where('apply_applications.user_id', '=', $user_id)
                                        ->orWhereNull('apply_applications.user_id');
                                    }))
                                    ->whereNull('my_properties.deleted_at')
                                            ->orderBy('apply_applications.id','desc')
                                            ->groupBy('my_properties.id')->get();



                    $upcoming_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.id as address_id", "my_properties.size_square_meters", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.id as visit_id", "users.name as owner_name", "users.id as owner_id")
                                    ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                    ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                    ->leftJoin("users", "users.id", "=", "visits.user_id")
                                    ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                    ->where('visits.visit_type', "Upcoming")
                                    ->orderBy('visits.id','desc')
                                    ->whereNull('visits.deleted_at')->get();

                    $post_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.size_square_meters", "my_properties.id as address_id", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.avaibale_status", "visits.id as visit_id", "visits.avaibale_status", "visits.comment", "users.name as owner_name", "users.id as owner_id", "visits.id as visit_id")
                                    ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                    ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                    ->leftJoin("users", "users.id", "=", "visits.user_id")
                                    ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                    ->where('visits.visit_type', "Post")
                                    ->whereNull('visits.deleted_at')
                                    ->orderBy('visits.id','desc')
                            ->get();

                    $offer_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.size_square_meters", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.avaibale_status", "visits.id as visit_id", "visits.avaibale_status", "visits.comment", "users.name as owner_name")
                                    ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                    ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                    ->leftJoin("users", "users.id", "=", "visits.user_id")
                                    ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                    ->where('visits.visit_type', "Offer")
                                    ->whereNull('visits.deleted_at')
                                    ->orderBy('visits.id','desc')
                            ->get();

                    return view('la.my_profiles.tenant_my_search', [
                                'module' => $module,
                                'view_col' => $this->view_col,
                                'no_header' => true,
                                'step' => $step,
                                'user' => $user,
                                'properties' => $properties,
                                'post_visit' => $post_visit,
                                'upcoming_visit' => $upcoming_visit,
                                'offer_visit' => $offer_visit,
                                'favorites' => $favorites,
                                'request' => $request,
                                'extensions' => $extensions,
                                'no_padding' => "no-padding"
                            ])->with('my_profile', $my_profile);
                } elseif ($user->role_id == "11") {
                    $my_properties = DB::table('my_properties')
                                    ->where("my_properties.user_id", $user->id)->whereNull('my_properties.deleted_at')->get();
                    $share_applications = DB::table('share_applications')
                                    ->leftJoin("users", "users.id", "=", "share_applications.user_id")
                                    ->join("my_profiles", "my_profiles.user_id", "=", "users.id")
                                    ->whereNull('share_applications.deleted_at')
                                    ->orderBy('share_applications.id','desc')
                                    ->get();

                    $appliactions = DB::table('my_properties')->select('my_properties.*', 'apply_applications.user_id as applied_user', "users.name as tenent_name", 'apply_applications.id as application_id', 'my_properties.id as property_id')
                                    ->leftJoin("apply_applications", "apply_applications.address_id", "=", "my_properties.id")
                                    ->leftJoin("users", "users.id", "=", "apply_applications.user_id")
                                    ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                    ->where('my_properties.user_id', $user->id)
                                    ->where('apply_applications.status', "!=", "Available")
                                    ->whereNull('my_properties.deleted_at')
                                    ->orderBy('apply_applications.id','desc')
                                    ->get();

                    $upcoming_visit = DB::table('visits')->select("my_profiles.*", "visits.upcoming_date", "visits.status", "users.name as tenent_name", "visits.id as visit_id")
                                    ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                    ->leftJoin("users", "users.id", "=", "apply_applications.user_id")
                                    ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                    ->where('visits.visit_type', "Upcoming")
                                    ->whereNull('visits.deleted_at')
                                    ->orderBy('visits.id','desc')
                                    ->get();

                    $post_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.size_square_meters", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.avaibale_status", "visits.id as visit_id", "visits.avaibale_status", "visits.comment", "users.name as owner_name")
                                    ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                    ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                    ->leftJoin("users", "users.id", "=", "visits.user_id")
                                    ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                    ->where('visits.visit_type', "Post")
                                    ->whereNull('visits.deleted_at')
                                    ->orderBy('visits.id','desc')
                                    ->get();

                    $offer_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.size_square_meters", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.avaibale_status", "visits.id as visit_id", "visits.avaibale_status", "visits.comment", "users.name as owner_name")
                                    ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                    ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                    ->leftJoin("users", "users.id", "=", "visits.user_id")
                                    ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                    ->where('visits.visit_type', "Offer")
                                    ->whereNull('visits.deleted_at')
                                    ->orderBy('visits.id','desc')
                                    ->get();

                    $payment_details = DB::table('payment_details')
                                    ->leftJoin("uploads", "uploads.id", "=", "payment_details.payment_receipt_upload")
                                    ->where("payment_details.user_id", $user->id)->whereNull('payment_details.deleted_at')->get();

                    return view('la.my_profiles.landlord_search', [
                                'module' => $module,
                                'view_col' => $this->view_col,
                                'no_header' => true,
                                'payment_details' => $payment_details,
                                'step' => $step,
                                'user' => $user,
                                'request' => $request,
                                'my_properties' => $my_properties,
                                'favorites' => $favorites,
                                'share_applications' => $share_applications,
                                'appliactions' => $appliactions,
                                'upcoming_visit' => $upcoming_visit,
                                'offer_visit' => $offer_visit,
                                'post_visit' => $post_visit,
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
     * Show the form for creating a new search.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created search in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user = Auth::user();
        $user_id = $user->id;
        $properties = DB::table('my_properties')->select('my_properties.*', 'apply_applications.user_id as applied_user', 'favorites.user_id as favorite_user')
                ->leftJoin("apply_applications", "apply_applications.address_id", "=", "my_properties.id")
                ->leftJoin("favorites", "favorites.address_id", "=", "my_properties.id");

        if ($request->input("want_to_live") != "") {
            $properties = $properties->where("city", "LIKE", "%" . $request->input("want_to_live") . "%");
        }
        if ($request->input("looking_for") != "") {
            $properties = $properties->where("property_type", "=", $request->input("looking_for"));
        }
        if ($request->input("amenities") != "") {
            $properties = $properties->where("amenities", "=", $request->input("amenities"));
        }
        if ($request->input("size") != "") {
            $properties = $properties->where("size_square_meters", "<=", $request->input("size"));
        }
        if ($request->input("bedrooms") != "") {
            $properties = $properties->where("bedrooms", "=", $request->input("bedrooms"));
        }
        if ($request->input("budget") != "") {
            $properties = $properties->where("current_rent", "<=", $request->input("budget"));
        }
        if ($request->input("pieces") != "") {
            $properties = $properties->where("total_rooms", "<=", $request->input("pieces"));
        }
        $properties = $properties->groupBy("id");
        $matches = $properties->get();

        $favorites = DB::table('my_properties')->select('my_properties.*', 'apply_applications.user_id as applied_user')
                ->leftJoin("apply_applications", "apply_applications.address_id", "=", "my_properties.id")
                ->Join("favorites", "favorites.address_id", "=", "my_properties.id")->where("favorites.user_id","=",$user->id)
                ->groupBy("id")
                ->get();


        $user = Auth::user();

        $my_profile = DB::table('my_profiles')
                        ->select("my_profiles.*", "users.name as user_name", "universities.name as univercity_name", "employers.name as employer_name")
                        ->leftJoin("users", "users.id", "=", "my_profiles.user_id")
                        ->leftJoin("universities", "universities.id", "=", "my_profiles.name_of_university")
                        ->leftJoin("employers", "employers.id", "=", "my_profiles.name_of_employer")
                        ->where("user_id", $user->id)->whereNull('my_profiles.deleted_at')->first();
        $id = $my_profile->id;

        $step = $request->input('step');
        $extensions = $this->get_extensions();

        if (isset($my_profile->id)) {

            $module = Module::get('My_Profiles');
            $module->row = $my_profile;
            if ($user->role_id == "10") {
                $user_id = $user->id;
                $properties = DB::table('my_properties')->select('my_properties.*', 'apply_applications.user_id as applied_user')
                                ->leftJoin("apply_applications", "apply_applications.address_id", "=", "my_properties.id")
                                ->where((function ($query) use ($user_id) {
                                    $query->where('apply_applications.user_id', '=', $user_id)
                                    ->orWhereNull('apply_applications.user_id');
                                }))
                                ->whereNull('my_properties.deleted_at')->groupBy('my_properties.id')->get();



                $upcoming_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.id as address_id", "my_properties.size_square_meters", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.id as visit_id", "users.name as owner_name", "users.id as owner_id")
                                ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                ->leftJoin("users", "users.id", "=", "visits.user_id")
                                ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                ->where('visits.visit_type', "Upcoming")
                                ->whereNull('visits.deleted_at')->get();

                $post_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.size_square_meters", "my_properties.id as address_id", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.avaibale_status", "visits.id as visit_id", "visits.avaibale_status", "visits.comment", "users.name as owner_name", "users.id as owner_id", "visits.id as visit_id")
                                ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                ->leftJoin("users", "users.id", "=", "visits.user_id")
                                ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                ->where('visits.visit_type', "Post")
                                ->whereNull('visits.deleted_at')->get();

                $offer_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.size_square_meters", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.avaibale_status", "visits.id as visit_id", "visits.avaibale_status", "visits.comment", "users.name as owner_name")
                                ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                ->leftJoin("users", "users.id", "=", "visits.user_id")
                                ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                ->where('visits.visit_type', "Offer")
                                ->whereNull('visits.deleted_at')->get();

                return view('la.my_profiles.tenant_my_search', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'step' => $step,
                            'user' => $user,
                            'properties' => $properties,
                            'favorites' => $favorites,
                            'post_visit' => $post_visit,
                            'upcoming_visit' => $upcoming_visit,
                            'offer_visit' => $offer_visit,
                            'matches' => $matches,
                            'request' => $request,
                            'extensions' => $extensions,
                            'no_padding' => "no-padding"
                        ])->with('my_profile', $my_profile);
            } elseif ($user->role_id == "11") {
                $my_properties = DB::table('my_properties')
                                ->where("my_properties.user_id", $user->id)->whereNull('my_properties.deleted_at')->get();
                $share_applications = DB::table('share_applications')
                                ->leftJoin("users", "users.id", "=", "share_applications.user_id")
                                ->join("my_profiles", "my_profiles.user_id", "=", "users.id")
                                ->whereNull('share_applications.deleted_at')->get();

                $appliactions = DB::table('my_properties')->select('my_properties.*', 'apply_applications.user_id as applied_user', "users.name as tenent_name", 'apply_applications.id as application_id', 'my_properties.id as property_id')
                                ->leftJoin("apply_applications", "apply_applications.address_id", "=", "my_properties.id")
                                ->leftJoin("users", "users.id", "=", "apply_applications.user_id")
                                ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                ->where('my_properties.user_id', $user->id)
                                ->where('apply_applications.status', "!=", "Available")
                                ->whereNull('my_properties.deleted_at')->get();

                $upcoming_visit = DB::table('visits')->select("my_profiles.*", "visits.upcoming_date", "visits.status", "users.name as tenent_name", "visits.id as visit_id")
                                ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                ->leftJoin("users", "users.id", "=", "apply_applications.user_id")
                                ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                ->where('visits.visit_type', "Upcoming")
                                ->whereNull('visits.deleted_at')->get();

                $post_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.size_square_meters", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.avaibale_status", "visits.id as visit_id", "visits.avaibale_status", "visits.comment", "users.name as owner_name")
                                ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                ->leftJoin("users", "users.id", "=", "visits.user_id")
                                ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                ->where('visits.visit_type', "Post")
                                ->whereNull('visits.deleted_at')->get();

                $offer_visit = DB::table('visits')->select("my_profiles.*", "my_properties.address", "my_properties.size_square_meters", "my_properties.current_rent", "visits.upcoming_date", "visits.status", "visits.avaibale_status", "visits.id as visit_id", "visits.avaibale_status", "visits.comment", "users.name as owner_name")
                                ->leftJoin("apply_applications", "apply_applications.id", "=", "visits.application_id")
                                ->leftJoin("my_properties", "my_properties.id", "=", "apply_applications.address_id")
                                ->leftJoin("users", "users.id", "=", "visits.user_id")
                                ->leftJoin("my_profiles", "my_profiles.user_id", "=", "users.id")
                                ->where('visits.visit_type', "Offer")
                                ->whereNull('visits.deleted_at')->get();

                $payment_details = DB::table('payment_details')
                                ->leftJoin("uploads", "uploads.id", "=", "payment_details.payment_receipt_upload")
                                ->where("payment_details.user_id", $user->id)->whereNull('payment_details.deleted_at')->get();

                return view('la.my_profiles.landlord_search', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'payment_details' => $payment_details,
                            'step' => $step,
                            'user' => $user,
                            'my_properties' => $my_properties,
                            'favorites' => $favorites,
                            'share_applications' => $share_applications,
                            'appliactions' => $appliactions,
                            'upcoming_visit' => $upcoming_visit,
                            'offer_visit' => $offer_visit,
                            'post_visit' => $post_visit,
                            'matches' => $matches,
                            'request' => $request,
                            'extensions' => $extensions,
                            'no_padding' => "no-padding"
                        ])->with('my_profile', $my_profile);
            }
        }


    }

    /**
     * Display the specified search.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Searches", "view")) {

            $search = Search::find($id);
            if (isset($search->id)) {
                $module = Module::get('Searches');
                $module->row = $search;

                return view('la.searches.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('search', $search);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("search"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified search.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Module::hasAccess("Searches", "edit")) {
            $search = Search::find($id);
            if (isset($search->id)) {
                $module = Module::get('Searches');

                $module->row = $search;

                return view('la.searches.edit', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                        ])->with('search', $search);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("search"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified search in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Searches", "edit")) {

            $rules = Module::validateRules("Searches", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                ;
            }

            $insert_id = Module::updateRow("Searches", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.searches.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified search from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Searches", "delete")) {
            Search::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.searches.index');
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
        $values = DB::table('searches')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Searches');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/searches/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Searches", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/searches/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Searches", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.searches.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string) $output;
            }
        }
        $out->setData($data);
        return $out;
    }

    public function search(Request $request) {

        if (Module::hasAccess("Searches", "edit")) {


            $module = Module::get('Searches');



            return view('la.searches.edit', [
                'module' => $module,
                'view_col' => $this->view_col,
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

}
