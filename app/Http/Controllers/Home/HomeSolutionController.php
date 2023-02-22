<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeSolution;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeSolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solutions = HomeSolution::all();

        return  view('admin/solutions/index', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/solutions/create');
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
        $validatedata = $request->validate([
            'tittle' => 'required||max:50',
            'content' => 'required|max:100',
        ], [
            'tittle.required' => "Please input Slider tittle",
            'tittle.max' => "Slider tittle must not be more 50 characters",

            'content.required' => "Please input Slider Content",
            'content.max' => "Slider content must not be mor 100 characters"
        ]);
        HomeSolution::insert([
            'tittle' => $request->tittle,
            'content' => $request-> content,
            'created_at'=>Carbon::now(),
            ]);

            return redirect()->route('admin.solution')->with('success', 'Solution created successfully');
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
        $solutions = HomeSolution::FindorFail($id);

        return view('admin/solutions/edit', compact('solutions'));
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
        $solutions = HomeSolution::FindorFail($id);

        $solutions->update([

            'tittle' => $request->tittle,
            'content' => $request-> content,
       ]);
       return redirect()->route('admin.solution')->with('success', 'Solution Updated successfully');
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
        $solutions = HomeSolution::FindorFail($id);

        $solutions->delete();







        return redirect()->back()->with('success', 'Solution deleted successfully');
    }
}
