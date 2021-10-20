<?php

namespace App\Http\Controllers;
use App\Contestant;
use App\contestantcat;
use App\Ip;
use App\booksit;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conts = contestantcat::with('contestants')->get();
        $categories_count = contestantcat::all()->count();
        $nominess_count = contestant::all()->count();
        $vote_count = Ip::all()->count();
        $voters_count = Ip::distinct()->count(['ip']);
        $counter = 1;
        $bookedsits = booksit::all();
        $bookedsits_count = booksit::all()->count();

        return view('admin.dashboard', [
            'conts' => $conts,
            'categories_count' => $categories_count,
            'nominess_count' => $nominess_count,
            'voters_count' => $voters_count,
            'vote_count' => $vote_count,
            'counter' => $counter,
            'bookedsits' => $bookedsits,
            'bookedsits_count' => $bookedsits_count,
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = contestantcat::all();
        
        return view('admin.addnominees', [
            'contestantcat' => $categories, 
        ]);
    }
    public function saveContestant(Request $request)
    {
        contestant::create([
            'name' =>$request->name,
            'contestantcat_id' => $request->category_id,
            'votecount' => 0
        ]);
        
        return back()->with('message', 'Contestant details have been saved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $this->validate($request, [
        //     'contestantcategories' => 'required|numeric'
        // ]);
        $data = request()->validate([
            'contestantcategories' => 'required|min:5'
        ]);

        $addcats = new contestantcat();
        $addcats -> contestantcategories = request('contestantcategories');
        $addcats -> save();
        return back()->with('message', 'Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
    public function destroy(Request $request)
    {
        $catid = request('id');
        $catids = contestantcat::findOrFail($catid);

            $catids->delete();

            return back();
          
            // return view('admin.dashboard')->with([
            //   'flash_message' => 'Deleted',
            //   'flash_message_important' => false
            // ]);
    }
}