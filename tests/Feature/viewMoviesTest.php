<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class viewMoviesTest extends TestCase
{
    
  /** @test   */
    public function the_main_page_shows_correct_info()
    {
      
      Http::fake([
        'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(),
        'https://api.themoviedb.org/3/movie/now_playing' => $this->fakeNowPlayingMovies(),
        'https://api.themoviedb.org/3/movie/list' => $this->fakeGenres(),

      ]);


        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
        $response->assertSee('Fake Movies');


        $response->assertSee('Now playing');
        $response->assertSee('Now playing Fake Movies');


    }


    // public function the_movie_page_shows_the_correct_info(){

    //   Http::fake([
    //     'https://api.themoviedb.org/3/movie/*' => $this->fakeSingleMovies(),
    //   ]);

    //     $response = $this->get(route('movies.show',12345));
    //     $response->assertSee('Fake Jumanji');
    //     $response->assertSee('Jeanne McCarthy');
    //     $response->assertSee('Casting Director');
    //     $response->assertSee('Dwayne Johonson');
    // }

    private function fakePopularMovies(){
     
     return Http::response([
        'results' =>[
          [
            "popularity" => 207.629,
            "vote_count" => 3815,
            "video" => false,
            "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
            "id" => 419704,
            "adult" => false,
            "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
            "original_language" => "en",
            "original_title" => "Fake Movies",
            "genre_ids" => [
               12,
               9648,
                18,
               878,
               53,
            ],
            "title" => "Fake Movies",
            "vote_average" => 6.1,
            "overview" => "This is Fake Movies a time when both hope and hardships drive
            humanity to look to the stars and beyond. While a mysterious phenomenon menaces
             to destroy life on planet Earth, astronaut Roy McBride undertakes a mission across the immensity of space and its many perils to uncover the truth about a lost expedition that decades before boldly faced emptiness and silence in search of the unknown.",
            "release_date" => "2019-09-17",
          ]
        ]
    ],200);

    }

     private function fakeNowPlayingMovies(){
     
      return Http::response([
         'results' =>[
           [
             "popularity" => 207.629,
             "vote_count" => 3815,
             "video" => false,
             "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
             "id" => 419704,
             "adult" => false,
             "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
             "original_language" => "en",
             "original_title" => "Fake Movies",
             "genre_ids" => [
                12,
                9648,
                 18,
                878,
                53,
             ],
             "title" => "Fake Now Playing Movies",
             "vote_average" => 6.1,
             "overview" => "This is Fake Now Playing Movies a time when both hope and hardships drive
             humanity to look to the stars and beyond. While a mysterious phenomenon menaces
              to destroy life on planet Earth, astronaut Roy McBride undertakes a mission across the immensity of space and its many perils to uncover the truth about a lost expedition that decades before boldly faced emptiness and silence in search of the unknown.",
             "release_date" => "2019-09-17",
           ]
         ]
     ],200);
 
     }


     
    public function fakeGenres(){
     
      return Http::response([

      "genres" => [
        [
          "id" => 28,
          "name" => "Action"
        ],
        [
          "id" => 12,
          "name" => "Adventure"
        ],
        [
          "id" => 16,
          "name" => "Animation"
        ],
        [
          "id" => 35,
          "name" => "Comedy"
        ],
        [
          "id" => 80,
          "name" => "Crime"
        ],
        [
          "id" => 99,
          "name" => "Documentary"
        ],
        [
          "id" => 18,
          "name" => "Drama"
        ],
        [
          "id" => 10751,
          "name" => "Family"
        ],
        [
          "id" => 14,
          "name" => "Fantasy"
        ],
        [
          "id" => 36,
          "name" => "History"
        ],
        [
          "id" => 27,
          "name" => "Horror"
        ],
        [
          "id" => 10402,
          "name" => "Music"
        ],
        
      ]
        ],200);
    
     }
}
