<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Shoes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;


use Image;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function shoes()
    {
        
        return view("frontend.pages.shoes");
    }  
    public function contact()
    {
        
        return view("frontend.pages.contact");
    }  


    public function index()
    {
        //
        $shoes = Shoes::all();

        return view('admin/shoes/index', compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
            return view('admin/shoes/create');
        
        
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

        $shoe_img = $request->file('team_image');
        //GETTING OF THE WHOLE IMAGE FILE

        $name_gen = hexdec(uniqid()).'.'.$shoe_img->getClientOriginalExtension();
        //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

        $upload_location = "images/shoe_images/";
        //LOCATION TO STORE THE UPLOADED IMAGES

        Image::make($shoe_img)->resize(780, 520)->save($upload_location.$name_gen);
        //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE ringlight

        $image_save_location = $upload_location.$name_gen;
        //PUTTING IT IN A VIARABLE


        Shoes::insert([
            'name' => $request->name,
            'title' => $request-> title,
            'team_image' => $image_save_location,
            'created_at'=>Carbon::now(),
            ]);

            return redirect()->route('admin.shoes')->with('success', 'Ringlight create successfully');
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
        $shoes = Shoes::FindorFail($id);

        return view('admin/shoes/edit', compact('shoes'));
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
        $shoes = Shoes::FindorFail($id);

        $old_img = $request->old_img;

            $shoe_img = $request->team_image;

        if($shoe_img)
        {
           $name_gen = hexdec(uniqid()).'.'.$shoe_img->getClientOriginalExtension();

           //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

            $upload_location = "images/shoe_images/";
            //LOCATION TO STORE THE UPLOADED IMAGES

            Image::make($shoe_img)->resize(780, 520)->save($upload_location.$name_gen);
            //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE SLIDER

            $image_save_location = $upload_location.$name_gen;
             //PUTTING IT IN A VIARABLE

             if (!empty($old_img)) {
                # code...
                unlink($old_img);
             }
             $shoes->update([

                        'name' => $request->name,
                        'title' => $request-> title,
                        'team_image' => $image_save_location
        
                    ]);
        
                return redirect()->route('admin.shoes')->with('success', 'Shoe Update successfully');
        }else{
            $shoes->update([

                'name' => $request->name,
               'title' => $request-> title,
           ]);
           return redirect()->route('admin.shoes')->with('success', 'Shoe Update successfully');
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
        $delete_shoe = Shoes::FindorFail($id);


        $del_img = $delete_shoe->team_image;

        $unlink = unlink($del_img);

        $delete_shoe->delete();



        return redirect()->back();
    }
}
