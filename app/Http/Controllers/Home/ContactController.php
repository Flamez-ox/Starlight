<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Contact::insert([
            'name' => $request->name,
            'phone' => $request-> phone,
            'email' => $request-> email,
            'select' => $request-> select,
            'inches' => $request-> inches,
            'message' => $request-> message,
            'created_at'=>Carbon::now(),
            ]);

            return redirect()->route('contact')->with('success', 'Thank you for contact us. we will contact you shortly.');
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

    public function send(Request $request)

    {
         $request->validate([
            'name'=>'required',
            'phone'=>'required',
            // 'email'=>'required|email',
            'select'=>'required',
            'inches'=>'required',
            'location'=>'required',
        ]);

            if ($this->isOnline()) {
                $mail_data = [
                    'recipient'=>'mail.varengold@gmail.com',
                    'fromName'=>$request->name,
                    'fromEmail'=>$request->email,
                    'subject'=>$request->phone,
                    'phone'=>$request->phone,
                    'select'=>$request->select,
                    'inches'=>$request->inches,
                    'location'=>$request->location,
        
                ];
                Mail::send('email.email',$mail_data, function ($message) use ($mail_data) {
                    $message->to($mail_data['recipient'])
                            ->from($mail_data['recipient'], $mail_data['fromName'])
                            ->subject($mail_data['subject']);
                });

                return redirect()->back()->with('success', 'Email sent!');
            }else {
                return redirect()->back()->withInput()->with('error', 'Check your internet connection');
            }
    }



    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        }else {
            return false;
        }
    }


    public function order(Request $request)
    {
        $request->validate([
            'namer'=>'required',
            'phoner'=>'required',
            // 'emailr'=>'required|email',
            'address'=>'required',
            'selectr'=>'required',
            'size'=>'required',
            'color'=>'required',
        ]);

        if ($this->isOnline()) {

            $mail = [
                'recipient'=>'mail.varengold@gmail.com',
                'fromName'=>$request->namer,
                'fromEmail'=>$request->emailr,
                'address'=>$request->address,
                'subject'=>$request->phoner,
                'select'=>$request->selectr,
                'size'=>$request->size,
                'color'=>$request->color,
    
            ];
            Mail::send('email.shoeorder',$mail, function ($message) use ($mail) {
                $message->to($mail['recipient'])
                        ->from($mail['recipient'], $mail['fromName'])
                        ->subject($mail['subject']);
            });

            return redirect()->back()->with('success', 'Email sent!');
            }else{
        return redirect()->back()->withInput()->with('error', 'Check your internet connection');

    }



 }

}
