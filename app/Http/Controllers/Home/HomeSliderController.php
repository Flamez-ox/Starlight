<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeSlider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

use Image;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HomeSlider::all();

        return view('admin/sliders/index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin/sliders/create');
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

            'tittle' => 'required|unique:home_sliders|max:50',
            'content' => 'required|max:100',
            'slider_image' => 'required|mimes:png,jpg,jpeg',
        ], [
            'tittle.required' => "Please input Slider tittle",
            'tittle.unique' => "Slider tittle already exist",
            'tittle.max' => "Slider tittle must not be more 50 characters",

            'content.required' => "Please input Slider Content",
            'content.max' => "Slider content must not be more 100 characters"
        ]);
            //END OF VALIDATION
        
        $slider_img = $request->file('slider_image');
        //GETTING OF THE WHOLE IMAGE FILE

        $name_gen = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
        //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

        $upload_location = "images/sliders_images/";
        //LOCATION TO STORE THE UPLOADED IMAGES

        Image::make($slider_img)->resize(1920, 714)->save($upload_location.$name_gen);
        //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE SLIDER

        $image_save_location = $upload_location.$name_gen;
        //PUTTING IT IN A VIARABLE


            HomeSlider::insert([
            'tittle' => $request->tittle,
            'content' => $request-> content,
            'slider_image' => $image_save_location,
            'created_at'=>Carbon::now(),
            ]);

            return redirect()->route('admin.home.homeslider')->with('success', 'Slider create successfully');
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
    public function edit ($id)
    {
       
        $edit_homeslider = HomeSlider::FindorFail($id);

        return view('admin/sliders/edit', compact('edit_homeslider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response~
     */
    public function update(Request $request, $id)
    {
        $edit_homeslider = HomeSlider::FindorFail($id);

       

        $validatedata = $request->validate([

            'tittle' => 'required||max:50',
            'content' => 'required|max:100',
            'slider_image' => 'mimes:png,jpg,jpeg',

        ], [
            'tittle.required' => "Please input Slider tittle",
            'tittle.max' => "Slider tittle must not be more 50 characters",

            'content.required' => "Please input Slider Content",
            'content.max' => "Slider content must not be more 100 characters"
        ]);
            //END OF VALIDATION


            $old_img = $request->old_img;

            $slider_img = $request->slider_image;

        if($slider_img)
        {
           $name_gen = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();

           //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

            $upload_location = "images/sliders_images/";
            //LOCATION TO STORE THE UPLOADED IMAGES

            Image::make($slider_img)->resize(1920, 714)->save($upload_location.$name_gen);
            //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE SLIDER

            $image_save_location = $upload_location.$name_gen;
             //PUTTING IT IN A VIARABLE

             if (!empty($old_img)) {
                # code...
                unlink($old_img);
             }
             $edit_homeslider->update([

                         'tittle' => $request->tittle,
                        'content' => $request-> content,
                        'slider_image' => $image_save_location
        
                    ]);
        
                return redirect()->route('admin.home.homeslider')->with('success', 'Slider Update successfully');
        }else{
            $edit_homeslider->update([

                'tittle' => $request->tittle,
               'content' => $request-> content,
           ]);
           return redirect()->route('admin.home.homeslider')->with('success', 'Slider Update successfully');
        }





        //     $new_img = unlink($slider_img);

        //     $new_img = $request->file('slider_image');
        // //GETTING OF THE WHOLE IMAGE FILE

        // $name_gen = hexdec(uniqid()).'.'.$new_img->getClientOriginalExtension();
        // //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

        // $upload_location = "images/sliders_images/";
        // //LOCATION TO STORE THE UPLOADED IMAGES

        // Image::make($new_img)->resize(1920, 714)->save($upload_location.$name_gen);
        // //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE SLIDER

        // $image_save_location = $upload_location.$name_gen;
        // //PUTTING IT IN A VIARABLE

        //     $edit_homeslider->update([

        //         'tittle' => $request->tittle,
        //         'content' => $request-> content,
        //         'slider_image' => $image_save_location

        //     ]);

        // return redirect()->route('admin.home.homeslider')->with('success', 'Slider Update successfully');
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
        $delete_homeslider = HomeSlider::FindorFail($id);


        $del_img = $delete_homeslider->slider_image;

        $unlink = unlink($del_img);

         $delete_homeslider->delete();







        return redirect()->back();

    }
}
