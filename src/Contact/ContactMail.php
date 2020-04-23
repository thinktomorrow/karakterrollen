<?php
declare(strict_types=1);

namespace Skeleton\Contact;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    /** @var $request */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->from(env('MAIL_ADMIN_EMAIL'), env('MAIL_ADMIN_NAME'))
                    ->to(env('MAIL_ADMIN_EMAIL'), env('MAIL_ADMIN_NAME'))
                    ->view('mails.contactmail')
                    ->subject('Contactopname van '.$this->request->input('name'))
                    ->with([
                        'name'    => $this->request->input('name'),
                        'email'   => $this->request->input('email'),
                        'content' => $this->request->input('message'),
                    ]);
    }
}
