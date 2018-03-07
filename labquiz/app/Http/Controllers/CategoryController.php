<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorie;
use App\item;

class CategoryController extends Controller
{
    //FOR CATEGORIES TABLE

	public function getCategory(){
		return categorie::all();
	}

	public function insertCategory(Request $request){
		$data = new categorie();
		$data['name'] = $request->input('name');
		$data->save();

		return response([
			'msg' => 'success',
		],200);
	}

	public function updateCategory(Request $request){
		categorie::where('id', '=', $request->input('id'))
				->update(['name' => $request->input('name')]);

		return response([
			'msg' => 'success'
		]);
	}

	public function deleteCategory(Request $request){
		categorie::where('id', '=', $request->input('id'))->delete();
	}

	public function showByCategory($id){
		$idCategory = categorie::where('id', '=', $id)->value('id');
		$nameCategory = categorie::where('id', '=', $id)->value('name');

		$data['id'] = $idCategory;
		$data['name'] = $nameCategory;
		$data['items'] = [ item::where('category_id', '=', $id)->get()];

		return $data;
	}
}
