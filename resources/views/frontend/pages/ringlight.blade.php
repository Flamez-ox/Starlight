@extends("frontend.home_master")

@section('title')
	Starlight stores | Ringlights to make your entertaining videos and pictures wonderful 
@endsection

@section("main")



@php

    $ringlights = App\Models\Home\Ringlight::all();
    


@endphp
 
       <!-- Start Tab Content Wrapper  -->
       <div class="tab-content" id="axilTabContent">
                                <div class="single-tab-content tab-pane fade show active" id="tabone" role="tabpanel" aria-labelledby="tab-one">
                                    <div class="modern-post-activation slick-layout-wrapper axil-slick-arrow arrow-between-side">

                                        <!-- Start Single Post  -->
                                        @foreach($ringlights as $ringlight)
                                        <div class="slick-single-layout">
                                            <div class="content-block modern-post-style text-center content-block-column">
                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper" href="{{ route('ringlights') }}">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="{{$ringlight->name}}">{{$ringlight->name}}</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h4 class="title"><a href="{{ route('ringlights') }}">{{$ringlight->title}}</a></h4>
                                                </div>
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('ringlights') }}">
                                                        <img src="{{ asset($ringlight->team_image)}}" alt="Post Images">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- End Single Post  -->


                                        
                                    </div>
                                </div>

                                <div class="single-tab-content tab-pane fade" id="tabthree" role="tabpanel" aria-labelledby="tab-three">
                                    <div class="modern-post-activation slick-layout-wrapper axil-slick-arrow arrow-between-side">

                                    </div>
                                </div>
       </div>   
                                        
                                    </div>
                                </div>
                            </div>

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
                
                
               
                
                    <button class="axil-button button-rounded btn-primary">Place order</button>
            </form>

            
        </div>
                            <!-- End Tab Content Wrapper  -->
@endsection