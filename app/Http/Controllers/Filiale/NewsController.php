<?php

namespace App\Http\Controllers\Filiale;

use App\Http\Controllers\Controller;
use App\Models\Filiale;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index($filiale) {
        $filiale = ucfirst($filiale);

        /** @var Filiale */
        $filiale = Filiale::where('name', $filiale)->first();

        $news = $filiale->relatedNews;

        return Inertia::render('News/Index', [
            'selectedFiliale' => $filiale,
            'filialen' => Filiale::all(),
            'news' => $news
        ]);
    }

    public function create()
    {
        return Inertia::render('News/Create');
    }

    public function store($filiale)
    {
        $filiale = ucfirst($filiale);

        /** @var Filiale */
        $filiale = Filiale::where('name', $filiale)->first();

        if ($filiale->relatedNews()->count() >= 3) {
            return Redirect::route('news.index', [$filiale->name])->withErrors('Diese Filiale kann maximal drei News haben.');
        }

        $validatedData = Request::validate([
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:100'],
            'image_url' => ['nullable', 'url']
        ]);

        $filiale->relatedNews()->create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? null,
        ]);

        return Redirect::route('news.index', [$filiale->name])->with('success', 'News wurden erfolgreich erstellt.');
    }
}
