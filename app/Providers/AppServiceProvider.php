<?php

namespace App\Providers;

use App\Models\blog\Tag;
use App\Models\blog\Post;
use App\Models\All\Language;
use App\Models\blog\Category;
use App\Models\admin\Spchapter;
use App\Models\Usefullinks;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

            //ImageColumn::make('image');

        view()->composer('inc.sidebar', function ($view) {

            $categories = Category::where('is_visible', 1)->take(20)->get();
            $cats = Category::where('is_visible', 1)->get();
            $tags = Tag::take(15)->get();
            $archives = Post::archives();
            $links = Usefullinks::all();
            $recentposts = Post::take(5)->latest()->get();
            $popular = Post::where('is_visible', 1)->take(5)->get();
            return $view->with('categories', $categories)
                        ->with('cats', $cats)
                        ->with('tags', $tags)
                        ->with('archives', $archives)
                        ->with('links', $links)
                        ->with('recentposts', $recentposts)
                        ->with('popular', $popular);
        });

        view()->composer('inc.navbar', function ($view) {
             $post = Post::first();
            return $view->with('post', $post);
        });

        view()->composer('inc.foot', function ($view) {
             $views = DB::table('views')->get();
            return $view->with('views', $views);
        });

        // view()->composer('ft.sp.sidebar', function ($view, $request) {
        //         $languages = Language::where('is_visible', '1')->with('chapters:id,chapter_no')->get();
        //         $selectedBook = ($request->get('language')) ? $request->get('language') : $languages->first()->id;
        //         $chapters = Spchapter::where('is_visible', '1')->get();

        //     return $view->with('languages', $languages)
        //                 ->with('selectedBook', $chapters)
        //                 ->with('chapters', $chapters);
        // });
    }
}
