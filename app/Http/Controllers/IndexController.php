<?php

namespace App\Http\Controllers;
use App\Models\Player;
use App\Models\Club;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('club.addclub');
    }

    public function store(Request $request){
      $request->validate([
        'club_name'=> 'required',
        'club_league'=>'required',
        'club_image'=>'required|mimes:png,jpeg,jpg',
    ]);
      $image=uniqid().'.'.$request->club_image->extension();
      $request->club_image->move(public_path('club/'),$image);
      $club=new Club;
      $club->club_name=$request->club_name;
      $club->club_league=$request->club_league;
      $club->club_image=$image;
      $club->save();
     $notification = array(

        'message' => 'Club save sucesssfullly!!',
        'alert-type'=> 'success'
       );


      return redirect()->route('all.club')->with($notification);
    }

    public function all_club(){
        $clubs=Club::all();
        return view('club.allclub',compact('clubs'));
    }

    public function edit_club($id){
        $club=Club::findOrFail($id);
      return view('club.edit',['club'=> $club]);

    }

    public function update_club(Request $request,$id){
        $club=Club::findOrFail($id);
        $request->validate([
            'club_name'=> 'required',
            'club_league'=> 'required',
        ]);
        if($request->club_image){
            $image=uniqid().'.'.$request->club_image->extension();
            $request->club_image->move(public_path('club/'),$image);
            $club->club_image=$image;
          }
          $club->club_name=$request->club_name;
          $club->club_league=$request->club_league;
          $club->save(); 
          $notification = array(

            'message' => 'Club updated sucesssfullly!!',
            'alert-type'=> 'success'
           );
          return redirect()->route('all.club')->with($notification); 
    }

    public function delete_club($id){
       $club=Club::findOrFail($id);
       unlink(public_path('club/'.$club->club_image));
       $club->delete();
       $notification = array(

        'message' => 'Club Deleted sucesssfullly!!',
        'alert-type'=> 'success'
       );
      return redirect()->route('all.club')->with($notification); 
       
    } 
    public function add_player(){
        $clubs=Club::all();
        return view('player.addplayer',compact('clubs'));
    }

    public function store_player(Request $request){
        $request->validate([
          'name'=> 'required',
          'age'=>'required',
          'image'=>'required|mimes:png,jpeg,jpg',
      ]);
        $image_player=uniqid().'.'.$request->image->extension();
        $request->image->move(public_path('player/'),$image_player);
        $player=new Player;
        $player->name=$request->name;
        $player->age=$request->age;
        $player->image=$image_player;
        $player->club_id=$request->club_id;
        $player->save();
       $notification = array(
  
          'message' => 'Player save sucesssfullly!!',
          'alert-type'=> 'success'
         );
  
  
        return redirect()->route('all.player')->with($notification);
      }
      public function all_player(){
        $players=Club::with('relation')->get();
          //  dd($players);
        return view('player.allplayer',compact('players'));
      }
  
   
}
