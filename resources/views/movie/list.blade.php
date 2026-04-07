<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách phim</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
        body {
            background: #f4f6f9;
        }

        .card-custom {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        table img {
            border-radius: 6px;
        }

        table td {
            vertical-align: middle;
        }

        h3 {
            font-weight: bold;
        }

        .btn-sm {
            padding: 4px 10px;
        }

        #movie-table {
            border-collapse: collapse !important;
            width: 100%;
        }

        #movie-table thead th {
            background-color: transparent;
            color: black;
            border: 1px solid #ccc;
            font-weight: bold;
            height: 50px;
        }

        #movie-table td {
            border: 1px solid #ccc;
        }

        #movie-table tbody tr:nth-child(odd) {
            background-color: #ffffff !important;
        }

        #movie-table tbody tr:nth-child(even) {
            background-color: #f2f2f2 !important;
        }

        #movie-table tbody tr:hover {
            background-color: #d0ebff;
        }
        
        #movie-table th:nth-child(1),
        #movie-table td:nth-child(1) {
            width: 80px;
        }

        #movie-table th:nth-child(2),
        #movie-table td:nth-child(2) {
            width: 200px;
        }

        #movie-table th:nth-child(3),
        #movie-table td:nth-child(3) {
            width: 250px;
            text-align: left;
        }

        #movie-table th:nth-child(4),
        #movie-table td:nth-child(4) {
            width: 180px;
        }

        #movie-table th:nth-child(5),
        #movie-table td:nth-child(5) {
            width: 70px;
        }

        #movie-table th:nth-child(6),
        #movie-table td:nth-child(6) {
            width: 140px;
            white-space: nowrap;
        }

        #movie-table td:nth-child(3) {
            white-space: normal;
            line-height: 1.4;
        }
    </style>
</head>

<body>

<div class="container mt-4">

    <div class="card-custom">
        <div class="position-relative mb-4">
            <a href="{{route('moviecreate')}}" class="btn btn-success position-absolute start-0">
                + Thêm
            </a>
            <h3 class="text-center m-0">DANH SÁCH PHIM</h3>
        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <table id="movie-table" class="table display">
            <thead class="table-light">
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th>
                    <th>Ngày phát hành</th>
                    <th>Điểm đánh giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>
                        <img src="{{$row->image_link}}" width="60">
                    </td>

                    <td>{{$row->movie_name_vn}}</td>

                    <td>
                        {{ !empty($row->tagline_vn) ? $row->tagline_vn : $row->tagline }}
                    </td>

                    <td>{{$row->release_date}}</td>

                    <td>
                            {{$row->vote_average}}
                    </td>

                    <td>
                        <a href="{{route('moviedetail',$row->id)}}" class="btn btn-primary btn-sm">
                            Xem
                        </a>

                        <form method="POST" action="{{route('moviedelete')}}" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc muốn xóa?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTable -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#movie-table').DataTable({
        responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        bStateSave: true,
    });
});
</script>

</body>
</html>
</x-movie-layout>