<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    // Trang danh sách sản phẩm
    public function index() {
        echo 'Danh sách sản phẩm';
        // SELECT * FROM `sanpham`;
        // $listsp = DB::table('sanpham')->select('id', 'name', 'price','iddm')->get();
        $listsp = DB::table('sanpham')
        ->join('danhmuc', 'sanpham.iddm', '=', 'danhmuc.id')
        ->select('sanpham.*', 'danhmuc.name as name_danhmuc')->get();
        // echo "<pre>";
        // print_r($listsp);
        $top3 = DB::table('sanpham')->orderBy('luotxem', 'DESC')->limit(3)->get();
        return view('sanpham.list', compact('listsp', 'top3'));
    }

    public function detail($id) {
        echo 'Chi tiết sản phẩm ' . $id;
        // first(): để lấy bản ghi đầu tiên
        $data = DB::table('sanpham')->where('id', '=', $id)->first();
        if (!$data) {
            echo 'Không tìm thấy bản ghi';
        } else {
            return view('sanpham.detail', compact('data'));
        }
    }
    public function delete($id) {
        $data = DB::table('sanpham')->where('id', '=', $id)->delete();
        if ($data) {
            // nếu xóa đc quay về trang danh sách
            return redirect()->route('san-pham.index');
        } else {
            echo 'Có lỗi xảy ra trong quá trình xóa';
        }
    }
}
