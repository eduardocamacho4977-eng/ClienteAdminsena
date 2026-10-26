<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComputerController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $computers = $this->fetchDataFromApi($url . '/v1/computers');

        return view('computer.index', compact('computers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $computer = Http::get($url . '/v1/computers')->json();

        return view('computer.create', compact('computer'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');
         $file = $request->file('imagen');
         
       $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/v1/computers',['number' => $request->number, 'brand' => $request->brand]);


        return redirect()->route('computer.index')->with('success', 'Computador creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $computer = $this->fetchDataFromApi($url . '/v1/computers/' . $id);

        return view('computer.show', compact('computer'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $computer = $this->fetchDataFromApi($url . '/v1/computers/' . $id);

        return view('computer.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/v1/computers/' . $id, $request->all());

        return redirect()->route('computer.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/v1/computers/' . $id);

        return redirect()->route('computer.index');
    }
}
