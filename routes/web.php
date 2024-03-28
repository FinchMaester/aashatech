<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\LegaldocsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\InstagramPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\Admin\BackImageController;
use App\Http\Controllers\Admin\CoverImageController;
use App\Http\Controllers\Admin\SitesettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PhotoGalleryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontViewController::class, 'index'])->name('index');
Route::get('/index', [App\Http\Controllers\FrontViewController::class, 'index'])->name('index');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

// For Sitesetting
Route::get('admin/sitesetting', [App\Http\Controllers\SitesettingController::class, 'index'])->name('Sitesetting.index');
Route::get('admin/sitesetting/index', [App\Http\Controllers\SitesettingController::class, 'index'])->name('Sitesetting.index');

Route::get('admin/sitesetting/create', [App\Http\Controllers\SitesettingController::class, 'create'])->name('Sitesetting.create');
Route::post('admin/sitesetting/store', [App\Http\Controllers\SitesettingController::class, 'store'])->name('Sitesetting.store');

Route::get('admin/sitesetting/edit/{id}', [App\Http\Controllers\SitesettingController::class, 'edit'])->name('Sitesetting.edit');
Route::post('admin/sitesetting/update', [App\Http\Controllers\SitesettingController::class, 'update'])->name('Sitesetting.update');
Route::get('admin/sitesetting/delete/{id}', [App\Http\Controllers\SitesettingController::class, 'destroy'])->name('Sitesetting.destroy');


// For Cover Image

Route::get('admin/coverimage', [App\Http\Controllers\CoverImageController::class, 'index'])->name('Coverimage.index');
Route::get('admin/coverimage/index', [App\Http\Controllers\CoverImageController::class, 'index'])->name('Coverimage.index');

Route::get('admin/coverimage/create', [App\Http\Controllers\CoverImageController::class, 'create'])->name('Coverimage.create');
Route::post('admin/coverimage/store', [App\Http\Controllers\CoverImageController::class, 'store'])->name('Coverimage.store');

Route::get('admin/coverimage/edit/{id}', [App\Http\Controllers\CoverImageController::class, 'edit'])->name('Coverimage.edit');
Route::post('admin/coverimage/update', [App\Http\Controllers\CoverImageController::class, 'update'])->name('Coverimage.update');
Route::get('admin/coverimage/delete/{id}', [App\Http\Controllers\CoverImageController::class, 'destroy'])->name('Coverimage.destroy');


// For Back Image

Route::get('admin/backimage', [App\Http\Controllers\BackImageController::class, 'index'])->name('Backimage.index');
Route::get('admin/backimage/index', [App\Http\Controllers\BackImageController::class, 'index'])->name('Backimage.index');

Route::get('admin/backimage/create', [App\Http\Controllers\BackImageController::class, 'create'])->name('Backimage.create');
Route::post('admin/backimage/store', [App\Http\Controllers\BackImageController::class, 'store'])->name('Backimage.store');

Route::get('admin/backimage/edit/{id}', [App\Http\Controllers\BackImageController::class, 'edit'])->name('Backimage.edit');
Route::post('admin/backimage/update', [App\Http\Controllers\BackImageController::class, 'update'])->name('Backimage.update');
Route::get('admin/backimage/delete/{id}', [App\Http\Controllers\BackImageController::class, 'destroy'])->name('Backimage.destroy');



// FOr Categories

Route::get('admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('Category.index');
Route::get('admin/category/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('Category.index');

Route::get('admin/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('Category.create');
Route::post('admin/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('Category.store');

Route::get('admin/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('Category.edit');
Route::post('admin/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('Category.update');
Route::get('admin/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('Category.destroy');


// FOr Post

Route::get('admin/post', [App\Http\Controllers\PostController::class, 'index'])->name('Post.index');
Route::get('admin/post/index', [App\Http\Controllers\PostController::class, 'index'])->name('Post.index');

Route::get('admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('Post.create');
Route::post('admin/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('Post.store');

Route::get('admin/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('Post.edit');
Route::post('admin/post/update', [App\Http\Controllers\PostController::class, 'update'])->name('Post.update');
Route::get('admin/post/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('Post.destroy');

// FOr ABout

Route::get('admin/about', [App\Http\Controllers\AboutController::class, 'index'])->name('About.index');
Route::get('admin/about/index', [App\Http\Controllers\AboutController::class, 'index'])->name('About.index');

Route::get('admin/about/create', [App\Http\Controllers\AboutController::class, 'create'])->name('About.create');
Route::post('admin/about/store', [App\Http\Controllers\AboutController::class, 'store'])->name('About.store');
Route::post('admin/about/store', [App\Http\Controllers\AboutController::class, 'store'])->name('About.store');

Route::get('admin/about/edit/{id}', [App\Http\Controllers\AboutController::class, 'edit'])->name('About.edit');
Route::post('admin/about/update', [App\Http\Controllers\AboutController::class, 'update'])->name('About.update');
Route::get('admin/about/delete/{id}', [App\Http\Controllers\AboutController::class, 'destroy'])->name('About.destroy');

// FOr ABout

Route::get('admin/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('Welcome.index');
Route::get('admin/welcome/index', [App\Http\Controllers\WelcomeController::class, 'index'])->name('Welcome.index');

Route::get('admin/welcome/create', [App\Http\Controllers\WelcomeController::class, 'create'])->name('Welcome.create');
Route::post('admin/welcome/store', [App\Http\Controllers\WelcomeController::class, 'store'])->name('Welcome.store');
Route::post('admin/welcome/store', [App\Http\Controllers\WelcomeController::class, 'store'])->name('Welcome.store');

Route::get('admin/welcome/edit/{id}', [App\Http\Controllers\WelcomeController::class, 'edit'])->name('Welcome.edit');
Route::post('admin/welcome/update', [App\Http\Controllers\WelcomeController::class, 'update'])->name('Welcome.update');
Route::get('admin/welcome/delete/{id}', [App\Http\Controllers\WelcomeController::class, 'destroy'])->name('Welcome.destroy');


// For Team Members

Route::get('admin/team', [App\Http\Controllers\TeamController::class, 'index'])->name('Team.index');
Route::get('admin/team/index', [App\Http\Controllers\TeamController::class, 'index'])->name('Team.index');

Route::get('admin/team/create', [App\Http\Controllers\TeamController::class, 'create'])->name('Team.create');
Route::post('admin/team/store', [App\Http\Controllers\TeamController::class, 'store'])->name('Team.store');

Route::get('admin/team/edit/{id}', [App\Http\Controllers\TeamController::class, 'edit'])->name('Team.edit');
Route::post('admin/team/update/{id}', [App\Http\Controllers\TeamController::class, 'update'])->name('Team.update');
Route::get('admin/team/delete/{id}', [App\Http\Controllers\TeamController::class, 'destroy'])->name('Team.destroy');


// For Advisors

Route::get('admin/advisor', [App\Http\Controllers\AdvisorController::class, 'index'])->name('Advisor.index');
Route::get('admin/advisor/index', [App\Http\Controllers\AdvisorController::class, 'index'])->name('Advisor.index');

Route::get('admin/advisor/create', [App\Http\Controllers\AdvisorController::class, 'create'])->name('Advisor.create');
Route::post('admin/advisor/store', [App\Http\Controllers\AdvisorController::class, 'store'])->name('Advisor.store');

Route::get('admin/advisor/edit/{id}', [App\Http\Controllers\AdvisorController::class, 'edit'])->name('Advisor.edit');
Route::post('admin/advisor/update', [App\Http\Controllers\AdvisorController::class, 'update'])->name('Advisor.update');
Route::get('admin/advisor/delete/{id}', [App\Http\Controllers\AdvisorController::class, 'destroy'])->name('Advisor.destroy');

// For Message from Chairman
Route::get('admin/message', [App\Http\Controllers\MessageController::class, 'index'])->name('Message.index');
Route::get('admin/message/index', [App\Http\Controllers\MessageController::class, 'index'])->name('Message.index');

Route::get('admin/message/create', [App\Http\Controllers\MessageController::class, 'create'])->name('Message.create');
Route::post('admin/message/store', [App\Http\Controllers\MessageController::class, 'store'])->name('Message.store');

Route::get('admin/message/edit/{id}', [App\Http\Controllers\MessageController::class, 'edit'])->name('Message.edit');
Route::post('admin/message/update', [App\Http\Controllers\MessageController::class, 'update'])->name('Message.update');
Route::get('admin/message/delete/{id}', [App\Http\Controllers\MessageController::class, 'destroy'])->name('Message.destroy');

// For Mission, Values and Vision
Route::get('admin/mvc', [App\Http\Controllers\MvcController::class, 'index'])->name('Mvc.index');
Route::get('admin/mvc/index', [App\Http\Controllers\MvcController::class, 'index'])->name('Mvc.index');

Route::get('admin/mvc/create', [App\Http\Controllers\MvcController::class, 'create'])->name('Mvc.create');
Route::post('admin/mvc/store', [App\Http\Controllers\MvcController::class, 'store'])->name('Mvc.store');

Route::get('admin/mvc/edit/{id}', [App\Http\Controllers\MvcController::class, 'edit'])->name('Mvc.edit');
Route::post('admin/mvc/update', [App\Http\Controllers\MvcController::class, 'update'])->name('Mvc.update');
Route::get('admin/mvc/delete/{id}', [App\Http\Controllers\MvcController::class, 'destroy'])->name('Mvc.destroy');


// For Gallery Image

Route::get('admin/photogallery', [App\Http\Controllers\PhotoGalleryController::class, 'index'])->name('Photogallery.index');
Route::get('admin/photogallery/index', [App\Http\Controllers\PhotoGalleryController::class, 'index'])->name('Photogallery.index');

Route::get('admin/photogallery/create', [App\Http\Controllers\PhotoGalleryController::class, 'create'])->name('Photogallery.create');
Route::post('admin/photogallery/store', [App\Http\Controllers\PhotoGalleryController::class, 'store'])->name('Photogallery.store');

Route::get('admin/photogallery/edit/{id}', [App\Http\Controllers\PhotoGalleryController::class, 'edit'])->name('Photogallery.edit');
Route::post('admin/photogallery/update/{id}', [App\Http\Controllers\PhotoGalleryController::class, 'update'])->name('Photogallery.update'); // Updated route with parameter {id}

Route::get('admin/photogallery/delete/{id}', [App\Http\Controllers\PhotoGalleryController::class, 'destroy'])->name('Photogallery.destroy');




// For Gallery Videos

Route::get('admin/videos', [App\Http\Controllers\VideoController::class, 'index'])->name('Video.index');
Route::get('admin/videos/index', [App\Http\Controllers\VideoController::class, 'index'])->name('Video.index');

Route::get('admin/videos/create', [App\Http\Controllers\VideoController::class, 'create'])->name('Video.create');
Route::post('admin/videos/store', [App\Http\Controllers\VideoController::class, 'store'])->name('Video.store');

Route::get('admin/videos/edit/{id}', [App\Http\Controllers\VideoController::class, 'edit'])->name('Video.edit');
Route::post('admin/videos/update', [App\Http\Controllers\VideoController::class, 'update'])->name('Video.update');
Route::get('admin/videos/delete/{id}', [App\Http\Controllers\VideoController::class, 'destroy'])->name('Video.destroy');



// For Legal Documents

Route::get('admin/legaldocs', [App\Http\Controllers\LegaldocsController::class, 'index'])->name('Legaldocs.index');
Route::get('admin/legaldocs/index', [App\Http\Controllers\LegaldocsController::class, 'index'])->name('Legaldocs.index');

Route::get('admin/legaldocs/create', [App\Http\Controllers\LegaldocsController::class, 'create'])->name('Legaldocs.create');
Route::post('admin/legaldocs/store', [App\Http\Controllers\LegaldocsController::class, 'store'])->name('Legaldocs.store');

Route::get('admin/legaldocs/edit/{id}', [App\Http\Controllers\LegaldocsController::class, 'edit'])->name('Legaldocs.edit');
Route::post('admin/legaldocs/update', [App\Http\Controllers\LegaldocsController::class, 'update'])->name('Legaldocs.update');
Route::get('admin/legaldocs/delete/{id}', [App\Http\Controllers\LegaldocsController::class, 'destroy'])->name('Legaldocs.destroy');
Route::post('admin/legaldocs/update/{id}', [App\Http\Controllers\LegaldocsController::class, 'update'])->name('Legaldocs.update');
Route::delete('admin/legaldocs/{id}', [App\Http\Controllers\LegaldocsController::class, 'destroy'])->name('Legaldocs.destroy');
Route::put('admin/legaldocs/{id}', [App\Http\Controllers\LegaldocsController::class, 'update'])->name('Legaldocs.update');



// For Client

Route::get('admin/client', [App\Http\Controllers\ClientController::class, 'index'])->name('Client.index');
Route::get('admin/client/index', [App\Http\Controllers\ClientController::class, 'index'])->name('Client.index');

Route::get('admin/client/create', [App\Http\Controllers\ClientController::class, 'create'])->name('Client.create');
Route::post('admin/client/store', [App\Http\Controllers\ClientController::class, 'store'])->name('Client.store');

Route::get('admin/client/edit/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('Client.edit');
Route::post('admin/client/update', [App\Http\Controllers\ClientController::class, 'update'])->name('Client.update');
Route::get('admin/client/delete/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('Client.destroy');

// For Projects

Route::get('admin/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('Projects.index');
Route::get('admin/projects/index', [App\Http\Controllers\ProjectController::class, 'index'])->name('Projects.index');

Route::get('admin/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('Projects.create');
Route::post('admin/projects/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('Projects.store');

Route::get('admin/projects/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('Projects.edit');
Route::post('admin/projects/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('Projects.update');
Route::get('admin/projects/delete/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('Projects.destroy');




// For Services

Route::get('admin/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('Services.index');
Route::get('admin/services/index', [App\Http\Controllers\ServiceController::class, 'index'])->name('Services.index');

Route::get('admin/services/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('Services.create');
Route::post('admin/services/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('Services.store');

Route::get('admin/services/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('Services.edit');
Route::post('admin/services/update', [App\Http\Controllers\ServiceController::class, 'update'])->name('Services.update');
Route::get('admin/services/delete/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('Services.destroy');

// For Testimonials

Route::get('admin/testimonials', [App\Http\Controllers\TestimonialController::class, 'index'])->name('Testimonials.index');
Route::get('admin/testimonials/index', [App\Http\Controllers\TestimonialController::class, 'index'])->name('Testimonials.index');

Route::get('admin/testimonials/create', [App\Http\Controllers\TestimonialController::class, 'create'])->name('Testimonials.create');
Route::post('admin/testimonials/store', [App\Http\Controllers\TestimonialController::class, 'store'])->name('Testimonials.store');

Route::get('admin/testimonials/edit/{id}', [App\Http\Controllers\TestimonialController::class, 'edit'])->name('Testimonials.edit');
Route::post('admin/testimonials/update', [App\Http\Controllers\TestimonialController::class, 'update'])->name('Testimonials.update');
Route::get('admin/testimonials/delete/{id}', [App\Http\Controllers\TestimonialController::class, 'destroy'])->name('Testimonials.destroy');
Route::post('admin/testimonials/update/{testimonial}', [App\Http\Controllers\TestimonialController::class, 'update'])->name('Testimonials.update');




//For Careers Page
Route::get('admin/careers', [CareersController::class, 'index'])->name('careers.index');
Route::get('admin/careers/create', [CareersController::class, 'create'])->name('careers.create');
Route::post('admin/careers', [CareersController::class, 'store'])->name('careers.store');


//Instagram_post
Route::get('admin/instagram', [InstagramPostController::class, 'index'])->name('Instagram.index');
Route::get('admin/instagram/index', [InstagramPostController::class, 'index'])->name('Instagram.index');
Route::get('admin/instagram/create', [InstagramPostController::class, 'create'])->name('Instagram.create');
Route::post('admin/instagram/store', [InstagramPostController::class, 'store'])->name('Instagram.store');

//Favicon
Route::get('admin/favicon', [FaviconController::class, 'index'])->name('Favicon.index');
Route::get('admin/favicon/create', [FaviconController::class, 'create'])->name('Favicon.create');
Route::get('admin/favicon/edit/{id}', [FaviconController::class, 'edit'])->name('Favicon.edit');
Route::post('admin/favicon/update', [FaviconController::class, 'update'])->name('Favicon.update');
Route::get('admin/favicon/destroy/{id}', [FaviconController::class, 'destroy'])->name('Favicon.destroy');
Route::post('admin/favicon/store', [FaviconController::class, 'store'])->name('Favicon.store');



// For Single Controller
Route::get('gallery', [App\Http\Controllers\SingleController::class, 'render_gallery'])->name('Gallery');
Route::get('video', [App\Http\Controllers\SingleController::class, 'render_video'])->name('Video');
Route::get('contactpage', [App\Http\Controllers\SingleController::class, 'render_contact'])->name('Contact');
Route::get('aboutus', [App\Http\Controllers\SingleController::class, 'render_about'])->name('About');
Route::get('service', [App\Http\Controllers\SingleController::class, 'render_service'])->name('Service');
Route::get('projects', [App\Http\Controllers\SingleController::class, 'render_allprojects'])->name('Allprojects');
Route::get('testimonials', [App\Http\Controllers\SingleController::class, 'render_testimonial'])->name('Testimonial');
Route::get('team', [App\Http\Controllers\SingleController::class, 'render_team'])->name('Team');
Route::get('message', [App\Http\Controllers\SingleController::class, 'render_message'])->name('Message');
Route::get('legaldocs', [App\Http\Controllers\SingleController::class, 'render_legaldocs'])->name('Legaldocs');
// Route::get('single/{slug}', [App\Http\Controllers\SingleController::class, 'render_cat'])->name('Category');
Route::get('postview/{slug}', [App\Http\Controllers\SingleController::class, 'render_post'])->name('Post');
Route::get('products/{slug}', [App\Http\Controllers\SingleController::class, 'render_welcome'])->name('Welcome');
Route::get('project/{slug}', [App\Http\Controllers\SingleController::class, 'render_project'])->name('Project');
Route::get('servicesingle/{slug}', [App\Http\Controllers\SingleController::class, 'render_servicesingle'])->name('Servicesingle');
Route::get('singlemessage/{id}', [App\Http\Controllers\SingleController::class, 'render_singlemessage'])->name('Singlemessage');
Route::get('blog/', [App\Http\Controllers\SingleController::class, 'render_blog'])->name('blogs');
Route::post('/contactpage', [ContactController::class, 'store'])->name('Contact.store');
Route::get('admin/contact/index', [App\Http\Controllers\ContactController::class, 'index'])->name('Contact.index');Route::post('/subscribers', [App\Http\Controllers\SubscriberController::class, 'store'])->name('Subscriber.store');
Route::get('admin/subscriber/index', [App\Http\Controllers\SubscriberController::class, 'index'])->name('Subscriber.index');
Route::post('postview/{slug}', [App\Http\Controllers\SingleController::class, 'render_post'])->name('Post');
// Route::get('post/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('Post');




//Client-side-->Careers
Route::get('currentjobopenning', [SingleController::class, 'render_career'])->name('Careers');
Route::get('jobvacancy/{id}', [SingleController::class, 'render_job'])->name('Jobs');
Route::get('apply/{id}', [SingleController::class, 'render_applyForm'])->name('ApplyForm');
Route::get('/job-applications/create', [JobApplicationController::class, 'create'])->name('job-applications.create');
Route::post('/job-applications', [JobApplicationController::class, 'store'])->name('job-applications.store');

//For Careers Page
Route::get('admin/careers', [CareersController::class, 'index'])->name('careers.index');
Route::get('admin/careers/create', [CareersController::class, 'create'])->name('careers.create');
Route::post('admin/careers', [CareersController::class, 'store'])->name('careers.store');Route::get('admin/careers/{id}/edit', [CareersController::class, 'edit'])->name('careers.edit');
Route::post('admin/careers/{id}', [CareersController::class, 'update'])->name('careers.update');
Route::delete('admin/careers/{id}', [CareersController::class, 'destroy'])->name('careers.destroy');


//Instagram_post
Route::get('admin/instagram', [InstagramPostController::class, 'index'])->name('Instagram.index');
Route::get('admin/instagram/index', [InstagramPostController::class, 'index'])->name('Instagram.index');
Route::get('admin/instagram/create', [InstagramPostController::class, 'create'])->name('Instagram.create');
Route::post('admin/instagram/store', [InstagramPostController::class, 'store'])->name('Instagram.store');
Route::get('admin/instagram/{id}/edit', [InstagramPostController::class, 'edit'])->name('Instagram.edit');
Route::post('admin/instagram/{id}', [InstagramPostController::class, 'update'])->name('Instagram.update');
Route::delete('admin/instagram/{id}', [InstagramPostController::class, 'destroy'])->name('Instagram.destroy');




//Favicon
Route::get('admin/favicon', [FaviconController::class, 'index'])->name('Favicon.index');
Route::get('admin/favicon/create', [FaviconController::class, 'create'])->name('Favicon.create');
Route::get('admin/favicon/edit/{id}', [FaviconController::class, 'edit'])->name('Favicon.edit');
Route::post('admin/favicon/update', [FaviconController::class, 'update'])->name('Favicon.update');
Route::get('admin/favicon/destroy/{id}', [FaviconController::class, 'destroy'])->name('Favicon.destroy');
Route::post('admin/favicon/store', [FaviconController::class, 'store'])->name('Favicon.store');



Route::post('/compress-image', [ImageController::class, 'compressAndConvertToWebP']);
Route::post('/upload-image', 'ImageController@uploadImage')->name('image.upload');


// Route::get('blogs', function () {
//     // Redirect to the Category route with a default parameter value
//     return redirect()->route('Category', ['slug' => 'default']);
// })->name('Blogs');


// Route::get('/blogs', function () {
//     // Directly return the view containing the blog content
//     return view('includes.blogs');
// })->name('Blogs');
// Route::get('/blogs', [App\Http\Controllers\SingleController::class, 'render_blog'])->name('Blogs');