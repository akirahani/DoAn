<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $news = News::paginate(2);
        return view('backend.content.news.index',compact('news'));
    }
    public function add(){
        return view('backend.content.news.insert');
    }
    public function insert(Request $request){
        $news = new News();
        $input = $request->all();
        $news->title = $request['title'];
        $news->content =  $request['content'];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $news->image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/image/img_news'), $news->image);
        }
        $news->save();
        return redirect()->route('news.index');
     
    }
    public function upload(Request $request)
    {
   
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move('assets/image/img_news/', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('assets/image/img_news/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html;charset=utf-8');
            echo $re;
        }
    
    }
    public function edit($id){
        $news = News::find($id);
        return view('backend.content.news.edit',compact('news'));
    }  
    public function update(Request $request, News $news){
        $input = $request->all();
        $id =$request['id'];
        $input = $request->all();
        $title = $input['title'];
        $content = $input['content'];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $news->image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/image/img_news'), $news->image);
        }
        $arr = array(
            'title'=>$title,
            'content'=>$content,
            'image'=>$news->image
        );
        
    
        $news->where('id',$id)->update($arr);
        return redirect()->route('news.index');
    }

    public function delete($id,News $news){
        $news->where('id',$id)->delete();    
        return response()->json([
            "success"=>"Bạn đã xóa thành công"
        ]);
    }
}
