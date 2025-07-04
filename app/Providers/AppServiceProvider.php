<?php
namespace App\Providers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Event;
use App\Models\Staff;
use App\Models\Project;
use App\Models\District;
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

        //articles recents
        $recent_posts = Post::select('id', 'title', 'slug','image')
            ->where('publish', true)
            ->latest()
            ->take(3)
            ->get();
        
        //evenements recent
        $recent_events = Event::select('id', 'title','image')
            ->where('publish', true)
            ->latest()
            ->take(2)
            ->get();

        //projet realisés
        $recent_projects = Project::select('id', 'title', 'slug','image')
        ->where('status', 'realisé')
        ->latest()
        ->take(3)
        ->get();
        // dd('trouver des image par defaut pour articles,events et personnel, travailler sur personnel ');
        // Paginator::useBootstrap();
        View::share('districts', $districts);
        View::share('pages', $pages);
        View::share('staffs', $staffs);
        View::share('recent_posts', $recent_posts);
        View::share('recent_events', $recent_events);
        View::share('recent_projects', $recent_projects);
    }
}
