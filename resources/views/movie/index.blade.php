<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>

    <div class='list-movie'>
        @foreach($movies as $row)
            <div class='movie'>
                <a href="{{ url('/movie/'.$row->id) }}">
                    
                    <img src="{{ asset('storage/'.$row->image) }}" 
                    width="200px" height="250px">

                    <b>{{ $row->movie_name_vn }}</b><br/>

                    <i>{{ date('d-m-Y', strtotime($row->release_date)) }}</i><br>

                </a>

            </div>  
        @endforeach
    </div>

</x-movie-layout>