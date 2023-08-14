<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhanVienRequest;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NhanVienController extends Controller
{
    //
    public function list(Request $request){
        $perPage = 3;
        $currentPage = $request->query('page',1);
        $nhanviens = NhanVien::query();
        if ($request->isMethod('post') && !empty($request->search)) {
            $nhanviens->where('ten','like','%'.$request->search.'%');
        }
        $nhanviens = $nhanviens->paginate($perPage,['*'],'page',$currentPage);
        return view('nhanvien.list',compact('nhanviens','currentPage'));
    }

    public function add(NhanVienRequest $request){
        if ($request->isMethod('post')) {
            $params = $request->all();
            $params['ten'] = strip_tags($request->input('ten'));
            $nhanvien = NhanVien::create($params);
            if ($nhanvien->id) {
                Session::flash('success','Thêm thành công');
                return redirect()->route('add');
            }
        }
        return view('nhanvien.add');
    }

    public function edit(NhanVienRequest $request,$id){
        $nhanvien = NhanVien::find($id);
        if ($request->isMethod('post')) {
            $params = $request->all();
            $params['ten'] = strip_tags($request->input('ten'));
            $result = $nhanvien->update($params);
            if ($result) {
                Session::flash('success','Sửa thành công');
                return redirect()->route('list');
            }
        }
        return view('nhanvien.edit',compact('nhanvien'));
    }
}
