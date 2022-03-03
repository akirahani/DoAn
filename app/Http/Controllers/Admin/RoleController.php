<?php

namespace App\Http\Controllers\Admin;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $role = Role::all();
        return view('backend.content.person.role_permisson.index',compact('role'));
    }
    public function add(){
        $permissions = Permission::all();
        return view('backend.content.person.role_permisson.insert',compact('permissions'));
    }
    public function insert(Request $request){
        
        $input= $request->all();
  
        $role = new Role;
        $role->name = $input['name'];
        $role->display_name = $input['display_name'];
        $role->save(); 
        $role->permission()->attach($input['permission']);
        return redirect()->route('role.index');
    }
    public function edit($id){
        $role = Role::find($id);
        $permission =$role->permission()->get();
        $permissions= Permission::all();                                    
        return view('backend.content.person.role_permisson.edit',compact('role','permission','permissions'));
    }
    public function update(Role $role,Request $request , Permission $permission){
        $input = $request->all();
        $id = $input['id'];
        $permission=$input['permission'];
        $data =[
            'name'=> $input['name'],
            'display_name'=>$input['display_name'],
            'permission'=>$permission
        ];
        $roles = $role->find($id);
        $roles->update($data);
        $roles->permission()->sync($permission);
        return redirect()->route('role.index');
    }
    public function delete($id, Role $role){
            $role->where('id',$id)->delete();
            return response()->json([
                "success"=>"Bạn đã xóa thành công"            
            ]);
    }
    // insert permission
    public function permission(){
        return view('backend.content.person.role_permisson.add_permission');
    }

    public function permission_insert(Request $request){
        $input = $request->all();
        $permission = new Permission;
        $permission->name = $input['name'];
        $permission->route = $input['route'];
        $permission->save();
        return redirect()->route('role.add');
    }

}
