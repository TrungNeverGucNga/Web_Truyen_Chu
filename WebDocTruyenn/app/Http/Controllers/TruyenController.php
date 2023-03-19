<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\TheloaiTruyen;
use App\Models\ThuocDanh;
use App\Models\ThuocLoai;
use App\Models\Chapter;
use Storage;
class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen=truyen::with('danhmuctruyen','theloaitruyen')->orderBy('id','DESC')->get();
        return view('admincp.truyen/index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')-> get();
        return view('admincp.truyen/create')->with(compact('danhmuc','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'slug_truyen' => 'required|unique:truyen|max:255',
                'tacgia' => 'required|max:255',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
            ],
            [
                'tentruyen.unique' => 'Tên truyện đã có xin điền tên khác',
                'tentruyen.required' => 'Tên truyện không được để trống',
                'tacgia.required' => 'Tác giả không được để trống',
                'slug_truyen.unique' => 'Slug truyện đã có xin điền slug khác',
                'slug_truyen.required' => 'Slug truyện không được để trống',
                'tomtat.required' => 'Tóm tắt truyện không được để trống',
                'hinhanh.required' => 'Hình ảnh truyện phải có',
            ]
            );
            $data = $request->all();
            
            $truyen = new Truyen();
            $truyen->tentruyen = $data['tentruyen'];
            $truyen->tacgia = $data['tacgia'];
            $truyen->slug_truyen = $data['slug_truyen'];
            $truyen->tomtat = $data['tomtat'];
            $truyen->kichhoat = $data['kichhoat'];
            
            foreach($data['danhmuc'] as $key => $muc){
                $truyen->danhmuc_id = $muc[0];
            }
            
            foreach($data['theloai'] as $key => $loai){
                $truyen->theloai_id = $loai[0];
            }
             //them anh vao folder
            $get_image =$request->hinhanh;
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $data['product_image'] = $new_image;
            $get_image->move($path,$new_image);
            $truyen->hinhanh = $new_image;
            $truyen->save();
            $truyen->thuocnhieudanhmuctruyen()->attach($data['danhmuc']);
            $truyen->thuocnhieutheloaitruyen()->attach($data['theloai']);
            return redirect()->back()->with('status','Thêm truyện thành công'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truyen=truyen::find($id);
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderby('id','DESC')-> get();
        return view('admincp.truyen/edit')->with(compact('truyen','danhmuc','theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'tentruyen' => 'required|max:255',
                'tacgia' => 'required|max:255',
                'slug_truyen' => 'required|max:255',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
                
            ],
            [
                'tentruyen.unique' => 'Tên truyện đã có xin điền tên khác',
                'tentruyen.required' => 'Tên truyện không được để trống',
                'tacgia.required' => 'Tác giả không được để trống',
                'slug_truyen.required' => 'Slug truyện không được để trống',
                'tomtat.required' => 'Tóm tắt truyện không được để trống',
                
            ]
            );
            $data = $request->all();
            $truyen = Truyen::find($id);
            $truyen->tentruyen = $data['tentruyen'];
            $truyen->tacgia = $data['tacgia'];
            $truyen->slug_truyen = $data['slug_truyen'];
            $truyen->tomtat = $data['tomtat'];
            $truyen->kichhoat = $data['kichhoat'];
            $truyen->danhmuc_id = $data['danhmuc'];
            $truyen->theloai_id = $data['theloai'];
            //them anh vao folder
            $get_image =$request->hinhanh;
            if($get_image){
                $path = 'public/uploads/truyen/'.$truyen->hinhanh;
            if(file_exists($path)){
            unlink($path);
            }
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $data['product_image'] = $new_image;
            $get_image->move($path,$new_image);
            $truyen->hinhanh = $new_image;
            }
            $truyen->save();
            return redirect()->back()->with('status','Cập nhật truyện thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = truyen::find($id);
        $path = 'public/uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }
        truyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa truyện thành công'); 
    }
}
