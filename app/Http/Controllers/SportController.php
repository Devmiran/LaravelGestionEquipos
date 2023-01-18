<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index(){
      $sport=Sport::all();
       return response()->json($sport);

    }

    public function show($id){
        $sport=Sport::find($id);
         return response()->json($sport);
  
      }

      public function store(Request $request){
        $rules=[
            'name'=>'required|min:5|max:10',
            'description'=>'required'
        ];
        try {
            $request->validate($rules);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json($e->errors(),422);
        }
        $sport=Sport::create(
            [
                'name'=>$request->name,
                'description'=>$request->description
              
            ]
            );
        return response()->json($sport);
    }

    public function update(Request $request, $id)
    {
        $rules=[
            'name'=>'required|min:5|max:10',
            'description'=>'required'
          
        ];
        try {
            $request->validate($rules);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json($e->errors(),420);
        }
        $sport=Sport::find($id);

        $sport->update(
            [
                'name'=>$request->name,
                'description'=>$request->description
            ]
            );
        return response()->json($sport);
    }

    public function destroy($id)
    {
        $sport=Sport::find($id);
        $sport->delete();

        return response()->json('eliminado');
    }
  
}
