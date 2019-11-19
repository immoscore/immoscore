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

use App\Models\Advertise;

class AdvertisesController extends Controller
{
	public $show_action = true;
	public $view_col = 'property_id';
	public $listing_cols = ['id', 'property_id'];

	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Advertises', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Advertises', $this->listing_cols);
		}
	}

	/**
	 * Display a listing of the Advertises.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
                 $user = Auth::user();
		$module = Module::get('Advertises');
                $properties = DB::table('my_properties')
                                    ->where("my_properties.user_id", $user->id)->whereNull('my_properties.deleted_at')->lists("address","id");
		if(Module::hasAccess($module->id)) {
			return View('la.advertises.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'properties' => $properties,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new advertise.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created advertise in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Advertises", "create")) {
                        $user = Auth::user();
                        $request->merge(["user_id"=>$user->id]);
			$rules = Module::validateRules("Advertises", $request);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}

			$insert_id = Module::insert("Advertises", $request);

			return redirect()->route(config('laraadmin.adminRoute') . '.advertises.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified advertise.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Advertises", "view")) {

			$advertise = Advertise::find($id);
			if(isset($advertise->id)) {
				$module = Module::get('Advertises');
				$module->row = $advertise;

				return view('la.advertises.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('advertise', $advertise);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("advertise"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified advertise.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Advertises", "edit")) {
                         $user = Auth::user();
			$advertise = Advertise::find($id);
                        $properties = DB::table('my_properties')
                                    ->where("my_properties.user_id", $user->id)->whereNull('my_properties.deleted_at')->lists("address","id");
			if(isset($advertise->id)) {
				$module = Module::get('Advertises');

				$module->row = $advertise;

				return view('la.advertises.edit', [
					'module' => $module,
					'properties' => $properties,
					'view_col' => $this->view_col,
				])->with('advertise', $advertise);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("advertise"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified advertise in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Advertises", "edit")) {

			$rules = Module::validateRules("Advertises", $request, true);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}

			$insert_id = Module::updateRow("Advertises", $request, $id);

			return redirect()->route(config('laraadmin.adminRoute') . '.advertises.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified advertise from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Advertises", "delete")) {
			Advertise::find($id)->delete();

			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.advertises.index');
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
		$values = DB::table('advertises')->select($this->listing_cols)->whereNull('deleted_at')->where('user_id',$user->id);


		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Advertises');

		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) {
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/advertises/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Advertises", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/advertises/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}

				if(Module::hasAccess("Advertises", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.advertises.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
