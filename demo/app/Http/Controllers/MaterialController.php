<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Material;

class MaterialController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function create() {
		$materials = Material::where('is_active', 1)->orderBy('id', 'desc')->get(['id', 'name']);
		return view('add_material', [ 'materials' => $materials ] );
	}

	public function view() {
		$materials = Material::where('is_active', 1)->get();
		return view('view_materials', [ 'materials' => $materials ]);
	}

	public function edit($id) {
		$material = Material::find($id);
		return view('edit_material', [ 'material' => $material ] );
	}

	public function update(Request $request) {
		$id = $request->input('id');
		$material = Material::find($id);
		$material->name = $request->input('name');
		$material->description = $request->input('description');
		$material->updated_by = Auth::user()->email;
		if($material->save()) {
			session()->flash('message', 'Success! Material with an id " '.$id.' " has been Updated.');
			session()->flash('class', 'alert-success');
		} else {
			session()->flash('message', 'Failed! Material with an id " '.$id.' " has not been Updated.');
			session()->flash('class', 'alert-danger');
		}
		return redirect('edit-material/'.$id);
	}

	public function delete($id) {
		$material = Material::find($id);
		$material->is_active = 0;
		if($material->save()) {
			session()->flash('message', 'Success! Material with an id " '.$id.' " has been deleted.');
			session()->flash('class', 'alert-success');
		} else {
			session()->flash('message', 'Failed! Material with an id " '.$id.' " has not been deleted.');
			session()->flash('class', 'alert-danger');
		}
		return redirect('view-materials');
	}

	public function store(Request $request) {

		$material = new Material;

		$material->name = $request->input('name');
		$material->description = $request->input('description');
		$material->created_by = Auth::user()->email;
		$material->created_at = date('Y-m-d H:i:s');

		if($material->save()) {
			session()->flash('message', 'Success! Material Added.');
			session()->flash('class', 'alert-success');
		} else {
			session()->flash('message', 'Failed! Material Adding.');
			session()->flash('class', 'alert-danger');
		}

		return redirect('material');

	}
}
