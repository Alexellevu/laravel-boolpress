<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        return view('guest.welcome');
    }

    public function about()
    {
        return view('guest.about');
    }

    public function contacts()
    {
        return view('guest.contacts');

    }

    public function sendFormMail(Request $request)
    {
        
        $validateData = $request->validate(
            [
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
            ]
        );
        //ddd( $validateData);

        //rendering, visualizza senza inviare
        //return(new ContactFormMail($validateData))->render();

        //invia la mail
        Mail::to('admin@test.com')->send(new ContactFormMail($validateData));

        //dopo l invio reindirizza, ritorna alla pagina iniziale e da messaggio di conferma
        return redirect()->back()->with('message', 'Success! Grazie per la tua e-mail, ti risponderemo entro 48 ore');
     }
}
