<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VerificationDocument;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'id_front' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'id_back' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'passport' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle file uploads with custom filenames for easier identification
        $id_front = $this->uploadFile($request->file('id_front'), 'id_front');
        $id_back = $this->uploadFile($request->file('id_back'), 'id_back');
        $passport = $this->uploadFile($request->file('passport'), 'passport');

        // Save document details to the database
        VerificationDocument::create([
            'user_id' => Auth::id(),
            'id_front' => $id_front,
            'id_back' => $id_back,
            'passport' => $passport,
            'status' => '0', // Set initial status to pending
        ]);

        return redirect()->back()->with('success', 'Documents uploaded successfully. Your verification is pending.');
    }

    /**
     * Upload a file and return its public URL.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $type
     * @return string
     */
    private function uploadFile($file, $type)
    {
        // Create a unique filename with timestamp
        $filename = time() . "_{$type}." . $file->getClientOriginalExtension();

        // Move the file to the public storage directory
        $file->move(public_path('uploads/verification_documents'), $filename);

        // Return the publicly accessible URL of the file
        return url('uploads/verification_documents/' . $filename);
    }
}
