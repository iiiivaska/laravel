<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Auth;

class ContactController extends Controller {
    public function submit(ContactRequest $req) {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->message = $req->input('message');
        $contact->subject = $req->input('subject');

        $contact->save();

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    public function allData() {
        $contact = new Contact();
        return view('messages', ['data' => $contact->all()]);
    }

    public function showOneMessage($id) {
        $contact = new Contact();
        return view('message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id) {
        if (Auth::check()) {
            $contact = new Contact();
            return view('update-message', ['data' => $contact->find($id)]);
        }
        return redirect()->route('login');
    }

    public function updateMessageSubmit($id, ContactRequest $req) {
            $contact = Contact::find($id);
            $contact->name = $req->input('name');
            $contact->email = $req->input('email');
            $contact->message = $req->input('message');
            $contact->subject = $req->input('subject');

            $contact->save();

            return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
    }

    public function deleteMessage($id) {
        if (Auth::check()) {
            Contact::find($id)->delete();
            return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
        }
        return redirect()->route('login');
    }

    public function logOut() {

        Auth::logout();

        return redirect('login');
    }
}
