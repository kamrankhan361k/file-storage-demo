<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileUploadController extends Controller
{
    public function create()
    {
        // Get all uploaded files from the 'uploads' folder
        $files = Storage::files('uploads');

        return view('upload', ['files' => $files]);
    }

    // Handle file upload
    public function store(Request $request)
    {
        // Validate the file
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf,docx|max:2048'
        ]);

        // Store the file in the 'uploads' directory in the 'public' disk
        $path = $request->file('file')->store('uploads', 'public');

        // Redirect back with success message
        return back()->with('success', 'File uploaded successfully!');
    }

    // Handle file download
    public function download($filename)
    {
        // Generate the file path in the 'uploads' directory
        $filePath = 'uploads/' . $filename;

        // Check if the file exists in storage and return download response
        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }

        // Return 404 if the file is not found
        abort(404);
    }
}
