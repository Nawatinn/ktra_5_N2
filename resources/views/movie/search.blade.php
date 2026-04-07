<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>

    <div class='list-movie'>
        @foreach($movies as $row)
            <div class='movie'>
                <a href="{{ url('/movie/'.$row->id) }}">
                    
                    <img src="{{ $row->image_link }}" 
                        width="200px" height="250px"> <br>
                    
                    <b>{{ $row->movie_name_vn }}</b><br/>

                    <i>{{ date('d-m-Y', strtotime($row->release_date)) }}</i><br>

                </a>
            </div>  
        @endforeach
    </div>

</x-movie-layout>