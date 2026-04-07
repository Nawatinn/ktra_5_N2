<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController2 extends Controller
{
    public function index()
    {
        $movies = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();

        return view('movie.index', compact('movies'));
    }

    public function Genre($id)
    {
        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id)
            ->orderBy('movie.release_date', 'desc')
            ->select('movie.*')
            ->limit(12)
            ->get();

        return view('movie.index', compact('movies'));
    }

    public function Detail($id)
    {
        $movie = DB::table('movie')
            ->where('id', $id)
            ->first();

        return view('movie.detail', compact('movie'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $movies = DB::select(
            "select * from movie where movie_name_vn like ?",
            ["%".$keyword."%"]
        );

        return view('movie.search', compact('movies', 'keyword'));
    }
}