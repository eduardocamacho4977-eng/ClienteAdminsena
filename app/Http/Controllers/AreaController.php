<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        try {
            $response = Http::get($url);

            if (! $response->successful()) {
                return collect();
            }

            return $response->object();
        } catch (\Throwable $e) {
            return collect();
        }
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $areas = collect($this->fetchDataFromApi($url . '/v1/areas') ?? []);

        return view('area.index', compact('areas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/v1/area/' . $id);

        return view('area.show', compact('area'));
    }
}
