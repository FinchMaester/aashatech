<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
// use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

use Closure;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', [
            'contacts' => $contacts,
            'page_title' => 'Contact Us'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required',
            function ($attribute, $value, $fail) {

                $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                    'secret' => config('services.recaptcha.secret_key'),
                    'response' => $value,
                    'remoteip' => \request()->ip()
                ]);

                if (!$g_response->json('success')) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            },
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return response()->json(['success' => true]);
    }

    // public function show($id)
    // {
    //     $contact = Contact::find($id);
    //     return view('admin.contact.index', [
    //         'contact' => $contact,
    //         'page_title' => 'Contact Details'
    //     ]);
    // }
    // public function destroy(Contact $contactUs, $id)
    // {
    //     $contacts = Contact::find($id);
    //     $contacts->delete();

    //     return redirect('admin/contact/index')->with('successMessage', 'The message has been deleted!!');
    // }
}