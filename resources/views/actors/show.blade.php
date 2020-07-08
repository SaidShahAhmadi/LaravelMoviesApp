@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                 <img src="{{ $actor['profile_path'] }}" alt="actor profile_path" class="w-64 ">

                 {{-- social --}}
                 {{-- <ul class="flex items-center mt-4">
                     <li>
                         <a href="#">
                             
                         </a>
                     </li>
                 </ul> --}}
            </div>
            
            <div class="md:ml-24">
               <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
               <div class="flex flex-wrap items-center text-gray-400 text-sm">
                        {{-- <svg  class="fill-current text-gray-400 hover:text-white w-4" 
                         viewBox="0 0 948 912" xmlns="http://www.w3.org/2000/svg"><path d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107"/></svg>  --}}
                     <span>
                         {{ $actor['birthday'] }} ({{$actor['age'] }} years old) in {{$actor['place_of_birth'] }}
                    </span>
                </div> {{--end of flex items-center  --}} 

                <p class="text-gray-300 mt-8">
                    {{$actor['biography'] }} 
                </p>

                <h4 class="font-semibold mt-12">Known For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{ $movie['linkToPage']}}">
                                <img src="{{$movie['poster_path'] }}"
                                alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <a href="{{ $movie['linkToPage']}}" class="text-sm leading-normal block 
                            text-gray-400 hover:text-white mt-1">{{$movie['title']}}</a>
                       </div>
                    @endforeach
                    
                </div>
            </div> {{--end of ml-24  --}}
        </div>  {{--end of container mx-auto  --}}
    </div>  {{--end of movie-info  --}}


    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($credits as $credit)
                   <li>{{$credit['release_year']}} &middot; <strong>{{$credit['release_date']}} </strong> as {{$credit['character']}} </li>
                @endforeach
            </ul>
        </div>
    </div> {{-- end of -credits --}}
     
@endsection