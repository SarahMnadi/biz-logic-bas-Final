<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showManage(){
        $rooms = Room::all();
        return view('room.manage')->with([
            'rooms' => $rooms
        ]);
    }

    public function storeRoom(Request $request){
        $request->validate([
            'roomId' => 'required',
            'roomName' => 'required',
            'roomSecurity' => 'required',
        ]);

        // //fetch parent
        // $organization = Organization::find($request->input('organizationId'));
        // if (!$organization) {
        //     return response()->json([
        //         'error' => 'Organization Not Exist,make sure you register organization'
        //     ]);
        // }

        //create new branch
        $room = new Room();
        $room->room_id = $request->input('roomId');
        $room->room_name = $request->input('roomName');
        $room->room_security_level = $request->input('roomSecurity');
        $room->save();
        return redirect()->route('showRoomManage');
        
    }

    public function showAll()
    {
        $rooms = Room::orderBy('created_at' , 'DESC')->get();
        foreach ($rooms as $room) {
           $room->users;
           $room->device;
        }

        return view('room.listallrooms')->with([
            'rooms' => $rooms
        ]);
        // return response()->json([
        //     'rooms' => $rooms
        // ]);

    }
}
