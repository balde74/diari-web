<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\Post;
use App\Models\Event;
use App\Models\Project;
use App\Models\District;
use App\Models\Documentation;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // public function index(Request $request)
    // {
    //     // $programmes = Programme::all();
    //     // $instituts = Institut::all();
    //     // $directions = Direction::all();
    //     $ip = $request->ip();
    //     //test si l'adresse ip est deja dans la table visite
    //     $date = now()->format('Y-m-d');
    //     $ip_existe = Visite::where('adresse_ip', $ip)->whereDate('created_at', $date)->first();
    //     if (!$ip_existe) {
    //         $visite = new Visite;
    //         $visite->create([ 'adresse_ip'=>$ip,]);
    //     }

    //     $articles = Article::orderBy('created_at','desc')->where('status',1)->get();
    //     $evenements = Evenement::orderBy('date','asc')->where('status',1)->get();
    //     $caroussels = Caroussel::where('direction_id',Null)->orderBy('created_at','desc')->get();
    //     $partenaires = Partenaire::all();
    //     $videos = Video::all();

    //     return view('welcome',compact('articles','evenements','caroussels','partenaires','videos'));
    // }

    // public function directionShow( $id)
    // {
    //    $direction = Direction::find($id);
    //    $caroussels = Caroussel::where('direction_id',$direction->id)->orderBy('created_at','desc')->get();
    //    return view('frontend/direction/show',compact('direction','caroussels'));
    // }

    // public function articleShow($id)
    // {
    //     $article = Article::find($id);
    //     $articles_recents = Article::where('id','<>',$id)->where('status',1)->orderBy('created_at','desc')->take('4')->get();
    //     $evenements_recents = Evenement::orderBy('created_at','desc')->where('status',1)->take('4')->get();
    //    return view('frontend/article/show',compact('article','articles_recents','evenements_recents'));
    // }

    // public function evenementShow($id)
    // {
    //     $evenement = Evenement::find($id);
    //     $articles_recents = Article::orderBy('created_at','desc')->where('status',1)->take('4')->get();
    //     $evenements_recents = Evenement::where('id','<>',$id)->where('status',1)->orderBy('date','asc')->take('4')->get();
    //    return view('frontend/evenement/show',compact('evenement','articles_recents','evenements_recents'));
    // }

    public function pageShow($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend/page/show', compact('page'));
    }

    public function postShow($slug)
    {
        $post = Post::where('slug', $slug)->first();
        dd($post);
        return view('frontend/page/show', compact('post'));
    }

    public function eventShow($id)
    {
        $event = Event::findOrFail($id);
        dd($event);
        return view('frontend/page/show', compact('post'));
    }

    public function projectShow($slug)
    {
        $project = Project::where('slug', $slug)->first();
        dd($project);
        return view('frontend/page/show', compact('post'));
    }

    public function projectsByStatus($status)
    {
        // Sécuriser le status accepté
        $allowedStatuses = ['realisations', 'en-cours'];

        if (!in_array($status, $allowedStatuses)) {
            abort(404);
        }
        if ($status == 'realisations') {
            $projects = Project::where('status', 'realisé')->orderBy('created_at','desc')->paginate(9);
            // dynamisation de l'onglet dans banner
            $page = (object) [
                'parent_zone' => 'Projets',
                'title' => 'réalisations'
            ];
        }else{
            $projects = Project::where('status','<>', 'realisé')->orderBy('created_at','desc')->paginate(9);
            $page = (object)[
                'parent_zone' => 'Projets',
                'title' => 'En cours'
            ];
        }
        
        return view('frontend/projects/show', compact('projects','page'));
    }

    public function posts()
    {
        $posts = Post::where('publish',1)->orderBy('created_at','desc')->paginate(9);
         $page = (object)[
                'parent_zone' => 'Actualités',
                'title' => 'Communiqués'
            ];
        return view('frontend.posts.all',compact('posts','page'));
    }

    public function events()
    {
        $events = Event::where('publish',1)->orderBy('created_at','desc')->paginate(9);
        $page = (object)[
                'parent_zone' => 'Actualités',
                'title' => 'évènements à venir'
            ];
        return view('frontend.events.all',compact('events','page'));
    }

    public function documentations()
    {
        $documentations = Documentation::all();
         $page = (object)[
                'parent_zone' => 'Documentation',
                'title' => ''
            ];

        return view('frontend/documentation/show', compact('documentations','page'));

    }

    public function districtShow($id)
    {
       $district = District::find($id);
       $last_posts = Post::where('district_id',$id)->where('publish',1)->take(3)->get();
       return view('frontend/districts/show',compact('district','last_posts'));
    }

// ____________________________________________________

    public function article_plusShow()
    {
        $articles = Article::orderBy('created_at', 'desc')->where('status', 1)->paginate(10);

        // $articles_recents = Article::orderBy('created_at','desc')->where('status',1)->take('4')->get();
        $articles_recents   = null;
        $evenements_recents = Evenement::orderBy('date', 'asc')->where('status', 1)->take('4')->get();
        return view('frontend/article_plus/show', compact('articles', 'articles_recents', 'evenements_recents'));

    }

    public function evenement_plusShow()
    {
        $evenements = Evenement::orderBy('created_at', 'desc')->where('status', 1)->paginate(10);

        $articles_recents = Article::orderBy('created_at', 'desc')->where('status', 1)->take('4')->get();
        // $evenements_recents = Evenement::orderBy('date','asc')->where('status',1)->take('4')->get();
        $evenements_recents = null;
        return view('frontend/evenement_plus/show', compact('evenements', 'evenements_recents', 'articles_recents'));

    }

    public function article_direction_plusShow(Direction $id)
    {
        $direction        = $id;
        $articles         = Article::orderBy('created_at', 'desc')->where('status', 1)->where('direction_id', $direction->id)->paginate(10);
        $articles_recents = null;
        // $articles_recents = Article::orderBy('created_at','desc')->where('status',1)->take('4')->get();
        $evenements_recents = Evenement::orderBy('date', 'asc')->where('status', 1)->take('4')->get();
        return view('frontend/article_direction_plus/show', compact('articles', 'articles_recents', 'evenements_recents', 'direction'));

    }

    public function evenement_direction_plusShow(Direction $id)
    {
        $direction          = $id;
        $evenements         = Evenement::orderBy('created_at', 'desc')->where('status', 1)->where('direction_id', $direction->id)->paginate(10);
        $evenements_recents = null;
        $articles_recents   = Article::orderBy('created_at', 'desc')->where('status', 1)->take('4')->get();
        // $evenements_recents = Evenement::orderBy('date','asc')->where('status',1)->take('4')->get();
        return view('frontend/evenement_direction_plus/show', compact('evenements', 'articles_recents', 'evenements_recents', 'direction'));

    }

    public function video_plusShow()
    {
        $videos = Video::orderBy('created_at', 'desc')->paginate(3);

        $articles_recents   = Article::orderBy('created_at', 'desc')->where('status', 1)->take('4')->get();
        $evenements_recents = Evenement::orderBy('date', 'asc')->where('status', 1)->take('4')->get();
        return view('frontend/video_plus/show', compact('videos', 'evenements_recents', 'articles_recents'));

    }
}
