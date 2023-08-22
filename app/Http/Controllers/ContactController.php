<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $companies = $user->Companies()->orderBy('name')->pluck('name','id')->prepend('All Companies', '');
        \DB::enableQueryLog();
        // $companies = Company::orderBy('name')->all()->prepend('All Companies', '');
        $contacts = $user->Contacts()->orderBy('first_name', 'asc')->where(function($query){

            if($companyId = request('company_id')){
            $query->where( 'company_id',$companyId);
            }
            if($search = request('search')){

                $query-> where('first_name', 'LIKE', "%{$search}%");
                $query-> orWhere('last_name', 'LIKE', "%{$search}%");
                $query-> orWhere('email', 'LIKE', "%{$search}%");
               // dd($query);
            }
        })->paginate(6);
        // dd(\DB::getQueryLog());
        return view('contacts.index', compact('contacts','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = auth()->user()->companies()->orderBy('name')->pluck('name','id')->prepend('All Companies', '');
        return view('contacts.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        //
        // $contacts = new Contact();

        // both are they are same 1, 2
/** 1*/     Contact::create($request->all()+['user_id'=>auth()->id()]);
/** 2*/   // $request->user()->contacts()->create($request->all());
        return redirect()->back()->with('message', 'added succesfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contacts)
    {
        // $contacts = Contact::findOrFail($id);
        return view('contacts.show', compact('contacts'));
    }


    /**
     * Show the form for editi the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contacts)
    {
        //
        $companies =  auth()->user()->companies()->orderBy('name')->pluck('name','id')->prepend('All Companies', '');
        // $contacts = Contact::find($id);
        // $contacts = Contact::findOrFail($id);
        return view('contacts.edit', compact('companies', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contacts)
    {
        // $contacts = Contact::findOrFail($id);
        $contacts->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Record updated succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contacts)
    {
        //
        // $contacts = Contact::findOrFail($id);
        $contacts->delete();
        return redirect()->back()->with('message', 'Record deleted succesfuly');
    }
}
