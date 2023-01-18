<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(){
        $player=Player::all();
         return response()->json($player);
  
      }
  
      public function show($id){
          $player=Player::find($id);
           return response()->json($player);
    
        }
  
        public function store(Request $request){
          $rules=[
            'name'=>'required',
            'lastname'=>'required',
            'score'=>'required',
            'teams_id'=>'required',
          ];
          try {
              $request->validate($rules);
          } catch(\Illuminate\Validation\ValidationException $e){
              return response()->json($e->errors(),422);
          }
          $player=Player::create(
              [
                'name'=>$request->name,
                'description'=>$request->description,
                'average'=>$request->average,
                'sports_id'=>$request->sports_id,
                'trainers_id'=>$request->trainers_id
                
                
              ]
              );
          return response()->json($player);
      }
  
      public function update(Request $request, $id)
      {
          $rules=[
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'score'=>$request->score,
            'teams_id'=>$request->teams_id,
          
            
          ];
          try {
              $request->validate($rules);
          } catch(\Illuminate\Validation\ValidationException $e){
              return response()->json($e->errors(),420);
          }
          $player=Player::find($id);
  
          $player->update(
              [
                'name'=>$request->name,
                'lastname'=>$request->lastname,
                'score'=>$request->score,
                'teams_id'=>$request->teams_id,
                
              ]
              );
          return response()->json($player);
      }
  
      public function destroy($id)
      {
          $player=Player::find($id);
          $player->delete();
  
          return response()->json('eliminado');
      }
}
