<?php

namespace App\Http\Controllers;
use App\User;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.views.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:50|min:3',
            'email'     => 'required|email|max:255|min:7',
            'mobilephone'     => 'required|max:20|min:11',
            'subject' => 'required|max:255|min:3',
            'body'   => 'required|max:1000|min:3',
        ]);


        Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobilephone'     => $request->mobilephone,
            'subject' => $request->subject,
            'body'   => $request->body,
        ]);

        Mail::to($request->email)->send(new ContactMail([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobilephone'     => $request->mobilephone,
            'subject' => $request->subject,
            'body'   => $request->body,
            'created_at' => Carbon::now()
        ]));

        $admin = User::find(1);

        Mail::to($admin->email)->send(new ContactMail([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobilephone'     => $request->mobilephone,
            'subject' => $request->subject,
            'body'   => $request->body,
            'created_at' => Carbon::now()
        ]));

        if($request->ajax()){
            return response()->json(['message' => 'Message send successfully.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
