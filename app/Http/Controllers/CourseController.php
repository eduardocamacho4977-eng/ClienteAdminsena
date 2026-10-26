<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $courses = $this->fetchDataFromApi($url . '/v1/courses');

        return view('course.index', compact('courses'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $course = Http::get($url . '/v1/courses')->json();

        return view('course.create', compact('course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_number' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'area_id' => 'required|string|max:255',
            'training_center_id' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

         $file = $request->file('imagen');
        $url = env('URL_SERVER_API');

         $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/v1/courses',['course_number' => $request->course_number, 'day' => $request->day, 'area_id' => $request->area_id, 'training_center_id' => $request->training_center_id]);

        return redirect()->route('course.index')->with('success', 'Curso creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/v1/courses/' . $id);

        return view('course.show', compact('course'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/v1/courses/' . $id);

        return view('course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/v1/courses/' . $id, $request->all());

        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/v1/courses/' . $id);

        return redirect()->route('course.index');
    }
}
