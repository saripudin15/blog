<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Posts $posts)
    {
        $widget_category = Category::all();
        $data = $posts->latest()->take(4)->get();
        return view('blog',compact('data','widget_category'));
    }

    public function isi_blog($slug) 
    {
        $widget_category = Category::all();
        $data = Posts::where('slug',$slug)->get();
        return view('blog.isi_post', compact('data','widget_category'));
    }

    public function list_blog() {
        $widget_category = Category::all();
        $data = Posts::latest()->paginate(6);
        return view('blog.list_post', compact('data','widget_category'));
    }

    public function list_category(category $category)
    {
        $widget_category = Category::all();

        $data = $category->posts()->paginate(6);
        return view('blog.list_post', compact('data','widget_category'));
    }

    public function cari(Request $request)
    {
        $widget_category = Category::all();

        $data =Posts::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->paginate(6);
        return view('blog.list_post', compact('data','widget_category'));
    }
}
