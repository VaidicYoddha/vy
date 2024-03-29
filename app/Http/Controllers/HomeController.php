<?php

namespace App\Http\Controllers;

use App\Models\blog\Tag;
use App\Models\blog\Post;
use App\Models\All\Author;
use Illuminate\Support\Str;
use App\Models\All\Language;
use Illuminate\Http\Request;
use App\Models\blog\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $languages = Language::where('is_visible', '1')->get();

        $posts = Post::latest()->where('is_visible', '1')
                     ->with('author:id,name')
                    ->filter(request(['month','year']))
                    ->paginate(20);
        $views = DB::table('views')->get();
        //$post = Post::first();

        return view('ft.blog.index', compact('languages','posts','views'));
    }

    public function singlepost(String $post_Slug, $id)
    {
        $languages = Language::where('is_visible', '1')->get();

        $post = Post::where('slug' , $post_Slug)
                    ->where('id', $id)
                    ->with(['user:id,name',
                            'comments.user:id,name',
                            'comments.replies.user:id,name'])
                    ->first();
        $category = Category::all();
        $tags = Tag::all()->pluck('name','id');

        $expiresAt = now()->addHours(1);

        views($post)
            ->cooldown($expiresAt)
            ->record();
        //return view('ft.blog.single', compact('languages', 'post','category','tags'));

        $next_id = Post::where('id','>', $post->id)->min('id');
        $prev_id = Post::where('id','<', $post->id)->max('id');

        return view('ft.blog.single', compact('languages', 'post','category','tags'))
                                    ->with('next_id', Post::find($next_id))
                                    ->with('prev_id', Post::find($prev_id));
    }

    public function langpost(String $slug)
    {
        $languages = Language::where('is_visible', '1')->get();
        $language = Language::where('slug' , $slug)->first();

        $post = $language->posts()->where('is_visible', '1')->paginate(10);

        return view('ft.blog.langpost', compact('languages','language',  'post'));
    }

    public function categorypost(String $slug)
    {
        $category = Category::where('is_visible', '1')
                    ->where('slug' , $slug)->first();

        $post = $category->posts()->where('is_visible', '1')->paginate(10);

        return view('ft.blog.catpost', compact('category', 'post'));
    }

    public function tagpost(String $slug)
    {
        $tag = Tag::where('slug', $slug)->first();

        $post = $tag->posts()->paginate(10);

        return view('ft.blog.tagpost', compact('tag', 'post'));
    }

    public function authorprofile($id)
    {
        $author = Author::where('id', $id)->first();

        $post = $author->posts()->where('is_visible', '1')->paginate(10);

        return view('ft.blog.author', compact('author', 'post'));
    }

    public function authorslist()
    {
        $authors = Author::where('is_visible', '1')->paginate(25);

        return view('ft.blog.authorlist', compact('authors'));
    }

      public function search(Request $request)
    {
        $this->validate($request, ['search' => 'required|max:255']);
        $search = $request->search;
        $posts = Post::where('title', 'like', '%' .$search. '%' )
                      ->orwhere('content', 'like', '%' .$search. '%' )
                      ->orwhere('slug', 'like', '%' .$search. '%' )
                      ->orwhere('ref', 'like', '%' .$search. '%' )
                      ->orwhere('created_by', 'like', '%' .$search. '%' )
                      ->orderBy('id')->paginate(10)
                      ->map(function ($row) use ($search) {
                        //$row->title = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->title);
                        $row->content = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->content);
                        $row->ref = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->ref);
                        $row->created_by = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->created_by);
                          return $row;
                             });

        //$posts->appends(['search' => $search]);

        return view('ft.blog.searchpost', compact('posts','search'));
    }

        public function postlist()
    {
        $posts = Post::where('is_visible', '1')->paginate(100);

        return view('ft.blog.sitemap', compact('posts'));
    }

    // public static function createSlug($title, $model, $id = 0)
    // {
    //     // Normalize the title
    //     $slug = Str::slug($title);
    //     // Get any that could possibly be related.
    //     // This cuts the queries down by doing it once.
    //     $allSlugs = self::getRelatedSlugs($slug, $model, $id);
    //     // If we haven't used it before then we are all good.
    //     if (!$allSlugs->contains('slug', $slug)) {
    //         return $slug;
    //     }
    //     // Just append numbers like a savage until we find not used.
    //     for ($i = 1; $i <= 50; $i++) {
    //         $sufix = \substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 4);
    //         $newSlug = $slug . '-' . $sufix;
    //         if (!$allSlugs->contains('slug', $newSlug)) {
    //             return $newSlug;
    //         }
    //     }
    //     throw new \Exception('Can not create a unique slug');
    // }

    // public static function makeHindiSlug($string, $separator = '-')
    // {
    //     if (is_null($string)) {
    //         return "";
    //     }

    //     // Remove spaces from the beginning and from the end of the string
    //     $string = trim($string);

    //     // Remove multiple dashes or whitespaces
    //     $string = preg_replace("/[\s-]+/", " ", $string);

    //     // Convert whitespaces and underscore to the given separator
    //     $string = preg_replace("/[\s_]/", $separator, $string);

    //     return $string;
    // }



    // protected static function getRelatedSlugs($slug, $model, $id = 0)
    // {
    //     return $model::select('slug')->where('slug', 'like', $slug . '%')
    //         ->where('id', '<>', $id)
    //         ->get();
    // }

}
