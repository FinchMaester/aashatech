<?php

namespace App\Http\Controllers;

use App\Models\Mvc;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Client;
use App\Models\Advisor;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use App\Models\Welcome;
use App\Models\Category;
use App\Models\BackImage;
use App\Models\CoverImage;
use App\Models\Sitesetting;
use App\Models\Testimonial;
use App\Models\PhotoGallery;

// use App\Http\Controllers\PostController;
// use App\Http\Controllers\CategoryController;


use Illuminate\Http\Request;
use App\Models\InstagramPost;

class FrontViewController extends Controller
{

    public function index()
    {
        // dd('fav');
        $backimages = PhotoGallery::latest()->get();
        $categories = Category::latest()->get()->take(10);
        $mvcs = Mvc::latest()->get()->take(3);
        $coverimages = CoverImage::latest()->get()->take(5);
        $photogallerys = PhotoGallery::latest()->get()->take(6);
        $messages = Message::take(1)->whereIn('id', [1])->get();
        $mdmessages = Message::take(1)->whereIn('id', [2])->get();
        $posts = Post::with('getCategories')->latest()->get()->take(6);
        $categorieson = Category::with([
            'getPosts' => function ($query) {
                $query->latest()->take(6);
            }
        ])->whereIn('id', [1])->get();
        $categoriesone = Category::with([
            'getPosts' => function ($query) {
                $query->latest()->take(6);
            }
        ])->whereIn('id', [2])->get();

        $projects = Project::latest()->get()->take(6);
        $about = About::first();
        $otherone = Welcome::whereIn('id', [1])->get()->take(1);
        $othertwo = Welcome::whereIn('id', [2])->get()->take(1);
        $services = Service::latest()->get()->take(6);
      
        $sitesetting = Sitesetting::first();
  // Check if the year is a valid numeric value
if ($sitesetting && is_numeric($sitesetting->year)) {
    // Get the established year from the site setting
    $establishedYear = (int) $sitesetting->year;

    // Get the current year
    $currentYear = date('Y');

    // Calculate the number of years passed
    $yearsPassed = $currentYear - $establishedYear;

    // Now $yearsPassed contains the number of years passed since the established year
} else {
    // Handle the case where year is not a valid numeric value
    $yearsPassed = null; // or any default value you prefer
}






        // $teams = Team::first()->get()->take(3);
        $testimonials = Testimonial::latest()->get()->take(15);
        $advisors = Advisor::latest()->get()->take(3);
        $clients = Client::latest()->get()->take(20);
        $teams = Team::get()->take(6);
        $instagramPosts = InstagramPost::latest()->get()->take(4);

        $teamcount = Team::count();
        $projectcount = Project::count();
        // $clientcount = Client::get()->count();
        // $page_title = 'Instagram';
        // $yearcount = Sitesetting::where('')


        // Count Clients
        $clientCount = Client::count();

        // Count Testimonials
        $testimonialCount = Testimonial::count();

        // Combine counts
        $totalCount = $clientCount + $testimonialCount;

        // // Alternatively, you can use union to combine counts in a single query
        // $totalCount = Client::selectRaw('count(*) as count')
        //     ->union(Testimonial::selectRaw('count(*) as count'))
        //     ->sum('count');

        $totalProject = $clientCount+ $testimonialCount + $projectcount;




        return view('index', [
            'backimages' => $backimages,
            'categories' => $categories,
            'categorieson' => $categorieson,
            'categoriesone' => $categoriesone,
            'messages' => $messages,
            'coverimages' => $coverimages,
            'photogallerys' => $photogallerys,
            'posts' => $posts,
            'mdmessages' => $mdmessages,
            'mvcs' => $mvcs,
            // 'category'=>$category,
            'projects' => $projects,
            'about' => $about,
            'services' => $services,
            'sitesetting' => $sitesetting,
            'otherone' => $otherone,
            'othertwo' => $othertwo,
            'testimonials' => $testimonials,
            'advisors' => $advisors,
            'clients' => $clients,
            'teams' => $teams,
            'teamcount' => $teamcount,
            // 'projectcount' => $projectcount,
            // 'clientcount' => $clientcount,
            'totalCount' => $totalCount,
            'instagramPosts' => $instagramPosts,
            'totalProject' => $totalProject,
            'yearsPassed' => $yearsPassed,
        ]);
    }

    public function postByCategory($id)
    {
        $category = Category::where('id', $category_id)->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->get();
            return view('index');
        } else {
            return redirect('/');
        }
        $posts = $category->posts;
        return $posts;
    }

    public function categoryByPost($id)
    {
        $post = Post::find($id);
        $categories = $post->categories;
        return $categories;
    }


}
