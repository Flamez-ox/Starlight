<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeSection;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Image;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = HomeSection::all();

        return view('admin/sections/index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/sections/create');
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

            'section_tittle' => 'required|unique:home_sections|max:50',
            'section_header' => 'required|unique:home_sections|max:50',
            'section_content' => 'required|max:200',
            'section_flaticon' => 'required|unique:home_sections|max:20',
            'section_h4' => 'required|unique:home_sections|max:100',
            'section_image' => 'required|mimes:png,jpg,jpeg',
        ],
         [
            'section_tittle.required' => "Please input section tittle",
            'section_tittle.unique' => "section tittle already exist",
            'section_tittle.max' => "section tittle must not be more 50 characters",

            'section_header.required' => "Please input section header",
            'section_header.unique' => "header already exist",
            'section_header.max' => "header must not be more 50 characters",

            'section_content.required' => "Please input Section Content",
            'section_content.max' => "Section content must not be more 200 characters",

            'flaticon.required' => "Please input section flaticon",
            'flaticon.unique' => "section flaticon already exist",
            'flaticon.max' => "section flaticon must not be more 20 characters",

            'section_h4.required' => "Please input section flaticon",
            'section_h4.unique' => "section flaticon already exist",
            'section_h4.max' => "section flaticon must not be more 100 characters",

            'section_image.required' => "Please put in the section image",
            'section_image.mimes' => "Image is not supported",
        ]);

        $section_img = $request->file('section_image');

        $name_gen = hexdec(uniqid()).'.'.$section_img->getClientOriginalExtension();

        $upload_location = "images/sections_images/";

        Image::make($section_img)->resize(531, 660)->save($upload_location.$name_gen);

        $image_save_location = $upload_location.$name_gen;

        HomeSection::insert([

            'section_tittle' => $request->section_tittle,
            'section_header' => $request->section_header,
            'section_content' => $request-> section_content,
            'section_flaticon' => $request-> section_flaticon,
            'section_h4' => $request->section_h4,
            'section_image' => $image_save_location,
            'created_at'=>Carbon::now(),

        ]);

        return redirect()->route('admin.section')->with('success', 'Section create successfully');
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
        
        $sections = HomeSection::FindorFail($id);

        return view('admin/sections/edit', compact('sections'));
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
        $sections = HomeSection::FindorFail($id);
        //
        $old_image = $request->old_img;

            $section_img = $request->section_image;

        if($section_img)
        {
           $name_gen = hexdec(uniqid()).'.'.$section_img->getClientOriginalExtension();

           //CHANING THE NAME OF THE  FILE TO A UNIQUE NAME

            $upload_location = "images/sections_images/";
            //LOCATION TO STORE THE UPLOADED IMAGES

            Image::make($section_img)->resize(531, 660)->save($upload_location.$name_gen);
            //REZING THE IMAGE TO THE SIZE OF THE TEMPLATE SECTION

            $image_save_location = $upload_location.$name_gen;
             //PUTTING IT IN A VIARABLE

            //  if (!empty($old_image)) {
            //     # code...
            //         unlink($old_image);
            //  }
             $sections->update([

                'section_tittle' => $request->section_tittle,
                'section_header' => $request->section_header,
                'section_content' => $request-> section_content,
                'section_flaticon' => $request-> section_flaticon,
                'section_h4' => $request->section_h4,
                'section_image' => $image_save_location
        
                    ]);
        
                return redirect()->route('admin.section')->with('success', 'Section Update successfully');
        }else{
            $sections->update([

                'section_tittle' => $request->section_tittle,
            'section_header' => $request->section_header,
            'section_content' => $request-> section_content,
            'section_flaticon' => $request-> section_flaticon,
            'section_h4' => $request->section_h4
           ]);
           return redirect()->route('admin.section')->with('success', 'Section Update successfully');
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
        $sections = HomeSection::FindorFail($id);
        $del_img = $sections->section_image;
         unlink($del_img);
        $sections->delete();


        return redirect()->back();
    }
}
