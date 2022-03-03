<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
class PersonController extends Controller
{
    public function index(){
        $account = Admin::all();
        return view('backend.content.person.account.index',compact('account'));
    }
    public function add(){
        $role = Role::all();
        return view('backend.content.person.account.insert',compact('role'));
    }
    public function insert(Request $request){
        $input= $request->all();
        $account = new Admin;
        $account->name = $input['name'];
        $account->email = $input['email'];
        $account->password = bcrypt($input['password']);
        $account->save(); 
        $account->role()->attach($input['role']);
        return redirect()->route('account.index');
    }
    public function edit($id){
        $account = Admin::find($id);
        $role = Role::all();
        return view('backend.content.person.account.edit',compact('account','role'));
    }
    public function update(Admin $account,Request $request,Role $role){
        $input = $request->all();
        $id = $request['id'];
        $role = $input['role'];
        $data =[
            'name' =>$input['name'],
            'email'=> $input['email'],
            'password'=>bcrypt($input['password']),
            'role'=> $role
        ];
        $accounts = $account->find($id);
        $accounts->update($data);
        $accounts->role()->sync($role);
        return redirect()->route('account.index');
    }
    public function delete($id, Admin $account){
            $account->where('id',$id)->delete();
            return response()->json([
                "success"=>"Bạn đã xóa thành công"            
            ]);
    }
}
