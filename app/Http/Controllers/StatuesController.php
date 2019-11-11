<?php

namespace App\Http\Controllers;
use Auth;
use App\Statues;
use Illuminate\Http\Request;

class StatuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->statuses()->create([
            'content'=>$request->content,
            //'user_id'=>Auth::user()->id,
            // 'user_id' =>$request->user()->id   
        ]);
        
        session()->flash('success','发布成功');
        return  redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statues  $statues
     * @return \Illuminate\Http\Response
     */
    public function show(Statues $statues)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statues  $statues
     * @return \Illuminate\Http\Response
     */
    public function edit(Statues $statues)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statues  $statues
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statues $statues)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statues  $statues
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statues $statues)
    {
        //
    }
}
