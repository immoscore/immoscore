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

use App\Models\My_property;
use App\Models\User;

class My_propertiesController extends Controller
{
	public $show_action = true;
	public $view_col = 'address';
	public $listing_cols = ['id', 'address', 'flat_house', 'size_square_meters', 'total_rooms', 'current_rent', 'deposit'];

	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('My_properties', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('My_properties', $this->listing_cols);
		}
	}

	/**
	 * Display a listing of the My_properties.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('My_properties');

		if(Module::hasAccess($module->id)) {
			return View('la.my_properties.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new my_property.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created my_property in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("My_properties", "create")) {

			$rules = Module::validateRules("My_properties", $request);
                        $user = Auth::user();
                        $request->merge(["user_id"=>$user->id]);
			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}

			$insert_id = Module::insert("My_properties", $request);

			return redirect()->route(config('laraadmin.adminRoute') . '.my_properties.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified my_property.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("My_properties", "view")) {

			$my_property = My_property::find($id);
			if(isset($my_property->id)) {
				$module = Module::get('My_properties');
				$module->row = $my_property;

				return view('la.my_properties.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('my_property', $my_property);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("my_property"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified my_property.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("My_properties", "edit")) {
			$my_property = My_property::find($id);
			if(isset($my_property->id)) {
				$module = Module::get('My_properties');

				$module->row = $my_property;

				return view('la.my_properties.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('my_property', $my_property);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("my_property"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified my_property in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("My_properties", "edit")) {
                    $user = Auth::user();
                        $request->merge(["user_id"=>$user->id]);
			$rules = Module::validateRules("My_properties", $request, true);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}

			$insert_id = Module::updateRow("My_properties", $request, $id);

			return redirect()->route(config('laraadmin.adminRoute') . '.my_properties.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified my_property from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("My_properties", "delete")) {
			My_property::find($id)->delete();

			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.my_properties.index');
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
                $user = Auth::user();
		$values = DB::table('my_properties')->select($this->listing_cols)->whereNull('deleted_at')->where('user_id',$user->id);
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('My_properties');

		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) {
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/my_properties/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("My_properties", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/my_properties/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}

				if(Module::hasAccess("My_properties", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.my_properties.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
        function get_owner_address(Request $request){
            $user_id = $request->input('user_id');
            $data = array();
            $user_email = User::whereNull('deleted_at')->where('id',$user_id)->first();
            $property_lists = My_property::whereNull('deleted_at')->where('user_id',$user_id)->lists("address","id");
            $data["property_lists"] = $property_lists;
            $data["user_email"] = $user_email->email;
//            $lists = array();
//            foreach($property_lists as $idx=>$property_list) {
//                $lists[$idx] = $property_list;
//            }
            echo json_encode($data);
            die;
        }
}
