@extends("frontend.home_master")

@section('title')
	Starlight stores | Shoes for Men 
@endsection

@section("main")



@php

    $shoes = App\Models\Home\Shoes::all();
    


@endphp
 
       <!-- Start Tab Content Wrapper  -->
       <div class="tab-content" id="axilTabContent">
                                <div class="single-tab-content tab-pane fade show active" id="tabone" role="tabpanel" aria-labelledby="tab-one">
                                    <div class="modern-post-activation slick-layout-wrapper axil-slick-arrow arrow-between-side">

                                        <!-- Start Single Post  -->
                                        @foreach($shoes as $shoe)
                                        <div class="slick-single-layout">
                                            <div class="content-block modern-post-style text-center content-block-column">
                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper" href="{{ route('shoes')}}">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="{{$shoe->name}}">{{$shoe->name}}</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h4 class="title"><a href="{{ route('shoes')}}">{{$shoe->title}}</a></h4>
                                                </div>
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('shoes')}}">
                                                        <img src="{{ asset($shoe->team_image)}}" alt="Post Images">
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
                            <!-- End Tab Content Wrapper  -->


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
                </div> -->
                </div>
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
               
                
                <button class="axil-button button-rounded btn-primary">Place order</button>
            </form>

            
        </div>
@endsection