<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use Illuminate\Http\Request;
use Session;

class PersonController extends Controller
{

    public function index()
    {
        $person = Person::paginate(25);

        return view('person.index', compact('person'));
    }

    public function create()
    {
        return view('person.create');
    }
	


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	
	
    public function store(Request $request)
    {
        app('App\Http\Controllers\ValidationController')->validateForm($request);
		
        $requestData = $request->all();
        
        Person::create($requestData);

        Session::flash('flash_message', 'Person added!');
		
		app('App\Http\Controllers\MailController')->sendMail($request);

        return redirect('person');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $person = Person::findOrFail($id);

        return view('person.show', compact('person'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Person::destroy($id);

        Session::flash('flash_message', 'Person deleted!');

        return redirect('person');
    }
}
