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

use App\Models\Quittance;

class QuittancesController extends Controller
{
	public $show_action = true;
	public $view_col = 'quittance_date';
	public $listing_cols = ['id', 'quittance_date', 'uploaded_file'];

	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Quittances', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Quittances', $this->listing_cols);
		}
	}

	/**
	 * Display a listing of the Quittances.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Quittances');

		if(Module::hasAccess($module->id)) {
			return View('la.quittances.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new quittance.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created quittance in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Quittances", "create")) {
                     $user = Auth::user();
                    $request->merge(["user_id"=>$user->id]);
			$rules = Module::validateRules("Quittances", $request);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}

			$insert_id = Module::insert("Quittances", $request);

			return redirect()->route(config('laraadmin.adminRoute') . '.quittances.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified quittance.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Quittances", "view")) {

			$quittance = Quittance::find($id);
			if(isset($quittance->id)) {
				$module = Module::get('Quittances');
				$module->row = $quittance;

				return view('la.quittances.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('quittance', $quittance);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("quittance"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified quittance.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Quittances", "edit")) {
			$quittance = Quittance::find($id);
			if(isset($quittance->id)) {
				$module = Module::get('Quittances');

				$module->row = $quittance;

				return view('la.quittances.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('quittance', $quittance);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("quittance"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified quittance in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Quittances", "edit")) {
                     $user = Auth::user();
                    $request->merge(["user_id"=>$user->id]);
			$rules = Module::validateRules("Quittances", $request, true);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}

			$insert_id = Module::updateRow("Quittances", $request, $id);

			return redirect()->route(config('laraadmin.adminRoute') . '.quittances.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified quittance from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Quittances", "delete")) {
			Quittance::find($id)->delete();

			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.quittances.index');
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
            $extensions = $this->get_extensions();
            $user = Auth::user();
		$values = DB::table('quittances')->select($this->listing_cols)->where("user_id",$user->id)->whereNull('deleted_at');

		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Quittances');

		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) {
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
//					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                                        $quittance = DB::table('quittances')->where("id",$data->data[$i][0])->first();
                                        $data->data[$i][$j] = '<a class="preview" target="_blank" href="'.url('').'/files/'.$quittance->hash.'/'.$quittance->name.'">';
                                        if (isset($extensions[$payment_detail->extension])) {
                                            $data->data[$i][$j] .= '<img src="'.url('').'/storage/icons/'.$extensions[$payment_detail->extension].'">';
                                        } else {
                                            $data->data[$i][$j] .= '<i class="fa fa-file-o"></i>';
                                        }
				}
                                if($j==2) {
                                    $quittance = DB::table('quittances')->leftJoin("uploads", "uploads.id", "=", "quittances.uploaded_file")->where("quittances.id",$data->data[$i][0])->first();

                                        $data->data[$i][$j] = '<a class="preview" target="_blank" href="'.url('').'/files/'.$quittance->hash.'/'.$quittance->name.'">';
                                        if (isset($extensions[$quittance->extension])) {
                                            $data->data[$i][$j] .= '<img src="'.url('').'/storage/icons/'.$extensions[$quittance->extension].'">';
                                        } else {
                                            $data->data[$i][$j] .= '<i class="fa fa-file-o"></i>';
                                        }
                                }
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/quittances/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Quittances", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/quittances/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}

				if(Module::hasAccess("Quittances", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.quittances.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
