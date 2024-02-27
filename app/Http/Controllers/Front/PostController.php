<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PageBlogItem;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(9);
        $blog_page_item  = PageBlogItem::where('id',1)->first();
        return view('front.blog',compact('posts','blog_page_item'));
    }
    public function detail($slug){
        $post_item = Post::where('slug',$slug)->first();
        $post_item->total_view = $post_item->total_view + 1;
        $post_item->update();
        return view('front.post',compact('post_item'));
    }
}
