<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class hienthi extends Controller
{
    public function getAllData()
    {
        //Raw data
//        $query = "SELECT * FROM baiviet";
//        $results = DB::select($query);
//        return response()->json($results);

        //Query Builder
//        $articles = DB::table('baiviet')
//            ->get();
//
//            echo response()->json($articles);
//

        //Elequont ORM
        //$articles = Article::all();  //lấy all dữ liệu
        //$articles = Article::where('theloai', 'nhactrutinh')->get(); //lấy dữ liệu theo điều kiện

        //liên kết các bảng(raw data + query builder làm tương tư)

//        $articles = Article::join('theloai', 'baiviet.ma_tloai', '=', 'theloai.ma_tloai')
//                    ->join('tacgia', 'baiviet.ma_tgia', 'tacgia.ma_tgia')
//                    ->select('baiviet.ma_bviet', 'baiviet.tieude', 'baiviet.ten_bhat'
//                    , 'tacgia.ten_tgia', 'theloai.ten_tloai', 'baiviet.ngayviet') ->get();

        //liệt kê 2 tác giả có số bài viết nhiều nhất
//        $topAuthors = DB::table('baiviet')
//            ->select('baiviet.ma_tgia', 'tacgia.ten_tgia', DB::raw('COUNT(*) as total'))
//            ->join('tacgia', 'baiviet.ma_tgia', '=', 'tacgia.ma_tgia')
//            ->groupBy('baiviet.ma_tgia', 'tacgia.ten_tgia')
//            ->orderBy('total', 'desc')
//            ->limit(2)
//            ->get();
//
//        foreach ($topAuthors as $author) {
//            echo 'Mã tác giá: '.$author->ma_tgia . ', Tên tác giả: ' . $author->ten_tgia . ' (so lan xuat hien: ' . $author->total . ')';
//            echo "<br>";
//        }

        $searchTerms = ['anh', 'yêu', 'em', 'thương'];
        $songs = DB::table('baiviet')
            ->where(function ($query) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $query->orWhere('ten_bhat', 'LIKE', "%$term%");
                }
            })->get();
        foreach ($songs as $song) {
            echo $song->ten_bhat;
            echo "<br>";

            //echo response()->json($articles);
        }
    }
}
