@extends("admin.admin_master")

@section("main1")

<div class="main-content">
    <div class="page-content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">

                        <div class="card-header">

                            <h4 class="card-title">Update Services</h4>
                            <p class="card-title-desc">Fill in the form</p>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('update.service', $services->id) }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                                @csrf

                                <input type="hidden" name="old_img" value="{{$services->Service_image}}">

                                <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                             <label class="form-label" for="validationCustom01">Tittle</label>
                                                        <input type="text" class="form-control" name="Service_tittle" id="validationCustom01" placeholder="Tittle" value="{{$services->Service_tittle}}" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div>
                                                            @error('Service_tittle')
                                                            <span style="color:red ;">
                                                                {{$message}}
                                                            </span>
                                                            @enderror
                                                            
                                                        </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                             <label class="form-label" for="validationCustom01">Content</label>
                                                            <textarea name="Service_content"class="form-control" style="height: 250px;">{{$services->Service_content}}</textarea>
                                                                
                                        </div>
                                            <div>
                                                @error('service_content')
                                                <span style="color:red ;">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                                
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom02" class="form-label">Photo</label>
                                                            <input class="form-control" name="Service_image" type="file" id="formFile">
                                                            <div class="invalid-feedback">
                                                            Please insert image.
                                                            </div>
                                                        <div>
                                                            @error('service_image')
                                                            <span style="color:red ;">
                                                                {{$message}}
                                                            </span>
                                                            @enderror
                                                            
                                                        </div>
                                                        <img width="100" src="{{ asset($services->Service_image) }}" name="old_img" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                    </div>
                                            <button class="col-sm-3 btn btn-primary" type="submit">Update service
                                            </button>
                                </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection