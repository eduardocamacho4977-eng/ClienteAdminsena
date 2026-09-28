<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
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

        $training_centers = collect($this->fetchDataFromApi($url . '/v1/training_centers') ?? []);

        return view('training_center.index', compact('training_centers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $training_center = $this->fetchDataFromApi($url . '/v1/training_center/' . $id);

        return view('training_center.show', compact('training_center'));
    }
}
