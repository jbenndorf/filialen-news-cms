<?php

namespace App\Http\Controllers\Filiale;

use App\Http\Controllers\Controller;
use App\Models\Filiale;
use App\Models\News;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index($filiale) {
        $filiale = ucfirst($filiale);

        /** @var Filiale */
        $filiale = Filiale::where('name', $filiale)->first();

        $news = $filiale->relatedNews();

        return Inertia::render('News/Index', [
            'selectedFiliale' => $filiale,
            'filialen' => Filiale::all(),
            'news' => $news
        ]);
    }

    public function show($filiale, $newsId) {

        $filiale = ucfirst($filiale);

        /** @var Filiale */
        $filiale = Filiale::where('name', $filiale)->first();

        /** @var News */
        $news = News::where('filiale_id', $filiale->id)->findOrFail($newsId);

        return Inertia::render('News/Show', [
            'selectedFiliale' => $filiale,
            'filialen' => Filiale::all(),
            'news' => $news,
        ]);
    }

    public function create()
    {
        return Inertia::render('News/Create');
    }

    public function store()
    {
        Request::validate([
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:100'],
            'image_url' => ['nullable', 'url']
        ]);

        return Redirect::route('news')->with('success', 'News wurden erfolgreich erstellt.');
    }
}
