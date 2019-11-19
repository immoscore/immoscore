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

use App\Models\Upcoming_Visit;

class Upcoming_VisitsController extends Controller
{
	public $show_action = true;
	public $view_col = 'address';
	public $listing_cols = ['id', 'address', 'rent', 'area_sqm', 'visit_date', 'market_comparison', 'appointment_time', 'change_of_time', 'update_status'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Upcoming_Visits', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Upcoming_Visits', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Upcoming_Visits.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Upcoming_Visits');
		
		if(Module::hasAccess($module->id)) {
			return View('la.upcoming_visits.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new upcoming_visit.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created upcoming_visit in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Upcoming_Visits", "create")) {
		
			$rules = Module::validateRules("Upcoming_Visits", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Upcoming_Visits", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.upcoming_visits.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified upcoming_visit.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Upcoming_Visits", "view")) {
			
			$upcoming_visit = Upcoming_Visit::find($id);
			if(isset($upcoming_visit->id)) {
				$module = Module::get('Upcoming_Visits');
				$module->row = $upcoming_visit;
				
				return view('la.upcoming_visits.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('upcoming_visit', $upcoming_visit);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("upcoming_visit"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified upcoming_visit.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Upcoming_Visits", "edit")) {			
			$upcoming_visit = Upcoming_Visit::find($id);
			if(isset($upcoming_visit->id)) {	
				$module = Module::get('Upcoming_Visits');
				
				$module->row = $upcoming_visit;
				
				return view('la.upcoming_visits.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('upcoming_visit', $upcoming_visit);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("upcoming_visit"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified upcoming_visit in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Upcoming_Visits", "edit")) {
			
			$rules = Module::validateRules("Upcoming_Visits", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Upcoming_Visits", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.upcoming_visits.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified upcoming_visit from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Upcoming_Visits", "delete")) {
			Upcoming_Visit::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.upcoming_visits.index');
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
		$values = DB::table('upcoming_visits')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Upcoming_Visits');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/upcoming_visits/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Upcoming_Visits", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/upcoming_visits/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Upcoming_Visits", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.upcoming_visits.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
