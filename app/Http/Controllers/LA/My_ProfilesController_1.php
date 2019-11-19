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

use App\Models\My_Profile;

class My_ProfilesController extends Controller
{
	public $show_action = true;
	public $view_col = 'name_of_employer';
	public $listing_cols = ['id', 'immoscore_guarantee', 'name_of_employer', 'business', 'phone_number', 'contact_person_id', 'email_address', 'contract_type', 'salary', 'start_date', 'end_date', 'current_address', 'area', 'monthly_rent', 'guarantor'];

	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
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
	public function index()
	{
            $user = Auth::user();
            $my_profile = DB::table('my_profiles')->where("user_id",$user->id)->whereNull('deleted_at')->first();

//my_profiles
                return redirect(config('laraadmin.adminRoute')."/my_profiles/$my_profile->id/edit?step=1");
                exit();
		$module = Module::get('My_Profiles');

		if(Module::hasAccess($module->id)) {
			return View('la.my_profiles.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new my_profile.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created my_profile in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("My_Profiles", "create")) {

			$rules = Module::validateRules("My_Profiles", $request);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}

			$insert_id = Module::insert("My_Profiles", $request);

			return redirect()->route(config('laraadmin.adminRoute') . '.my_profiles.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified my_profile.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("My_Profiles", "view")) {

			$my_profile = My_Profile::find($id);
			if(isset($my_profile->id)) {
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
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified my_profile.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
                $step = $_GET["step"];
		if(Module::hasAccess("My_Profiles", "edit")) {
			$my_profile = My_Profile::find($id);
			if(isset($my_profile->id)) {
				$module = Module::get('My_Profiles');

				$module->row = $my_profile;

				return view('la.my_profiles.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
                                        "step"=>$step
				])->with('my_profile', $my_profile);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("my_profile"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified my_profile in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("My_Profiles", "edit")) {

			$rules = Module::validateRules("My_Profiles", $request, true);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}

			$insert_id = Module::updateRow("My_Profiles", $request, $id);
                        $step = $request->input('step');
                        return redirect(config('laraadmin.adminRoute')."/my_profiles/1/edit?step=$step");

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified my_profile from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("My_Profiles", "delete")) {
			My_Profile::find($id)->delete();

			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.my_profiles.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('my_profiles')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('My_Profiles');

		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) {
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/my_profiles/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("My_Profiles", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/my_profiles/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}

				if(Module::hasAccess("My_Profiles", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.my_profiles.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
