<?php

namespace App\Http\Controllers;
use App\Ip;
use App\booksit;
use App\Contestant;
use App\contestantcat;
use Hamcrest\Core\IsNull;
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
    public function checking()
    {   
        $conts = contestantcat::with('contestants')->get();
        $categories_count = contestantcat::all()->count();
        $nominess_count = contestant::all()->count();
        $vote_count = Ip::all()->count();
        $voters_count = Ip::distinct()->count(['ip']);
        $counter = 1;
        $bookedsits = booksit::all();
        $bookedsits_count = booksit::all()->count();
        $highest = booksit::max('table_no') ?? NULL;
        $checkedin = booksit::where('status', '=', 1)->count();
        $unchecked = booksit::where('status', '=', 0)->count();
    

        return view('admin/sitreservation', [
            'conts' => $conts,
            'categories_count' => $categories_count,
            'nominess_count' => $nominess_count,
            'voters_count' => $voters_count,
            'vote_count' => $vote_count,
            'counter' => $counter,
            'bookedsits' => $bookedsits,
            'bookedsits_count' => $bookedsits_count,
            'highest' => $highest,
            'checkedin' => $checkedin,
            'unchecked' => $unchecked,
        ]);
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
        
        // //if incoming ip matches with stored, abort, else continue
        if( $bookasit){
            return view('bookings.ticket', [
                'bookasit' => $bookasit,
            ]);
        }
        $highest = booksit::max('table_no') ?? NULL;
        if(!is_null($highest)){
            $counter = booksit::where('table_no', "=", $highest)->count();
                if($counter > 9){
                    $tableno = $highest +1;
                }else{
                    $tableno = $highest;
                }
        }else{
            $highest = 1;
            $tableno = 1;
        };
        $bookasit = booksit::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'ips' => $_SERVER['REMOTE_ADDR'],
            'sitno'=> 0, 
            'table_no' => $tableno,
        ]);
        $new_number = $highest += 1;
        $sitno =  sprintf("%'.03d\n", $bookasit->id);
        $bookasit->sitno = $sitno; 
        $bookasit->save();
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
    public function checkin ($id)
    {
        $checkin= booksit::find($id);
        $checkin->status=1;
        $checkin->save();
        return back()->with('message', 'Checked In');
        //dd('checkin');
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
