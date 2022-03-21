<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
class ConfigController extends Controller
{
  
    public function index()
    {
        $config = Config::all();
        return view('backend.content.config_web.index',compact('config'));
    }

    public function edit($id){
        $config = Config::find($id);
        return view('backend.content.config_web.edit',compact('config'));
    }  
    public function update(Request $request, Config $config){
        $input = $request->all();
        $id =$request['id'];
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $config->logo = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/image/config/logo'), $config->logo);
        }
        if($request->hasFile('favicon')){
            $image = $request->file('favicon');
            $config->favicon = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/image/config/favicon'), $config->favicon);
        }
        $arr = array(
            'name'=> $input['name'],
            'address'=>$input['address'],
            'tel'=>$input['tel'],
            'description'=>$input['description'],
            'sub_description'=>$input['sub_description'],
            'facebook'=>$input['facebook'],
            'instagram'=>$input['instagram'],
            'twitter'=>$input['twitter'],
            'logo'=>$config->logo,
            'favicon'=>$config->favicon,
        );
        
    
        $config->where('id',$id)->update($arr);
        return redirect()->route('config.index');
    }

}
