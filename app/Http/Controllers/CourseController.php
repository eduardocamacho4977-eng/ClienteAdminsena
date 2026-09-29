<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $courses = collect($this->fetchDataFromApi($url . '/v1/courses') ?? []);

        return view('course.index', compact('courses'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $course = $this->fetchDataFromApi($url . '/v1/course/' . $id);

        return view('course.show', compact('course'));
    }
}
