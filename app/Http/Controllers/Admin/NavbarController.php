<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Navbar;
class NavbarController extends Controller
{
    public function index()
    {
        $navbar = Navbar::all();
        return view('backend.content.navbar.index',compact('navbar'));
    }

    public function add(){
        $navbar = Navbar::all();
        return view('backend.content.navbar.insert',compact('navbar'));
    }
    public function insert(Request $request){
        $input= $request->all();
        $navbar = new Navbar;
        $navbar->title = $input['title'];
        $navbar->ordering = $input['ordering'];
        $navbar->link = $input['link'];
        $navbar->save(); 
        return redirect()->route('navbar.index');
    }
    public function edit($id){
        $navbar = Navbar::find($id);
        return view('backend.content.navbar.edit',compact('navbar'));
    }
    public function update(Request $request,Navbar $navbar){
        $input = $request->all();
        $id = $request['id'];
        $data =[
            'title' =>$input['title'],
            'ordering'=> $input['ordering'],
            'link'=>$input['link'],
        ];
        $navbar->where('id',$id)->update($data);
        return redirect()->route('navbar.index');
    }
    public function delete($id, Navbar $navbar){
            $navbar->where('id',$id)->delete();
            return response()->json([
                "success"=>"Bạn đã xóa thành công"            
            ]);
    }
}
