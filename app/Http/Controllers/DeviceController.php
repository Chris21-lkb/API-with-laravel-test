<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\Name;

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
        return $device = Name::all();
    }

    function updatedb2(Request $req){
        $name = Name::find($req -> id);
        $name -> name = $req -> name;
        $name -> email = $req -> email;
        $result = $name -> save();

        if($result){
            return ["Result"=>"Data have been updated"];
        }else{
            return ["Result"=>"Operation has failed, Please try again later"];
        }
    }

    function deletedb2($id){
        $name = Name::find($id);
        if($name){
            $name -> delete();
            return ["Result"=>"data has been deleted"];
        }
        else{
            return ["Result"=>"Data has not been found"];
        }
    }

    function find($name){
        return Device::where("name","like","%".$name."%")->get();
    }
}
