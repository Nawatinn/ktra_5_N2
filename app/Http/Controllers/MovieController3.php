<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController3 extends Controller
{
    public function create()
    {
        $genre = DB::table('genre')->get();

        return view('movie.add', [
            'title' => 'Thêm phim',
            'genre' => $genre
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_vn' => 'required',
            'release_date' => 'required|date',
            'description' => 'required',
            'image' => 'required|image'
        ],[
            'name_en.required' => 'Tên tiếng Anh không được để trống',
            'name_vn.required' => 'Tên tiếng Việt không được để trống',
            'release_date.required' => 'Ngày phát hành không được để trống',
            'release_date.date' => 'Sai định dạng yyyy-mm-dd',
            'description.required' => 'Mô tả không được để trống',
            'image.required' => 'Phải chọn ảnh',
            'image.image' => 'File phải là ảnh'
        ]);

        // Tạo ID thủ công
        $maxId = DB::table('movie')->max('id');
        $newId = $maxId ? $maxId + 1 : 1;

        // Upload ảnh
        $fileName = time().'.'.$request->image->extension();
        $request->image->storeAs('images', $fileName, 'public');

        DB::table('movie')->insert([
            'id' => $newId,
            'movie_name' => $request->name_en,
            'movie_name_vn' => $request->name_vn,
            'original_name' => $request->name_en,
            'overview' => $request->description,
            'release_date' => $request->release_date,
            'image' => 'images/'.$fileName
        ]);

        // Insert genre (KHÔNG lỗi trùng)
        DB::table('movie_genre')->insertOrIgnore([
            'id_movie' => $newId,
            'id_genre' => $request->genre_id
        ]);

        return redirect('/movie/list')->with('success','Thêm thành công');
    }
}