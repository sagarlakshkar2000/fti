<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Offer;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()->latest()->paginate(9);
        $title = "Our Blog - Travel Insights & Tips";
        $meta_description = "Explore our latest travel stories, tips, and destination guides.";

        return view('blog', compact('blogs', 'title', 'meta_description'));
    }

    public function show($slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();

        $title = $blog->meta_title ?? $blog->title;
        $meta_description = $blog->meta_description ?? ("Read about " . $blog->title);

        // Fetch latest offers for sidebar
        $latest_offers = Offer::latest()->limit(5)->get();

        return view('blog-detail', compact('blog', 'title', 'meta_description', 'latest_offers'));
    }
}
