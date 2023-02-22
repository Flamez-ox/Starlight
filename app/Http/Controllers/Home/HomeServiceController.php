<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Image;

class HomeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = HomeService::all();

        return view('/admin/services/index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/services/create');
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
            'Service_tittle' => 'required||max:50',
            'Service_content' => 'required|max:100',
            'Service_image' => 'mimes:png,jpg,jpeg',

        ], [
            'Service_tittle.required' => "Please input Slider tittle",
            'Service_tittle.max' => "Slider tittle must not be more 50 characters",

            'Service_content.required' => "Please input Slider Content",
            'Service_content.max' => "Slider content must not be mor 100 characters"
        ]);
            //END OF VALIDATION

            $service_img = $request->file('Service_image');
            //GETTING OF THE WHOLE IMAGE FILE
    
            $name_gen = hexdec(uniqid()).'.'.$service_img->getClientOriginalExtension();
            //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME
    
            $upload_location = "images/service_images/";
            //LOCATION TO STORE THE UPLOADED IMAGES
    
            Image::make($service_img)->resize(390, 286)->save($upload_location.$name_gen);
            //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE SLIDER
    
            $image_save_location = $upload_location.$name_gen;
            //PUTTING IT IN A VIARABLE
    
    
                HomeService::insert([
                'Service_tittle' => $request->Service_tittle,
                'Service_content' => $request-> Service_content,
                'Service_image' => $image_save_location,
                'created_at'=>Carbon::now(),
                ]);
    
                return redirect()->route('admin.service')->with('success', 'Service created successfully');
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
        $services = HomeService::FindorFail($id);

        return view('admin/services/edit', compact('services'));
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

        $services = HomeService::FindorFail($id);

        $old_img = $request->old_img;

            $service_img = $request->Service_image;

        if($service_img)
        {
           $name_gen = hexdec(uniqid()).'.'.$service_img->getClientOriginalExtension();

           //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

            $upload_location = "images/service_images/";
            //LOCATION TO STORE THE UPLOADED IMAGES

            Image::make($service_img)->resize(390, 286)->save($upload_location.$name_gen);
            //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE SLIDER

            $image_save_location = $upload_location.$name_gen;
             //PUTTING IT IN A VIARABLE

             if (!empty($old_img)) {
                # code...
                unlink($old_img);
             }
             $services->update([

                'Service_tittle' => $request->Service_tittle,
                'Service_content' => $request-> Service_content,
                'Service_image' => $image_save_location,
        
                    ]);
        
                return redirect()->route('admin.service')->with('success', 'Service Updated with image successfully');
        }else{
            $services->update([

                'Service_tittle' => $request->Service_tittle,
                'Service_content' => $request-> Service_content,
           ]);
           return redirect()->route('admin.service')->with('success', 'Service Updated without image successfully');
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
        $services = HomeService::FindorFail($id);


        $del_img = $services->Service_image;

        $unlink = unlink($del_img);

        $services->delete();







        return redirect()->back()->with('success', 'Service deleted successfully');
    }
}
