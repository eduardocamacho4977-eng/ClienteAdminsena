<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrainingCenterController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $training_centers = $this->fetchDataFromApi($url . '/v1/training_centers');

        return view('training_center.index', compact('training_centers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $training_center = Http::get($url . '/v1/training_centers')->json();

        return view('training_center.create', compact('training_center'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);
        
         $file = $request->file('imagen');
        $url = env('URL_SERVER_API');

         $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/v1/training_centers',['name' => $request->name, 'location' => $request->location]);

        return redirect()->route('trainingcenter.index')->with('success', 'Centro de formación creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $training_center = $this->fetchDataFromApi($url . '/v1/training_centers/' . $id);

        return view('training_center.show', compact('training_center'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $training_center = $this->fetchDataFromApi($url . '/v1/training_centers/' . $id);

        return view('training_center.edit', compact('training_center'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/v1/training_centers/' . $id, $request->all());

        return redirect()->route('trainingcenter.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/v1/training_centers/' . $id);

        return redirect()->route('trainingcenter.index');
    }
}
