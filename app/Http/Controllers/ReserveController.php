<?php

namespace App\Http\Controllers;
use App\booksit;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bookings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric',
            ]);
        //Get all ips for this category
        $bookasit = booksit::whereIps($_SERVER['REMOTE_ADDR'])->first();
        
        //if incoming ip matches with stored, abort, else continue
        if( $bookasit){
            return view('bookings.ticket', [
                'bookasit' => $bookasit,
            ]);
        }
        $highest = booksit::max('id');
        $new_number = $highest += 1;
        $sitno = sprintf("%'.03d\n", $new_number);

        $bookasit = booksit::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'ips' => $_SERVER['REMOTE_ADDR'],
            'sitno'=> $sitno,       
        ]);
        return view('bookings.ticket', [
            'bookasit' => $bookasit,
            //'sitno' => $sitno,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('bookings.ticket');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
