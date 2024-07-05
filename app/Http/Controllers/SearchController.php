<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Ganti dengan model Anda

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Lakukan pencarian menggunakan model Book
        $results = Book::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('author', 'LIKE', "%{$query}%")
                        ->get();

        return view('search.results', compact('results'));
    }
}
