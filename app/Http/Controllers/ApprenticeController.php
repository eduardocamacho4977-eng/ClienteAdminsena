<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $apprentices = $this->fetchDataFromApi($url . '/v1/apprentices');

        return view('apprentice.index', compact('apprentices'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $courses = $this->fetchDataFromApi($url . '/v1/courses');
        $computers = $this->fetchDataFromApi($url . '/v1/computers');

        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:20',
            'course_id' => 'required|integer',
            'computer_id' => 'required|integer',
             'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);
         $file = $request->file('imagen');
        $url = env('URL_SERVER_API');

        $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/v1/apprentices',['name' => $request->name, 'email' => $request->email, 'cell_number' => $request->cell_number, 'course_id' => $request->course_id, 'computer_id' => $request->computer_id]);


        return redirect()->route('apprentice.index');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/v1/apprentices/' . $id);

        return view('apprentice.show', compact('apprentice'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/v1/apprentices/' . $id);
        $courses = $this->fetchDataFromApi($url . '/v1/courses');
        $computers = $this->fetchDataFromApi($url . '/v1/computers');

        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/v1/apprentices/' . $id, $request->all());

        return redirect()->route('apprentice.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/v1/apprentices/' . $id);

        return redirect()->route('apprentice.index');
    }
}
