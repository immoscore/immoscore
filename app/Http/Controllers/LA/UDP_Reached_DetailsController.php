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

use App\Models\UDP_Reached_Detail;

class UDP_Reached_DetailsController extends Controller
{
	public $show_action = true;
	public $view_col = 'total_count';
	public $listing_cols = ['id', 'age', 'total_count', 'Gender', 'udp_detail_id', 'udp_disaggregation_id', 'uploadudp_id'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('UDP_Reached_Details', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('UDP_Reached_Details', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the UDP_Reached_Details.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('UDP_Reached_Details');
		
		if(Module::hasAccess($module->id)) {
			return View('la.udp_reached_details.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new udp_reached_detail.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created udp_reached_detail in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("UDP_Reached_Details", "create")) {
		
			$rules = Module::validateRules("UDP_Reached_Details", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("UDP_Reached_Details", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.udp_reached_details.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified udp_reached_detail.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("UDP_Reached_Details", "view")) {
			
			$udp_reached_detail = UDP_Reached_Detail::find($id);
			if(isset($udp_reached_detail->id)) {
				$module = Module::get('UDP_Reached_Details');
				$module->row = $udp_reached_detail;
				
				return view('la.udp_reached_details.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('udp_reached_detail', $udp_reached_detail);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("udp_reached_detail"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified udp_reached_detail.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("UDP_Reached_Details", "edit")) {			
			$udp_reached_detail = UDP_Reached_Detail::find($id);
			if(isset($udp_reached_detail->id)) {	
				$module = Module::get('UDP_Reached_Details');
				
				$module->row = $udp_reached_detail;
				
				return view('la.udp_reached_details.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('udp_reached_detail', $udp_reached_detail);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("udp_reached_detail"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified udp_reached_detail in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("UDP_Reached_Details", "edit")) {
			
			$rules = Module::validateRules("UDP_Reached_Details", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("UDP_Reached_Details", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.udp_reached_details.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified udp_reached_detail from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("UDP_Reached_Details", "delete")) {
			UDP_Reached_Detail::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.udp_reached_details.index');
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
		$values = DB::table('udp_reached_details')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('UDP_Reached_Details');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/udp_reached_details/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("UDP_Reached_Details", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/udp_reached_details/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("UDP_Reached_Details", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.udp_reached_details.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
