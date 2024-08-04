<?php

namespace App\Http\Controllers;

use App\Mail\FileSubmissionMail;
use App\Models\FileSubmission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FileSubmissionController extends Controller
{
    public function create()
    {
        return view('file-submission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $file = $request->file('photo');
        $fileName = 'file-' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        $submission = FileSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'file_path' => $filePath,
            'email_sent' => false,
            'email_sent_at' => null,
        ]);

        try {
            Mail::to($request->email)->send(new FileSubmissionMail($submission));
            $submission->update([
                'email_sent' => true,
                'email_sent_at' => Carbon::now(),
            ]);
        } catch (\Exception $e) {
            // Manejar la excepción si es necesario
        }

        return back()->with('message', 'Your file has been submitted successfully.');
    }
}
