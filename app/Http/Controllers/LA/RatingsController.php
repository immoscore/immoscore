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
use App\Models\Rating;

class RatingsController extends Controller {

    public $show_action = true;
    public $view_col = 'title';
    public $listing_cols = ['id', 'title'];

    public function __construct() {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Ratings', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Ratings', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Ratings.
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





            $step = $request->input('step');
            $extensions = $this->get_extensions();

            if (isset($my_profile->id)) {

                $module = Module::get('My_Profiles');
                $module->row = $my_profile;
                if ($user->role_id == "10") {
                    $rental_histories = DB::table('rental_histories')
                                    ->join("users", "users.id", "=", "rental_histories.owner_name")
                                    ->join("my_properties", "my_properties.id", "=", "rental_histories.address")
                                    ->select("rental_histories.*", "users.name", "my_properties.address as address_name")
                                    ->where("rental_histories.user_id", $user->id)->whereNull('rental_histories.deleted_at')->get();
//                     $rental_histories = DB::table('rental_histories')
//                            ->where("rental_histories.user_id", $user->id)->whereNull('rental_histories.deleted_at')->get();
                    return view('la.my_profiles.tenant_rating', [
                                'module' => $module,
                                'view_col' => $this->view_col,
                                'no_header' => true,
                                'rental_histories' => $rental_histories,
                                'step' => $step,
                                'user' => $user,
                                'extensions' => $extensions,
                                'no_padding' => "no-padding"
                            ])->with('my_profile', $my_profile);
                } elseif ($user->role_id == "11") {
                    $rental_histories = DB::table('rental_histories')
                                    ->join("users", "users.id", "=", "rental_histories.user_id")
                                    ->join("my_properties", "my_properties.id", "=", "rental_histories.address")
                                    ->select("rental_histories.*", "users.name", "my_properties.address as address_name")
                                    ->where("rental_histories.owner_name", $user->id)->whereNull('rental_histories.deleted_at')->get();

                    return view('la.my_profiles.tenant_rating', [
                                'module' => $module,
                                'view_col' => $this->view_col,
                                'no_header' => true,
                                'rental_histories' => $rental_histories,
                                'step' => $step,
                                'user' => $user,
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
     * Show the form for creating a new rating.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created rating in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        dd($request->All());
        if (Module::hasAccess("Ratings", "create")) {
            $user = Auth::user();
            $request->merge(["user_id" => $user->id]);

            $rules = Module::validateRules("Ratings", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("Ratings", $request);
            return redirect(config('laraadmin.adminRoute') . "/searches");
//            return redirect()->route(config('laraadmin.adminRoute') . '.ratings.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified rating.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Module::hasAccess("Ratings", "view")) {

            $rating = Rating::find($id);
            if (isset($rating->id)) {
                $module = Module::get('Ratings');
                $module->row = $rating;

                return view('la.ratings.show', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                        ])->with('rating', $rating);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("rating"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified rating.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Module::hasAccess("Ratings", "edit")) {
            $rating = Rating::find($id);
            if (isset($rating->id)) {
                $module = Module::get('Ratings');

                $module->row = $rating;

                return view('la.ratings.edit', [
                            'module' => $module,
                            'view_col' => $this->view_col,
                        ])->with('rating', $rating);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("rating"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified rating in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Module::hasAccess("Ratings", "edit")) {

            $rules = Module::validateRules("Ratings", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                ;
            }

            $insert_id = Module::updateRow("Ratings", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.ratings.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified rating from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Module::hasAccess("Ratings", "delete")) {
            Rating::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.ratings.index');
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
        $values = DB::table('ratings')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Ratings');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/ratings/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Ratings", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/ratings/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Ratings", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.ratings.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string) $output;
            }
        }
        $out->setData($data);
        return $out;
    }

    function get_ratings(Request $request) {
        $user = Auth::user();
        $user_id = $request->input("user_id");
        $address = $request->input("address");
        $rent_id = $request->input("rent_id");

        if ($user->role_id == 11) {
            $ratings = DB::table('ratings')->join("users", "users.id", "=", "ratings.landlord_id")
                    ->select("ratings.*", "users.name")
                    ->where("rating_for", "Tenant")
                    ->where("tenant_id", $user_id)
                    ->get();
        } else {
            $ratings = DB::table('ratings')->join("users", "users.id", "=", "ratings.tenant_id")
                    ->select("ratings.*", "users.name")
                    ->where("rating_for", "Property")
                    ->where("property_id", $address)
                    ->where("tenant_id","!=", $user->id)
                    ->get();

        }

        foreach ($ratings as $rating) {
            $total_count = $rating->rating_star;

            if ($user->role_id == 10) {
                $rating_sum = 0;

                $all_rating_count = DB::table('ratings')->where("rating_for", "Property")
                        ->where("property_id", $rating->property_id)
                        ->count();

                $cleanliness = DB::table('ratings')->where("rating_for", "Property")
                        ->where("property_id", $rating->property_id)
                        ->sum('cleanliness');



                $accuracy = DB::table('ratings')->where("rating_for", "Property")
                        ->where("property_id", $rating->property_id)
                        ->sum('accuracy');


                $communication = DB::table('ratings')->where("rating_for", "Property")
                        ->where("property_id", $rating->property_id)
                        ->sum('communication');

                $location = DB::table('ratings')->where("rating_for", "Property")
                        ->where("property_id", $rating->property_id)
                        ->sum('location');


                $value = DB::table('ratings')->where("rating_for", "Property")
                        ->where("property_id", $rating->property_id)
                        ->sum('value');


                $total_count = 0;
                if ($all_rating_count != 0)
                    $total_count = (($cleanliness + $accuracy + $communication + $location + $value) / 5) / $all_rating_count;
            }
            $stars = "";
            for ($i = 1; $i <= $total_count; $i++)
                $stars .= "<span class='fa fa-star' style='color:#f2b01e'></span>";
            if ($total_count < 5)
                for ($i = 5; $i > $total_count; $i--)
                    $stars .= "<span class='fa fa-star'></span>";
            echo "<tr><td>$stars</td><td>$rating->name</td><td>$rating->comment</td><td>" . date("Y-m-d", strtotime($rating->created_at)) . "</td></tr>";
        }
        die;
    }

}
