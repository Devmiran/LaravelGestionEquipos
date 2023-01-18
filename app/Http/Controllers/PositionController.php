<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(){
        $position=Position::all();
         return response()->json($position);
  
      }
  
      public function show($id){
          $position=Position::find($id);
           return response()->json($position);
    
        }
  
        public function store(Request $request){
          $rules=[
              'name'=>'required|min:5|max:10',
              'sports_id'=>'required'
          ];
          try {
              $request->validate($rules);
          } catch(\Illuminate\Validation\ValidationException $e){
              return response()->json($e->errors(),422);
          }
          $position=Position::create(
              [
                  'name'=>$request->name,
                  'sports_id'=>$request->sports_id
                
              ]
              );
          return response()->json($position);
      }
  
      public function update(Request $request, $id)
      {
          $rules=[
              'name'=>'required|min:5|max:10',
              'sports_id'=>'required'
            
          ];
          try {
              $request->validate($rules);
          } catch(\Illuminate\Validation\ValidationException $e){
              return response()->json($e->errors(),420);
          }
          $position=Position::find($id);
  
          $position->update(
              [
                  'name'=>$request->name,
                  'sports_id'=>$request->sports_id
              ]
              );
          return response()->json($position);
      }
  
      public function destroy($id)
      {
          $position=Position::find($id);
          $position->delete();
  
          return response()->json('eliminado');
      }
    
  
}
