<div class="mt-8">
        <a href="{{ route('movies.show',$movie['id']) }}">
            <img src="{{ $movie['poster_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a href="{{ route('movies.show',$movie['id']) }}" class="text-lg mt-2 hover:text-gray:300 ">{{ $movie['title'] }}</a>
            <div class="flex items-center text-gray-400 text-sm mt-2">
                {{-- <span><img src="images/images.jpg" width="50" height="50" alt="starts"> </span> --}}
                <span class="ml-1">{{ $movie['vote_average'] }}</span>
                <span class="mx-2">|</span>
                {{-- <span>{{ \Carbon/Carbon::parse($popularMovie['release_date'])->format('M d, y') }}</span> --}}
                <span>{{$movie['release_date'] }}</span>
            </div>
            <div class="text-gray-400 text-sm">{{ $movie['genres']}}</div>  
        </div>
</div>  {{-- end of mt-8  --}}