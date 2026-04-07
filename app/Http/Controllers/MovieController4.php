<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController4 extends Controller
{
    //
    public function index(){
        return view("movie.index");
    }

    // Danh sách phim
    public function movielist(){
    $data = DB::table('movie')
                ->where('status',1)
                ->get();

    return view('movie.list', compact('data'));
}

    // Chi tiết phim
    public function moviedetail($id){
        $movie = DB::table('movie')->where('id',$id)->first();
        return view('movie.detail', compact('movie'));
    }

    // Xóa mềm
   public function moviedelete(Request $request){
    DB::table('movie')
        ->where('id',$request->id)
        ->update(['status'=>0]);

    return redirect()->route('movielist')->with('status','Xóa thành công');
}




}

