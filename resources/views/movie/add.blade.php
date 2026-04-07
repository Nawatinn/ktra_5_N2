<x-movie-layout :title="$title" :genre="$genre">

<h4 class="text-center text-primary">THÊM PHIM</h4>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            <div>{{$err}}</div>
        @endforeach
    </div>
@endif

<form method="post" action="{{url('/them-phim')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Tên tiếng Anh</label>
        <input type="text" name="name_en" class="form-control">
    </div>

    <div class="form-group">
        <label>Tên tiếng Việt</label>
        <input type="text" name="name_vn" class="form-control">
    </div>

    <div class="form-group">
        <label>Ngày phát hành</label>
        <input type="date" name="release_date" class="form-control">
    </div>

    <div class="form-group">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label>Thể loại</label>
        <select name="genre_id" class="form-control">
            @foreach($genre as $g)
                <option value="{{$g->id}}">{{$g->genre_name_vn}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Ảnh đại diện</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary mt-2">Lưu</button>

</form>

</x-movie-layout>