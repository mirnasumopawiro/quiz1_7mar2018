<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorie;
use App\item;

class StockController extends Controller
{
	//FOR ITEMS TABLE
    public function getItem(){
    	return item::all();
    }

    public function insertItem(Request $request){
    	$data = new item();
    	$data['category_id'] = $request->input('category_id');
    	$data['name'] = $request->input('name');
    	$data['price'] = $request->input('price');
    	$data['stock'] = $request->input('stock');
    	$data->save();

    	return response([
			'msg' => 'success',
		],200);
    }

    //harus di fix
    public function updateItem(Request $request){
    	item::where('id', '=', $request->input('id'))
    			->update(['name' => $request->input('name'),
    					'price' => $request->input('price'),
    					'stock' => $request->input('stock')
    				]);
    	return response([
    		'msg' => 'success'
    	]);
    }

    public function deleteItem(Request $request){
    	item::where('id', '=', $request->input('id'))->delete();
    }

    public function showByItem($id){
    	$idCategory = item::find($id)->value('category_id');

    	$data['item'] = item::find($id);
    	$data['item']['category'] = categorie::find($idCategory);

    	return $data;
    }




}
