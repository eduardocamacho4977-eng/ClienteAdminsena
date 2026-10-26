<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $teachers = $this->fetchDataFromApi($url . '/v1/teachers');

        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $teacher = Http::get($url . '/teachers')->json();

        return view('teacher.create', compact('teacher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|string|max:255',
            'training_center_id' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);
         $file = $request->file('imagen');
        $url = env('URL_SERVER_API');

         $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/v1/teachers',['name' => $request->name, 'email' => $request->email, 'area_id' => $request->area_id, 'training_center_id' => $request->training_center_id]);

        return redirect()->route('teacher.index')->with('success', 'Profesor creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url . '/v1/teachers/' . $id);

        return view('teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url . '/v1/teachers/' . $id);

        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/v1/teachers/' . $id, $request->all());

        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/v1/teachers/' . $id);

        return redirect()->route('teacher.index');
    }
}
