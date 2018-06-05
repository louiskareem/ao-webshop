<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;
use App\Category;
use App\Client;
use App\OrderDetail;
use App\Order;
use App\ShoppingCart;
use Session;
use Auth;
use Input;

class ApiController extends Controller
{
    public function index()
    {
    	$product = Product::all();
    	$apiProduct = json_encode($product);

    	return response($apiProduct);
    }

    public function create(Request $request)
    {
        // $validatedNoteData = $request->validate([
        //     'title' => 'required',
        //     'is_favourite' => 'required',
        // ]);
        // $note = Note::create($validatedNoteData);
        // return response()->json($note);
    }

    public function update(Request $request, $id)
    {
        // $note = Note::find($id)->update(['title' => $request->get('title')]);
        // return response()->json($note);
    }

    public function destroy($id)
    {
        // $note = Note::findOrFail($id);
        // return response()->json($note->delete());
    }
}
