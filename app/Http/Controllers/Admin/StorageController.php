<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Import;
use App\Models\Export;
use App\Models\Unit;
use App\Models\Supplier;
use App\Models\ThongKeChi;
use App\Models\Storage;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class StorageController extends Controller
{

    public function index(){
        $hangton = Storage::all();
        return view('backend.content.storage.index',compact('hangton'));
    }


    public function import()
    {
        $import = Import::all();
        return view('backend.content.storage.import.index',compact('import'));
    }

    public function import_add()
    {
        $account = Admin::all();
        $product = Product::all();
        $info = json_encode($product);
        $suppliers = Supplier::all();
        $trademark = DB::table('trademarks')
        ->select('trademarks.*')
        ->get();
        $arr_ten_thuong_hieu = [];
        foreach($trademark as $val){
            $arr_ten_thuong_hieu[$val->id] = $val->name;
        }
        return view('backend.content.storage.import.insert',compact('account','product','info','suppliers','arr_ten_thuong_hieu'));
    }
    public function import_insert(Request $request, Product $products, Storage $store)
    {
        $input = $request->all();
        $arr_sp = [];
        $import = new Import;
        $storage = new Storage;
        $product_price_sell = DB::table('products')->select('price','id')->get(); 
        $tongnhap = 0;
        $arr_gia_sp = [];
        // dd($input['product_id']);
        foreach($input['product_id'] as $key =>$val){
            $arr_sp[$key]['product'] =  $input['product_id'][$key];
            $arr_sp_id[$key]['product'] =  $input['product_id'][$key];
            $arr_sp[$key]['quantity'] = $input['soluong'][$key];
            $arr_sp[$key]['supplier'] = $input['nhacungcap'];
            $arr_sp[$key]['price'] = $input['gianhap'][$key];
            $arr_sp[$key]['unit'] = $input['unit_id'][$key];
            $arr_sp[$key]['created_at'] = date('Y-m-d H:i:s') ;
            $arr_sp[$key]['updated_at'] =date('Y-m-d H:i:s');
            $id = (int) $arr_sp[$key]['product'];

            $arr_sp1[$key]['product'] =  $input['product_id'][$key];
            $arr_sp1[$key]['quantity'] = $input['soluong'][$key];
            $arr_sp1[$key]['supplier'] = $input['nhacungcap'];
            $arr_sp1[$key]['price'] = $input['gianhap'][$key];
            $arr_sp1[$key]['unit'] = $input['unit_id'][$key];
            
        }
        
        $arr_process = [];
        foreach($arr_sp_id as $k_spc => $val_sp_check){
            foreach($val_sp_check as $val_continue){
                array_push($arr_process,$val_continue);
            }
        }
        // tong nhap cuar phieu nhap
        foreach($arr_sp as $val_tien)
        {
            foreach($product_price_sell as $val_gia_ban){
                if($val_gia_ban->id == $val_tien['product'] ){
                    $val_gia_ban->price = $val_tien['price'] * 1.5;
                    $arr_update_giaban =[
                        'price' => $val_gia_ban->price
                    ];
                    $products->where('id',$val_tien['product'])->update($arr_update_giaban);
                }
                
            }
            $tongnhap += $val_tien['quantity'] * $val_tien['price'];
        }
      
        $check_storage = [];
        foreach($arr_process as $key=> $val){
            $count_arr = array_count_values($arr_process);
            foreach($count_arr as $key =>$vals){
                // Neu trung san pham thi khong them
                if($vals > 1){
                   return redirect()->back();
                }else{
                    
                    foreach($input['product_id'] as $key_product =>$val){
                        $check_storage[$key_product] = DB::table('storage')->select('product','quantity')->where('product','=',$val)->first();
                        if(!empty($check_storage[$key_product])){
                            $soluong_capnhap =  $check_storage[$key_product]->quantity +  $arr_sp[$key_product]['quantity'];
                            $arr_update_nhap = [
                                'quantity' => $soluong_capnhap,
                                'price' => $arr_sp1[$key_product]['price']
                            ];
                            $update_data = DB::table('storage')->where('product','=',$check_storage[$key_product]->product)->update($arr_update_nhap);
                        }else{
                            $insert_data =  DB::table('storage')->insert($arr_sp);
                        }
                    }

                    // them san pham vao kho va phieu nhap khi khong bi trung
                    $import->nhacungcap = $input['nhacungcap'];
                    $import->ma = $input['ma'];
                    $import->nguoinhap = $input['nguoinhap'];
                    $import->sanpham = json_encode($arr_sp1);
                    $import->noidung = $input['noidung'];
                    $import->ghichu = $input['ghichu'];
                    $import->tongthu = $tongnhap;
                    $import->conlai = $tongnhap;
                    $import->save();
                    return redirect()->route('admin.storage.import');
                    
                }
            }
        }
        
    }

    public function import_view(Request $request)
    {
        $arr = [];
        $input = $request->all();
        $account = Admin::all();
        $unit = Unit::all();
        $sanpham = json_decode($input['sanpham']);
        $product = DB::table('products')
        ->get();
        $arr_unit = [];
        foreach($unit as $vals){
           $arr_unit[$vals->id] = $vals->name;
        }
        foreach($sanpham as $key=>$val){
            $id = (int)$val->product;
            foreach($product as $k=>$value){
                if($id == $value->id ){
                    $arr[$key] = $value; 
                    $arr[$key]->soluongnhap  = $sanpham[$key]->quantity;
                    $arr[$key]->gianhap  = $sanpham[$key]->price;
                }
  
            }   
        }

        foreach($arr as $val_arr){
            foreach($unit as $vals){
                if($val_arr->unit_id == $vals->id){
                    $val_arr->unit_id = $vals->name;
                }
            }
        }
        
        foreach($account as $val){
            if($input['nguoinhap'] == $val->id){
                $input['nguoinhap'] = $val->name;
            }
        }
        
        return response()->json([
            "sanpham"=> json_encode($arr),
            "ma"=> $input['ma'],
            "nguoinhap"=>$input['nguoinhap'],
            "id"=>$input['id'],
            "thoigian"=>$input['thoigian'],
            "ngay" => date('d',strtotime($input['thoigian'])),
            "thang" => date('m',strtotime($input['thoigian'])),
            "nam" => date('Y',strtotime($input['thoigian'])),
            "ghichu"=>$input['ghichu'],
            "noidung"=>$input['noidung'],
            "thoigian"=> $input['thoigian'],
        ]);   
    }

    public function import_chi(Request $request)
    {
        $input = $request->all();
        $account = Admin::all();
        $unit = Unit::all();
        
        $sanpham_xuli = DB::table('imports')->select('sanpham','conlai')->where('id','=',$input['id'])->first(); 
        $sanpham = json_decode($sanpham_xuli->sanpham);
        $product = DB::table('products')
        ->get();
        foreach($sanpham as $key=>$val){
            $id = (int)$val->product;
            foreach($product as $k=>$value){
                if($id == $value->id ){
                    $arr[$key] = $value; 
                    $arr[$key]->soluongnhap  = $sanpham[$key]->quantity;
                    $arr[$key]->gianhap  = $sanpham[$key]->price;
                }
                foreach($unit as $val){
                    if($value->unit_id == $val->id){
                        $value->unit_id = $val->name;
                    }
                }
            }   
        }
        return response()->json([
            "conlai"=> $sanpham_xuli->conlai,
            "sanpham"=> json_encode($arr),
            "ma"=> $input['ma'],
            "id"=>$input['id'],
            "nhacungcap"=>$input['nhacungcap'],
        ]);   
    }
    public function save_chi(Import $import, Request $request){
        $input = $request->all();
        $thongkechi = new ThongKeChi();
        $thongkechi->nhacungcap = $input['ncc'];
        $thongkechi->tienchi = $input['sotienchi'];
        $thongkechi->ngaychi = date('Y-m-d');
        $thongkechi->phieunhap = $input['phieunhap'];
        $tenphieunhap = DB::table('imports')->select('ma','conlai')->where('id','=',$input['phieunhap'])->first();
        if( $input['tongnhap'] >= $input['sotienchi']){
            $thongkechi->thieu = (int)$tenphieunhap->conlai - (int)$input['sotienchi'];
            $arr['conlai'] = (int)$tenphieunhap->conlai - (int)$input['sotienchi'];
            $capnhat = $import->where('id',$input['phieunhap'])->update($arr);
        }
        else{
            $thongkechi->thua = (int)$input['sotienchi'] - (int)$input['tongnhap'] ;
        }

        $thongkechi->save();
        return response()->json([
            "conlai"=>  (int)$input['tongnhap'] - (int)$input['sotienchi'],
            "ma"=> $tenphieunhap->ma,
            "id"=>$input['phieunhap'],
        ]);   
    }
    // export
    public function export()
    {
        $export = Export::all();
        return view('backend.content.storage.export.index',compact('export'));
    }

    // Vào trang thêm phiếu xuất
    public function export_add()
    {
        $account = Admin::all();
        $product = Product::all();
        $info = json_encode($product);
        return view('backend.content.storage.export.insert',compact('account','product','info'));
    }
    // Thêm phiếu xuất
    public function export_insert(Request $request, Product $products,Storage $storages)
    {
        $input = $request->all();
        $arr_sp = [];
        $export = new Export;
        $product = DB::table('products')
        ->select('quantity','id')
        ->get();
        $storage = DB::table('storage')
        ->select('product','quantity')
        ->get();
        // dd($input);
        foreach($input['product_id'] as $key =>$val){
            
            $arr_sp[$key]['product_id'] =  $input['product_id'][$key];
            $arr_sp[$key]['soluong'] = $input['soluong'][$key];
            $soluong =    (int) $arr_sp[$key]['soluong'];
            $id = (int) $arr_sp[$key]['product_id'];   
  
            foreach($product as $keyproduct => $val_product){
                if($val_product->id == $id ){
                    $val_product->quantity +=  $soluong;
                    $products->where('id',$id)->update(['quantity'=>$val_product->quantity]);
                }
            }
        }
        foreach($arr_sp as $key=> $val){
            foreach($storage as $keys=>$value){
                if($value->product == $val['product_id'] ){
                    $value->quantity -=   $val['soluong'];
                    $storages->where('product',$val['product_id'])->update(['quantity'=>$value->quantity]);
                    if($value->quantity < 0){
                        return redirect()->route('admin.storage.export.add');
                    }
                    else{
                        
                    }
                    
                }
            }
        }
        $export->ma = $input['ma'];
        $export->nguoixuat = $input['nguoixuat'];
        $export->sanpham = json_encode($arr_sp);
        $export->noidung = $input['noidung'];
        $export->ghichu = $input['ghichu'];
        $export->save();
        return redirect()->route('admin.storage.export');
    }
    //Xem phiếu xuất
    public function export_view(Request $request)
    {
        $input = $request->all();
        $account = Admin::all();
        $unit = Unit::all();
        $sanpham = json_decode($input['sanpham']);
        $product = DB::table('products')
        ->get();
        foreach($sanpham as $key=>$val){
            $id = (int)$val->product_id;
            foreach($product as $k=>$value){
                if($id == $value->id ){
                    $arr[$key] = $value; 
                    $arr[$key]->soluongxuat = $sanpham[$key]->soluong;
                }
                foreach($unit as $val){
                    if($value->unit_id == $val->id){
                        $value->unit_id = $val->name;
                    }
                }
            }   
        }
        foreach($account as $val){
            if($input['nguoixuat'] == $val->id){
               $nguoixuat = $val->name;
         
            }
        }
        return response()->json([
            "sanpham"=> json_encode($arr),
            "ma"=> $input['ma'],
            "nguoixuat"=>$nguoixuat,
            "id"=>$input['id'],
            "ngay" => date('d',strtotime($input['thoigian'])),
            "thang" => date('m',strtotime($input['thoigian'])),
            "nam" => date('Y',strtotime($input['thoigian'])),
            "thoigian"=>$input['thoigian'],
            "ghichu"=>$input['ghichu'],
            "noidung"=>$input['noidung'],
        ]);   
    }
    //Hiển thị danh sách sản phẩm sau khi chọn nhà cung cấp
    public function load_product(Request $request){
        $input = $request->all();
        $hang = $input['hang'];
        $sanpham = DB::table('products')->where('trademark_id','=',$hang)->get();
        $donvi = DB::table('units')->select('name','ma','id')->get();
        $thongtin = '';
        if($sanpham->isNotEmpty()){
            $thongtin .= '<div class="item-import" style="display:flex; justify-content: space-around">';
            $thongtin .= '<div class="tensp">';
            $thongtin .= '<p>Tên sản phẩm</p>';
                $thongtin .= '<select id= "inputState1" class ="form-select" name="product_id[]">';
                    foreach($sanpham as $val){
                        $thongtin .= '<option  value="'.$val->id.'" price="'.$val->price.'" > '.$val->name.'</option>';
                    }
                    $thongtin .= '</select>';
            $thongtin .= '</div>';
            $thongtin .= '<div class="soluong">';
                $thongtin .= '<p>Số lượng</p>';
                $thongtin .= '<input type="number" class="form-control" name="soluong[]" required>';
            $thongtin .= '</div>';
            $thongtin .= '<div class="donvi">';
                $thongtin .= '<p>Đơn vị tính</p>';
                $thongtin .= '<select id= "inputUnits" class ="form-select" name="unit_id[]">';
                foreach($donvi as $val_dv){
                    $thongtin .= '<option  value="'.$val_dv->id.'" ma="'.$val_dv->ma.'" > '.$val_dv->name.'</option>';
                }
                $thongtin .= '</select>';
            $thongtin .= '</div>';
            $thongtin .= '<div class="dongia">';
                $thongtin .= '<p>Giá nhập</p>';
                    $thongtin .= '<input type="text"  class="form-control" value="" class="gianhap"  name="gianhap[]" >';
            $thongtin .= '</div>';  
            $thongtin .= '</div>';
            echo json_encode([
                'status' => 'success',
                'thongtin'=>$thongtin
            ]);
        }else{
            $thongtin .= '';
            echo json_encode([
                'status' => 'failed',
                'thongtin'=>$thongtin
            ]);
        }
       
    }
    //Hiển thị danh sách phiếu chi
    public function phieu_chi(){
        $phieu_chi = DB::table('thongkechi')->get();
        return view('backend.content.storage.import.phieuchi',compact('phieu_chi'));
    }
    // Xem phiếu chi
    public function pchi_view(Request $request){
        $arr = [];
        $input = $request->all();
        $account = Admin::all();
        $unit = Unit::all();
        $sanpham = json_decode($input['sanpham']);
        $product = DB::table('products')
        ->get();

        foreach($sanpham as $key=>$val){
            $id = (int)$val->product;
            foreach($product as $k=>$value){
                if($id == $value->id ){
                    $arr[$key] = $value; 
                    $arr[$key]->soluongnhap  = $sanpham[$key]->quantity;
                    $arr[$key]->gianhap  = $sanpham[$key]->price;
                }
                foreach($unit as $val){
                    if($sanpham[$key]->unit == $val->id){
                        $value->unit = $val->name;
                    }
                }
            }   
        }

        $phieuchi = $input['phieuchi'];
        $nha_cung_cap = $input['nhacungcap'];
        $phieu_nhap = $input['phieunhap'];
        $con_thieu = $input['conthieu'];
        $thoigian = $input['thoigian'];
        $id_chi = $input['id'];
        $tienchi = $input['dachi'];

        return response()->json([
            "sanpham"=> json_encode($arr),
            "ma"=> $phieuchi,
            "nhacungcap"=>$nha_cung_cap,
            "phieunhap"=>$phieu_nhap,
            "thieu"=>$con_thieu,
            "idchi"=>$id_chi,
            "thoigian"=>$thoigian,
            "ngay"=> date('d',strtotime($thoigian)),
            "thang"=> date('m',strtotime($thoigian)),
            "nam"=> date('Y',strtotime($thoigian)),
            "dachi"=> $tienchi
        ]);   
    }

    public function hangton(Request $request){

            $spreadsheet = new Spreadsheet();
            
            $sheet = $spreadsheet->getActiveSheet();
            $writer = new Xlsx($spreadsheet);
            $title_baocao = 'BÁO CÁO TỔNG HỢP TỒN KHO';
            $spreadsheet->getActiveSheet()->mergeCells('E3:M4');
            $spreadsheet->getActiveSheet()
            ->getCell('A3')
            ->setValue($title_baocao);
            foreach(range('A', 'M') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }
            // set the names of header cells
                $sheet->setCellValue('C1', 'Đơn vị.......');
                $sheet->setCellValue('C2', 'Địa chỉ........');
                $sheet->setCellValue('D2', 'Đơn vị.......');
                $sheet->setCellValue('C2', 'Địa chỉ........');
                $x = 4;
                // if($month_in == $month ){
                    $sheet->setCellValue('A'.$x, 1);
                    $sheet->setCellValue('B'.$x,2 );
                    $sheet->setCellValue('C'.$x, 3);
                    $sheet->setCellValue('D'.$x,4);
                    $sheet->setCellValue('E'.$x, 5);
                        // $day_out_final = date_format($date_out,"d-m-Y");
                        // $sheet->setCellValue('F'.$x, $day_out_final);
                    // 	$sheet->setCellValue('F'.$x, '');
                    // }
            //     }
            //   $x++;
            // }
            $filename = 'BaoCaoTon';
            ob_end_clean();
            header("Content-Type: application/ms-excel");
            header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output'); 
            $writer->save('BaoCaoTonKho.xlsx');
            return Excel::download(new ExportUser, 'users.xlsx');
                    
    }

   
}
