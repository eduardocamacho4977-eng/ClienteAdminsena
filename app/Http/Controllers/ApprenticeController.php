<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
      private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $apprentices = collect($this->fetchDataFromApi($url . '/v1/apprentices') ?? []);

        return view('apprentice.index', compact('apprentices'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $apprentice = $this->fetchDataFromApi($url . '/v1/apprentice/' . $id);

        return view('apprentice.show', compact('apprentice'));
    }
}
