<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
     private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $teachers = collect($this->fetchDataFromApi($url . '/v1/teachers') ?? []);

        return view('teacher.index', compact('teachers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $teacher = $this->fetchDataFromApi($url . '/v1/teacher/' . $id);

        return view('teacher.show', compact('teacher'));
    }
}
