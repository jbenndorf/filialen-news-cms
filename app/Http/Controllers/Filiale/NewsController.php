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
        $filiale = strtoupper($filiale);
        
        /** @var Filiale */
        $filiale = Filiale::first('name', $filiale);

        $news = $filiale->relatedNews();

        return Inertia::render('News/Show', [
            'filiale' => $filiale,
            'news' => $news
        ]);
    }

    public function show($filialeId, $newsId) {

        /** @var News */
        $news = News::where('filiale_id', $filialeId)->findOrFail($newsId);

        return Inertia::render('News/Show', [
            'filiale' => $filialeId,
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
