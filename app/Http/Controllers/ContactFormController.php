<?php

namespace App\Http\Controllers;

use Skeleton\Contact\ContactMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ContactFormRequest;

class ContactFormController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        Log::info((new ContactMail($request))->build()->render());

        Mail::send(new ContactMail($request));

        Session::flash('submitted');

        return redirect()->to(route('contactform.thanks'));
    }
}
