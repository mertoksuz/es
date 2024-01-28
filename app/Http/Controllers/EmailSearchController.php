<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailSearchService;

class EmailSearchController extends Controller
{
    public function search(Request $request, EmailSearchService $emailSearchService)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string',
            'company' => 'required|string',
            'linkedin_url' => 'required|url',
        ]);

        // Perform email search
        $results = $emailSearchService->searchEmails(
            $request->input('name'),
            $request->input('company'),
            $request->input('linkedin_url')
        );

        // Return the result (you can display it in a view or as JSON)
        return view('search-results', compact('results'));
    }
}
