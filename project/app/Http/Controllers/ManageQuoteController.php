<?php

namespace App\Http\Controllers;

use App\ManageQuote;
use Illuminate\Http\Request;

class ManageQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ManageQuote = ManageQuote::all();
        return view('manage_quotes.index',compact('ManageQuote',$ManageQuote));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage_quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);
        
        $manage_quotes = ManageQuote::create(['title' => $request->title,'description' => $request->description]) ;#echo "rehman";exit;
        return redirect('manage_quotes/'.$manage_quotes->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManageQuote  $manageQuote
     * @return \Illuminate\Http\Response
     */
    public function show(ManageQuote $manageQuote)
    {
        return view('manage_quotes.show',compact('manage_quotes',$manage_quotes));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManageQuote  $manageQuote
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageQuote $manageQuote)
    {
        return view('manage_quotes.edit',compact('manage_quotes',$manage_quotes));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManageQuote  $manageQuote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManageQuote $manageQuote)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);
        
        $manage_quotes->title = $request->title;
        $manage_quotes->description = $request->description;
        $manage_quotes->save();
        $request->session()->flash('message', 'Successfully modified the Quote!');
        return redirect('manage_quotes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManageQuote  $manageQuote
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageQuote $manageQuote)
    {
        $manage_quotes->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('manage_quotes');
    }
}
