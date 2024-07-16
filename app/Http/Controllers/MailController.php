<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailsJob;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = Mail::orderBy('id', 'desc')->paginate(10);
        return view('subscriptions.index', compact('emails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all(), 'asdas');
        $request->validate([
            'mail' => 'required|email:rfc,dns|unique:mails,mail',
        ]);
        $mail = new Mail;
        $mail->mail = $request->mail;
        $mail->save();
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        $mail->delete();
        return redirect()->back();
    }

    public function mailDraft()
    {
        return view('subscriptions.create');
    }
    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $subject = $request->subject;
        $body = $request->body;

        $totalSubscribers = Mail::count();
        $batchSize = 25;
        $totalJobs = ceil($totalSubscribers / $batchSize);

        for ($i = 0; $i < $totalJobs; $i++) {
            SendEmailsJob::dispatch($subject, $body, $i * $batchSize);
        }

        return back()->with('success', 'Mail sent and job dispatched!');
    }
}
