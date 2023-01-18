<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index(){
        $trainer=Trainer::all();
         return response()->json($trainer);
  
      }
  
      public function show($id){
          $trainer=Trainer::find($id);
           return response()->json($trainer);
    
        }
  
        public function store(Request $request){
          $rules=[
            'name'=>'required',
            'lastname'=>'required',
            'age'=>'required',
            'birtdate'=>'required'
          ];
          try {
              $request->validate($rules);
          } catch(\Illuminate\Validation\ValidationException $e){
              return response()->json($e->errors(),422);
          }
          $trainer=Trainer::create(
              [
                'name'=>$request->name,
                'lastname'=>$request->lastname,
                'age'=>$request->age,
                'birtdate'=>$request->birtdate
                
              ]
              );
          return response()->json($trainer);
      }
  
      public function update(Request $request, $id)
      {
          $rules=[
            'name'=>'required',
            'lastname'=>'required',
            'age'=>'required',
            'birtdate'=>'required'
            
          ];
          try {
              $request->validate($rules);
          } catch(\Illuminate\Validation\ValidationException $e){
              return response()->json($e->errors(),420);
          }
          $trainer=Trainer::find($id);
  
          $trainer->update(
              [
                'name'=>$request->name,
                'lastname'=>$request->lastname,
                'age'=>$request->age,
                'birtdate'=>$request->birtdate
              ]
              );
          return response()->json($trainer);
      }
  
      public function destroy($id)
      {
          $trainer=Trainer::find($id);
          $trainer->delete();
  
          return response()->json('eliminado');
      }
}
