<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $team=Team::all();
         return response()->json($team);
  
      }
  
      public function show($id){
          $teams=Team::find($id);
           return response()->json($teams);
    
        }
  
        public function store(Request $request){
          $rules=[
            'name'=>'required',
            'description'=>'required',
            'average'=>'required',
            'sports_id'=>'required',
            'trainers_id'=>'required'
          ];
          try {
              $request->validate($rules);
          } catch(\Illuminate\Validation\ValidationException $e){
              return response()->json($e->errors(),422);
          }
          $team=Team::create(
              [
                'name'=>$request->name,
                'description'=>$request->description,
                'average'=>$request->average,
                'sports_id'=>$request->sports_id,
                'trainers_id'=>$request->trainers_id
                
                
              ]
              );
          return response()->json($team);
      }
  
      public function update(Request $request, $id)
      {
          $rules=[
            'name'=>'required',
            'description'=>'required',
            'average'=>'required',
            'sports_id'=>'required',
            'trainers_id'=>'required'
            
          ];
          try {
              $request->validate($rules);
          } catch(\Illuminate\Validation\ValidationException $e){
              return response()->json($e->errors(),420);
          }
          $team=Team::find($id);
  
          $team->update(
              [
                'name'=>$request->name,
                'description'=>$request->description,
                'average'=>$request->average,
                'sports_id'=>$request->sports_id,
                'trainers_id'=>$request->trainers_id
              ]
              );
          return response()->json($team);
      }
  
      public function destroy($id)
      {
          $team=Team::find($id);
          $team->delete();
  
          return response()->json('eliminado');
      }
}
