<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('pages.contact-us');
    }

    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:20'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
            // Hidden honeypot field - real visitors never fill it in, bots often do.
            'website' => ['prohibited'],
        ]);

        Mail::to(config('site.contact.form_recipient'))->send(new ContactFormMail($data));

        return redirect()
            ->route('contact-us')
            ->with('status', "Thank you, {$data['name']} - your message has been sent. We'll get back to you soon.");
    }
}
