<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        // $tasks = Task::orderBy('created_at', 'desc')->get();
        // return view('index', compact('tasks'));

        // $blogs = Blog::orderBy('created_at', 'desc')->get();
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(4);

        // return view('pages.home.index', compact('blogs'));

        // Recent 3 posts for hero slider
        $recentPosts = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.home.index', compact('blogs', 'recentPosts'));
    }


    // Write 
    public function write()
    {
        return view('pages.writes.write');
    }


    //Store
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'image'      => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'required',
            'category'   => 'required',
        ]);

        // Handle image upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        // Save blog data
        Blog::create([
            'title'       => $request->title,
            'image'       => $imageName,
            'description' => $request->description,
            'category'    => $request->category,
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('blog.index')
            ->with('success', 'Blog Published Successfully!');
    }


    // details page show
    public function show($id)
    {
        // $blog = Blog::findOrFail($id);
        $blog = Blog::with('comments.replies')->findOrFail($id);


        // 👇 Increase views count whenever details page is opened
        $blog->increment('views');

        $trendingBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();

        return view('pages.home.details', compact('blog', 'trendingBlogs'));
    }

    // About page
    public function about()
    {
        return view('pages.about.aboutus');
    }

    // category page
    public function category()
    {
        return view('pages.category.categories');
    }
    // blogs page
    public function blogs()
    {
        // return view('pages.blogs.blogs');
        $blogs = Blog::latest()->paginate(6);

        return view('pages.blogs.blogs', compact('blogs'));
    }


    // contact page
    public function contact()
    {
        return view('pages.contact.contactus');
    }

    // Privacy Policy page
    public function privacyPolicy()
    {
        return view('pages.privacypolicy.prpo');
    }

    // T&C page
    public function tc()
    {
        return view('pages.termscondition.tandc');
    }

    // search
    public function search(Request $request)
    {
        $query = $request->query('query');

        $blogs = Blog::where('title', 'LIKE', "%{$query}%")
            ->orWhere('category', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(6)
            ->appends(['query' => $query]); // keep search term on pagination

        return view('pages.searchresult', compact('blogs'));
    }

    //Category search

    public function catSearch(Request $request)
    {
        $query = $request->query('query');

        $blogs = Blog::where('category', 'LIKE', "%{$query}%")
            ->paginate(6)
            ->appends(['query' => $query]); // keep query on pagination

        return view('pages.searchresult', compact('blogs', 'query'));
    }




    // ------------------------------------------------------------Comments & replies---------------------------------------------------------------------------------------

    public function showComment($id)
    {
        $blog = Blog::with('comments.replies')->findOrFail($id);
        $blog->increment('views');

        return view('pages.home.details', compact('blog'));
    }

    //  ------------------------------------------------------------User role blog Edit /delete ------------------------------------------------------------//

    public function destroy(Blog $blog)
    {

        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }


    //  ------------------------------------------------------------Admin role blog Edit /delete ------------------------------------------------------------//

    public function destroyAdmin(Blog $blog)
    {

        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
}
