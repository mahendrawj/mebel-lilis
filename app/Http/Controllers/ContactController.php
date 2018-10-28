<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Contacts;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $c = $request->get('c');
        $contacts = Contacts::where('nama', 'LIKE', '%'.$c.'%')->paginate(5);
        return view('contacts.index', compact('contacts', 'c'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
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
        $this->validate($request,[
        'nama' => 'required|unique:contacts',
        'email' => 'required|email|max:255|unique:contacts',
        'comment' => 'required|max:255']);
        $data = $request->only('nama','email','comment');
        $contacts = Contacts::create($data);
       \Flash::success($contacts->nama, $contacts->email, $contacts->comment . ' saved.');
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contacts = Contacts::findOrFail($id);
        return view('contacts.edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $contacts = Contacts::findOrFail($id);
        $this->validate($request, [
            'nama' => 'required|string|max:255|unique:contacts,nama,' . $contacts->id,
            'email' => 'required|string|max:255|unique:contacts,email',
            'comment' => 'required|string|max:255|unique:contacts,comment'
        ]);

        $contacts->update($request->all());
        \Flash::success($request->get('nama'), $request->get('email'), $request->get('comment') . ' contacts updated.');
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacts::find($id)->delete();
        \Flash::success('Contact deleted.');
        return redirect()->route('contacts.index');
        //
    }
   
}
