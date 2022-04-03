<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public $cate_option;
    public function index()
    {
        $category = Category::all();
        return view('backend.content.category.index',compact('category'));
    }
    public function catelevel($id, $text=""){
        $category = Category::all();
        foreach($category as $val){
            if($val['parent_id']==$id){
                $this->cate_option .=  "<option value='".$val['id']."'>".$text.$val['name']."</option>";
                $this->catelevel($val['id'],$text."--");
                }
            }
            return $this->cate_option;
        }
    public function add()
    {
        $level = $this->catelevel(0);
        return view('backend.content.category.insert',compact('level'));
    }
    public function insert(Request $request)
    {
        $category = new Category();
        $input = $request->all();
        $category->name = $input['name'];
        $category->parent_id = $input['parent_id'];
        $category->manual = $input['manual'];
        $category->save();
        return redirect()->route('admin.category');
    }

    
    public function update(Request $request, Category $category)
    {
        $input = $request->all();
        $id = $input['id'];
        $arr = array(
            'name'=>$input['name'],
            'parent_id'=>$input['parent_id'],
            'manual'=>$input['manual'],
        );
        $category->where('id',$id)->update($arr);
        return redirect()->route('admin.category');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $level = $this->catelevel(0);
        return view('backend.content.category.edit', compact('category','level'));
    }

    public function delete($id,Category $category)
    {
        $category->where('id',$id)->delete();
        return response()->json([
            "success"=>"Bạn xóa thành công"
        ]);
    }
}
