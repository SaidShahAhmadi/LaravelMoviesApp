@extends('layouts.main')

@section('content')
    <div class="tv-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                 <img src="{{ $tvshow['poster_path'] }}" alt="" class="w-64 md:w-96">
            </div>
            
            <div class="md:ml-24">
               <h2 class="text-4xl font-semibold">{{ $tvshow['name'] }}</h2>
               <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span><img src="" alt="starts"> </span>
                    <span class="ml-1">{{ $tvshow['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['first_air_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                         {{ $tvshow['genres'] }}
                    </span>
                </div> {{--end of flex items-center  --}} 

                <p class="text-gray-300 mt-8">
                    {{$tvshow['overview']}}
                </p>
                
                <div class="mt-12">
                    
                    <div class="flex mt-4">
                        <div class="flex mt-4">
                            @foreach ($tvshow['created_by'] as $crew)
                                 <div class="mr-8">
                                     <div>{{$crew['name']}}</div>
                                     <div class="text-sm text-gray-400">Creator </div>
                                 </div>                               
                            @endforeach
                        </div>
                    </div> {{--end of flex mt-4 --}}
                </div> {{--end of mt-12  --}}

            <div x-data="{ isOpen: false }">
                @if (count($tvshow['videos']['results'])>0)
                    <div class="mt-12">
                      <button  @click="isOpen = true"
                            class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded 
                            font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150 ">
                        <span class="icon"></span>
                        <span class="ml-1">Play Trailer</span>
                      </button>
                    </div>
                @endif

                <div style="background-color: rgba(0,0,0,.5);" 
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"  
                    x-show.transition.opacity="isOpen">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                            </div>

                            <div class="modal-body px-8 py-8">
                                <div class="responsive-container overflow-hidden relative " style="padding-top:56.25%">
                                    <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" 
                                    src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}" 
                                    style="border:0;" allow="autoplay; encrypted-media" allowfullscreen ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  {{--end of modal background-color  --}}
            </div>
            </div> {{--end of ml-24  --}}
        </div>  {{--end of container mx-auto  --}}
    </div>  {{--end of tv-info  --}}


    <div class="tv-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8  ">

                @foreach ($tvshow['cast'] as $cast)
                        <div class="mt-8">
                            <a href="{{route('actors.show', $cast['id'])}}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $cast['profile_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="{{route('actors.show', $cast['id'])}}" class="text-lg mt-2 hover:text-gray:300 ">{{$cast['name']}}</a>
                                <div class="flex items-center text-gray-400 text-sm ">
                                <span class="ml-1">{{$cast['character']}}</span>
                                </div>
                            </div>
                         </div>  {{-- end of mt-8  --}}
                @endforeach
            </div>
        </div>
    </div> {{-- end of tv-cast --}}

    <div class="tv-image border-b border-gray-800" x-data="{isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-5">
                @foreach ($tvshow['images'] as $image)
                        <div class="mt-8">
                            <a
                            @click.prevent="isOpen = true
                            image='{{ 'https://image.tmdb.org/t/p/original/'. $image['file_path'] }}'
                             "
                            href="#" >
                
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $image['file_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>  {{-- end of mt-8  --}}
                @endforeach
            </div>


            <div style="background-color: rgba(0,0,0,.5);" 
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"  
                    x-show.transition.opacity="isOpen">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button 
                                @click="isOpen = false" 
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;</button>
                            </div>

                            <div class="modal-body px-8 py-8">
                               <img :src="image" alt="poster">
                            </div>
                        </div>
                    </div>
              </div>  {{--end of modal background-color  --}}
        </div>
    </div> {{-- end of tv-image --}}
    
@endsection