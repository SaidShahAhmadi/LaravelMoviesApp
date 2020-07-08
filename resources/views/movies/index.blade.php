@extends('layouts.main')
@section('content')
    <div>
        <div class="container mx-auto px-4 pt-16">
            <div class="popular-movies">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8  ">
                 @foreach ($popularMovies as $movie)
                 {{-- this is laravel component --}}
                    <x-movie-card :movie="$movie"  />
                 @endforeach
                </div>
            </div> {{-- end of popular-movies  --}}

            <div class="now-playing-movies py-24">
                <h2 class="uppercase tracking-wider  text-orange-500 text-lg font-semibold">Now Playing Movies</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">
                    @foreach ($nowPlayingMovies as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres" />
                    @endforeach
                </div>
            </div> {{-- end of now-playing-movies  --}}
        </div>
    </div>
@endsection