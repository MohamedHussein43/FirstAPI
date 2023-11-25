<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class DeviceController extends Controller
{
    //
    function list($id = null)
    {
        return $id?Device::find($id):Device::all();
    }
    function postMethod(Request $req)
    {
        $device = new Device;
        $device -> name = $req -> name;
        $device -> member_id = $req -> member_id;
        $result = $device -> save();
        if($result){
            return ["message"=>"data has been saved"];
        }
        else{
            return ["message" => "Some thing is wrong"];
        }
    }
    function putMethod(Request $req)
    {
        $device = Device::find($req->id);
        $device -> name = $req -> name;
        $device -> member_id = $req -> member_id;
        $result = $device -> save();
        if($result){
                return ['result' => "data is updated"];
        }
        else{
            return ['result' => "operation faild"];
        }
    }
    function search ($name){
        return Device::where("name","like","%".$name."%")->get();
    }
    
    function delete($id){
        $device = Device::find($id);
        $result = $device->delete();
        if($result){
            return ["result"=>"record has been deleted"];
        }
        else{
            return ["result"=>"delete operation faild"];
        }
    }

    function testdata(Request $req){
        $roles = array(
            "member_id" => "required|min:2|max:4"
        );
        $validator = Validator::make($req->all(), $roles);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
            return ["one" => "two"];
        }
    }
}
