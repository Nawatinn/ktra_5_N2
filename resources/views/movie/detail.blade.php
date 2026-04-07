<x-movie-layout>
    <x-slot name="title">
        Chi tiết phim
    </x-slot>

    <div class="row">
        
        {{-- Ảnh phim --}}
        <div class="col-4 text-center">
            <img src="{{ $movie->image_link }}" 
                 style="width:250px; height:350px; object-fit:cover; border-radius:10px;">
        </div>

        {{-- Thông tin --}}
        <div class="col-8">
            <h4 style="font-weight:bold">
                {{ $movie->movie_name_vn }}
            </h4>

            <p><b>Ngày phát hành:</b> {{ $movie->release_date }}</p>

            <p><b>Quốc gia:</b> 
                {{ $movie->country_name ?? 'Đang cập nhật' }}
            </p>

            <p><b>Thời gian:</b> 
                {{ $movie->runtime ?? '0' }} phút
            </p>

            <p><b>Doanh thu:</b> 
                {{ $movie->revenue ?? '0' }}
            </p>

            <p><b>Mô tả:</b></p>
            <p style="text-align:justify">
                {{ $movie->overview_vn ?: $movie->overview }}
            </p>

            @if(isset($movie->trailer))
                <a href="{{ $movie->trailer }}" target="_blank" 
                   class="btn btn-success">
                    Xem trailer
                </a>
            @endif
        </div>

    </div>

</x-movie-layout>