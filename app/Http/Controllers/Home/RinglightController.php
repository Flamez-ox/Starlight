<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Ringlight;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

use Image;


class RinglightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ringlight()
    {
        
        return view("frontend.pages.ringlight");
    }

    public function index()
    {
        $ringlights = Ringlight::all();

        return view('admin/ringlights/index', compact('ringlights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin/ringlights/create');
    
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
        
        $ringlight_img = $request->file('team_image');
        //GETTING OF THE WHOLE IMAGE FILE

        $name_gen = hexdec(uniqid()).'.'.$ringlight_img->getClientOriginalExtension();
        //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

        $upload_location = "images/ringlight_images/";
        //LOCATION TO STORE THE UPLOADED IMAGES

        Image::make($ringlight_img)->resize(780, 520)->save($upload_location.$name_gen);
        //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE ringlight

        $image_save_location = $upload_location.$name_gen;
        //PUTTING IT IN A VIARABLE


            Ringlight::insert([
            'name' => $request->name,
            'title' => $request-> title,
            'team_image' => $image_save_location,
            'created_at'=>Carbon::now(),
            ]);

            return redirect()->route('admin.ringlight')->with('success', 'Ringlight create successfully');
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
        $ringlights = Ringlight::FindorFail($id);

        return view('admin/ringlights/edit', compact('ringlights'));
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
        $ringlights = Ringlight::FindorFail($id);

        $old_img = $request->old_img;

            $ringlight_img = $request->team_image;

        if($ringlight_img)
        {
           $name_gen = hexdec(uniqid()).'.'.$ringlight_img->getClientOriginalExtension();

           //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

            $upload_location = "images/ringlight_images/";
            //LOCATION TO STORE THE UPLOADED IMAGES

            Image::make($ringlight_img)->resize(780, 520)->save($upload_location.$name_gen);
            //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE SLIDER

            $image_save_location = $upload_location.$name_gen;
             //PUTTING IT IN A VIARABLE

             if (!empty($old_img)) {
                # code...
                unlink($old_img);
             }
             $ringlights->update([

                        'name' => $request->name,
                        'title' => $request-> title,
                        'team_image' => $image_save_location
        
                    ]);
        
                return redirect()->route('admin.ringlight')->with('success', 'Ringlight Update successfully');
        }else{
            $ringlights->update([

                'name' => $request->name,
               'title' => $request-> title,
           ]);
           return redirect()->route('admin.ringlight')->with('success', 'Ringlight Update successfully');
    }

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
        $delete_ringlight = Ringlight::FindorFail($id);


        $del_img = $delete_ringlight->team_image;

        $unlink = unlink($del_img);

        $delete_ringlight->delete();



        return redirect()->back();

    }
}
