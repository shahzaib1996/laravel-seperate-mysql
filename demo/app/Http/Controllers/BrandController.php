<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Material;
use App\Brand;

class BrandController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function create() {
		$materials = Material::where('is_active', 1)->get();
		$brands = Brand::where('is_active', 1)->orderBy('id', 'desc')->get(['id', 'name']);		
		return view('add_brand', [ 'materials' => $materials, 'brands' => $brands ] );
	}

	public function view() {
		$brands = Brand::where('is_active', 1)->get();
		return view('view_brands', [ 'brands' => $brands ]);
	}

	public function edit($id) {
		$brand = Brand::find($id);
		$materials = Material::where('is_active',1)->get();
		return view('edit_brand', [ 'brand' => $brand , 'materials' => $materials ] );
	}

	public function update(Request $request) {
		$id = $request->input('id');
		$brand = Brand::find($id);
		$brand->name = $request->input('name');
		$brand->material_id = $request->input('material_id');
		$brand->description = $request->input('description');
		$brand->price = $request->input('price');
		$brand->updated_by = Auth::user()->email;
		if($brand->save()) {
			session()->flash('message', 'Success! Material with an id " '.$id.' " has been Updated.');
			session()->flash('class', 'alert-success');
		} else {
			session()->flash('message', 'Failed! Material with an id " '.$id.' " has not been Updated.');
			session()->flash('class', 'alert-danger');
		}
		return redirect('edit-brand/'.$id);
	}

	public function delete($id) {
		$brand = Brand::find($id);
		$brand->is_active = 0;
		if($brand->save()) {
			session()->flash('message', 'Success! Brand with an id " '.$id.' " has been deleted.');
			session()->flash('class', 'alert-success');
		} else {
			session()->flash('message', 'Failed! Brand with an id " '.$id.' " has not been deleted.');
			session()->flash('class', 'alert-danger');
		}
		return redirect('view-brands');
	}

	public function store(Request $request) {

		$brand = new Brand;

		$brand->name = $request->input('name');
		$brand->material_id = $request->input('material_id');
		$brand->description = $request->input('description');
		$brand->price = $request->input('price');
		$brand->created_by = Auth::user()->email;
		$brand->created_at = date('Y-m-d H:i:s');

		if($brand->save()) {
			session()->flash('message', 'Success! Brand Added.');
			session()->flash('class', 'alert-success');
		} else {
			session()->flash('message', 'Failed! Brand Adding.');
			session()->flash('class', 'alert-danger');
		}

		return redirect('brand');

	}

}
