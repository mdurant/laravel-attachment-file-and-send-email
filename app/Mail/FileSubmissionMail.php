<?php
// app/Mail/FileSubmissionMail.php

namespace App\Mail;

use App\Models\FileSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class FileSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;

    public function __construct(FileSubmission $submission)
    {
        $this->submission = $submission;
    }

    public function build()
    {
        return $this->view('emails.file-submission')
            ->with([
                'name' => $this->submission->name,
                'fileName' => basename($this->submission->file_path),
                'submissionDate' => Carbon::parse($this->submission->created_at)->format('d/m/Y - H:i:s'),
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'File Submission Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.file-submission',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
