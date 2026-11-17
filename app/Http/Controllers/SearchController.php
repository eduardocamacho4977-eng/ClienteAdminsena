<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = trim($request->input('search', ''));
        $courses = collect();
        $teachers = collect();
        $apprentices = collect();
        $areas = collect();
        $trainingCenters = collect();
        $computers = collect();

        if ($search !== '') {
            $url = env('URL_SERVER_API');
            $courses = $this->searchApi($url . '/v1/courses', $search, [
                'course_number', 'day', 'area.name', 'trainingCenter.name',
            ]);
            $teachers = $this->searchApi($url . '/v1/teachers', $search, [
                'name', 'email', 'area.name', 'trainingCenter.name',
            ]);
            $apprentices = $this->searchApi($url . '/v1/apprentices', $search, [
                'name', 'email', 'cell_number', 'course.course_number', 'computer.number',
            ]);
            $areas = $this->searchApi($url . '/v1/areas', $search, ['name']);
            $trainingCenters = $this->searchApi($url . '/v1/training_centers', $search, [
                'name', 'location',
            ]);
            $computers = $this->searchApi($url . '/v1/computers', $search, [
                'number', 'brand',
            ]);
        }

        return view('vistas.search', compact(
            'search',
            'courses',
            'teachers',
            'apprentices',
            'areas',
            'trainingCenters',
            'computers'
        ));
    }

    private function searchApi(string $url, string $search, array $fields)
    {
        $items = Http::get($url)->throw()->object();
        $query = strtolower($search);

        return collect($items)->filter(function ($item) use ($fields, $query) {
            foreach ($fields as $field) {
                $value = data_get($item, $field);

                if ($value !== null && str_contains(strtolower((string) $value), $query)) {
                    return true;
                }
            }

            return false;
        })->values();
    }
}