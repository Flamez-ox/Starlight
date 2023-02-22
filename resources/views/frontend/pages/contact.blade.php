
@extends("frontend.home_master")

@section('title')
	Starlight stores | Place your order 
@endsection


@section("main")



@php

    $shoes = App\Models\Home\Shoes::all();
    


@endphp


<!-- Start Banner Area  -->
<div class="container-fluid">

    <div class="axil-banner banner-style-1 bg_image bg_image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner">
                            <h1 class="title">Contact Us</h1>
                            <p class="description">Wherever &#38; whenever you need us. We are here for you – contact us for all your support needs.<br /> be it in placing of your order, general queries or information support.</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <!-- End Banner Area  -->
    <div class="container-fluid">
            <div class="row">
            <div class="col-md-6">
                <br>
                <br>
            <h4 class="title mb--10">Place your Ringlight Order</h4>
            <p class="b3 mb--30">Your email address will not be published. All the fields are required.</p>

            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
            @endif
            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
            @endif


            <form action="{{route('send.email')}}" method="POST" class="contact-form contact-form--1 row">
                @csrf
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" class="form-control" type="text" value="{{old('name') }}">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Phone</label>
                    <input name="phone" class="form-control" type="text" value="{{old('phone') }}">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <!-- <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" class="form-control" type="text" value="{{old('email') }}">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div> -->
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Location</label>
                    <input name="location" class="form-control" type="text" value="{{old('location') }}">
                    @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                <label> Quantity </label>
                                    <select name="select" class="form-control" class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="bulk">Bulk</option>
                                    </select>
                                    @error('select')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Inches</label>
                    <input name="inches" class="form-control" type="text" value="{{old('inches') }}">
                    @error('inches') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                
                
                <button class="axil-button button-rounded btn-primary">place your order</button>
            </form>

            
        </div>
    





















            <div class="col-md-6">
                <br>
                <br>
            <h4 class="title mb--10">Place your Shoes Order</h4>
            <p class="b3 mb--30">Your email address will not be published. All the fields are required.</p>

            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
            @endif
            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
            @endif


            <form action="{{route('shoe.order')}}" method="POST" class="contact-form contact-form--1 row">
                @csrf
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Name</label>
                    <input name="namer" class="form-control" type="text" value="{{old('name') }}">
                    @error('namer') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Phone</label>
                    <input name="phoner" class="form-control" type="text" value="{{old('phone') }}">
                    @error('phoner') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <!-- <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Email</label>
                    <input name="emailr" class="form-control" type="text" value="{{old('email') }}">
                    @error('emailr') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div> -->
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Address</label>
                    <input name="address" class="form-control" type="text" value="{{old('address') }}">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                <label> Quantity </label>
                                    <select name="selectr" class="form-control" class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="bulk">Bulk</option>
                                    </select>
                                    @error('selectr')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                    <label for="">Size</label>
                    <input name="size" class="form-control" type="text" value="{{old('size') }}">
                    @error('size') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                <label> Color </label>
                                    <select name="color" class="form-control" class="form-select" >
                                    <option selected></option>
                                        <option value="black">Black</option>
                                        <option value="white">White</option>
                                        <option value="red">Red</option>
                                        <option value="blue">Blue</option>
                                        <option value="others">Others</option>
                                    </select>
                                    @error('color')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
               
                
                    <button class="axil-button button-rounded btn-primary">place your order</button>
            </form>

            
        </div>
    </div>
    </div>


        
       


@endsection