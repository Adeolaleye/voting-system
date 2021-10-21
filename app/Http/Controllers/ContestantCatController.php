<?php

namespace App\Http\Controllers;

use App\Ip;
use Carbon\Carbon;
use App\Contestant;
use App\contestantcat;
use Illuminate\Http\Request;


class ContestantCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        
        // dd($_SERVER['SERVER_SOFTWARE']);
        $contestant = contestantcat::all();
        $counter = $contestant->count();
        $now= Carbon::now();
        $enddate = date("20/10/2021 00:49:00");
        $date = date('d/m/Y h:i:s');
       // dd($date, $enddate);
        // 
        return view('home', [
            'contestantCat' => $contestant,
            'counter'  => $counter,
            'enddate' => $enddate,
            'date' => $date,
            'now' => $now,
        ]);
        
    }

    public function create()
    {
        $contestant = contestantcat::all();

        return view('contestantPage', [
            'contestantCat' => $contestant,
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
        //dd(request('votecount'));
        $contestant = new Contestant();
        $contestant-> votecount = request('votecount');
        $contestant->save();
        

        return back();
    }
    public function vote(Request $request)
    {
        $data = $this->validate($request, [
            'contestant_id' => 'required|numeric',
            'contestantcat_id' => 'required|numeric',
        ]);

        //Get all ips for this category
        $ip_check = Ip::whereIp($_SERVER['REMOTE_ADDR'])->wherecontestantcatId($request->contestantcat_id)->count();
        
        //if incoming ip matches with stored, abort, else continue
        if($ip_check > 0){
            return back()->with('error', 'You are not allowed to vote more than once for contestants in this category');
        }

        $contestant = Contestant:: where ('id', $request->contestant_id)->first ();
        $contestant->votecount +=  1;
        $contestant->save();

        //save incoming ip to ips table
        Ip::create([
            'ip' => $_SERVER['REMOTE_ADDR'],
            'contestantcat_id' => $request->contestantcat_id
        ]);

        return back()->with('message', 'Voting Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $contestants = Contestant::wherecontestantcatId($id)->get(); 
       
        $categoryname = contestantcat::where('id', $id)->value('contestantcategories');
        $contestants = Contestant::with('contestantcat')
        ->where('contestantcat_id', $id)
        ->get();
        
    
        //method 1
        return view('contestantPage', compact('contestants', 'categoryname'));

        //method 2
        // return view('contestantPage')
        // ->with('contestants', $contestants)
        // ->with('i', $i);

        // method 3
        // return view('contestantPage', [
        //     'Contestant' => $contestants, 
        //     'i' => $i,       
        // ]);
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
