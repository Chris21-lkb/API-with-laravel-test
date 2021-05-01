<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    function index(Request $req){
        $device = new Device;
        $device -> name = $req -> name;
        $device -> member_id = $req -> member_id;
        $result=$device->save();

         if($result){
            return ['result'=>'Data has been saved'];
         }
         else{
            return ['result'=>'Operation failed'];
         }
    }

    function update(Request $req){
        $device = Device::find($req -> id);
        $device -> name = $req -> name;
        $device -> member_id = $req -> member_id;
        $result = $device -> save();

        if($result){
            return ["result" => "Data has been updated"];
        }else{
            return ["result" => "Operation has failed"];
        }

    }

    function delete($id){
        $device = Device::find($id);
        $result = $device -> delete();

        if($result){
            return ["result" => "Data has been deleted"];
        }else{
            return ["result" => "Operation has failed"];
        }
    }

    function read(){
        return $device = Device::all();
    }

    function find($name){
        return Device::where("name","like","%".$name."%")->get();
    }
}
