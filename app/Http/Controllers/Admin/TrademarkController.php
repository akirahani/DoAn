<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trademark;
class TrademarkController extends Controller
{
    public function index()
    {
        $trademark = Trademark::all();
        return view('backend.content.trademark.index',compact('trademark'));
    }
    public function insert()
    {
        return view('backend.content.trademark.insert');
    }
    public function store(Request $request)
    {
        $trademark = new Trademark();
        $input = $request->all();
        $trademark->name = $input['name'];
        $trademark->introduce = $input['introduce'];
        if($request->hasfile('logo')){
            $image = $request ->file('logo');
            $trademark->logo = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/image/trademark/logo'),$trademark->logo);
        }
        if($request->hasfile('img_description')){
            $image = $request ->file('img_description');
            $trademark->img_description = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/image/trademark'),$trademark->img_description);
        }
        $trademark->hotline = $input['hotline'];
        $trademark->save();
        return redirect()->route('admin.trademark');
    }

    
    public function update(Request $request, Trademark $trademark)
    {
        $input = $request->all();
        $id = $input['id'];
        $arr = array(
            'name'=>$input['name'],
            'introduce'=>$input['introduce'],
            'hotline'=>$input['hotline'],
        );
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $image_url = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/image/trademark/logo'), $image_url);
            $arr['logo'] = $image_url;
        }
        if($request->hasFile('img_description')){
            $image = $request->file('img_description');
            $image_url = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/image/trademark/'), $image_url);
            $arr['img_description'] = $image_url;
        }
        $trademark->where('id',$id)->update($arr);
        return redirect()->route('admin.trademark');
    }
    public function edit($id)
    {
        $trademark = Trademark::find($id);
        return view('backend.content.trademark.edit', compact('trademark'));
    }

    public function delete($id,Trademark $trademark)
    {
        $trademark->where('id',$id)->delete();
        return response()->json([
            "success"=>"Bạn xóa thành công"
        ]);
    }
}
