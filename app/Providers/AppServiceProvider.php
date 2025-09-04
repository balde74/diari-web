<?php
namespace App\Providers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Event;
use App\Models\Staff;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Carousel;
use App\Models\District;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $districts = District::all();
        $pages     = Page::where('publish', 1)->get();
        $staffs    = Staff::all();
        $partners    = Partner::all();
        $carousel_general    = Carousel::where('district_id',null)->get();
        $mayorMessage = Setting::where('key','mayor_message')->first();

        //articles recents
        $recent_posts = Post::select('id', 'title', 'slug','image','created_at')
            ->where('publish', true)
            ->latest()
            ->take(3)
            ->get();
        
        //evenements recent
        $recent_events = Event::select('id', 'title','image')
            ->where('publish', true)
            ->latest()
            ->take(3)
            ->get();

        //projet realisés
        $recent_projects = Project::select('id', 'title', 'slug','image')
            ->where('status', 'realisé')
            ->latest()
            ->take(3)
            ->get();

          //projets
        $projects = Project::all();

        Paginator::useBootstrap();
        View::share('districts', $districts);
        View::share('pages', $pages);
        View::share('staffs', $staffs);
        View::share('recent_posts', $recent_posts);
        View::share('recent_events', $recent_events);
        View::share('recent_projects', $recent_projects);
        View::share('projects', $projects);
        View::share('carousels', $carousel_general);
        View::share('mayorMessage', $mayorMessage);
        View::share('partners', $partners);
    }
}
