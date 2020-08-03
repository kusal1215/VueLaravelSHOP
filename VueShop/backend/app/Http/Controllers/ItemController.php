<?php

namespace App\Http\Controllers;

use App\item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function postItem (Request $request){

        $item = new item();
        $expl = explode(',',$request->image);
        $decode = base64_decode($expl[1]);

        if (str_contains($expl[0], 'png')){
            $exten = 'png';
        }
        else{
            $exten = 'jpg';
        }

        $current_time = Carbon::now() ->timestamp;
        $filename = $current_time.'.'.$exten;

        $filepath = public_path().'/'.$filename;

        file_put_contents($filepath,$decode);

        $item ->name = $request->input('name');
        $item ->quantity = $request->input('quantity');
        $item ->image = $filename;
        $item ->price = $request->input('price');
        $item ->save();

        return response() ->json(['message'=> $item],201);
    }

    public function getItems (){

        $allItems = item::all();

        return response() ->json(['allItems'=> $allItems],200);
    }

    public function getItem ($id){

        $item = item::find($id);

        $response = [ 'item' => $item ];

        return response() -> json($response,200);
    }

    public function deleteItem ($id){
        $item = item::find($id);

        if (!$item){
            return response() ->json(['message'=> "Item Not Found "],404);
        }

        $item->delete();

        return response() ->json(['message'=> "deleted "],201);
    }

    public function editItem (Request $request ,$id){

        $item = item::find($id);

        if (!$item){
            return response() ->json(['msg'=> "Item Not Found "],404);
        }

        $item ->name = $request->input('name');
        $item ->quantity = $request->input('quantity');
        $item ->price = $request->input('price');
        $item ->save();

        return response() ->json(['message'=> $item],201);

    }
}
