<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\TuVan;
Use DB;


class CustomerController extends Controller
{
    public function index()
    {
        $khach = User::all();
        return view('backend.content.khach.index',compact('khach'));
    }
    public function add(){
        $user = User::all();
        return view('backend.content.khach.insert',compact('user'));
    }
    public function insert(Request $request){
        $input= $request->all();
        $account = new User;
        $account->name = $input['name'];
        $account->email = $input['email'];
        $account->password = bcrypt($input['password']);
        $account->save(); 
        return redirect()->route('khach.index');
    }
    public function edit($id){
        $khach = User::find($id);
        return view('backend.content.khach.edit',compact('khach'));
    }
    public function update(User $account,Request $request,Role $role){
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
    public function delete($id, User $account){
            $account->where('id',$id)->delete();
            return response()->json([
                "success"=>"Bạn đã xóa thành công"            
            ]);
    }
    public function tuvan(User $account){
        $order = DB::table('orders')
        ->where('status',1)
        ->where('total_price','=',NULL)
        ->get();
        // dd($order);
        return view('backend.content.khach.tuvan',compact('order'));
    }   
    public function tuvan_add(Request $request, Order $orders){
        $tuvan = new TuVan();
        $input = $request->all();
        $tuvan->donhang = $input['id_tuvan'];
        $tuvan->noidung = $input['manual'];
        $tuvan->khach = $input['khach_tuvan'];
        $tuvan->sanpham = $input['sanpham_tuvan'];
        $tuvan->nguoituvan = $input['nguoi_tuvan'];
        $tuvan->save();
        $order_update = $orders->find($input['id_tuvan']);
        $data=['status'=>6];
        $order_update->update($data);
        return redirect()->route('khach.tuvan');
    }
}
