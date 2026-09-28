<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
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

        $computers = collect($this->fetchDataFromApi($url . '/v1/computers') ?? []);

        return view('computer.index', compact('computers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $computer = $this->fetchDataFromApi($url . '/v1/computer/' . $id);

        return view('computer.show', compact('computer'));
    }
}
