@extends("admin.admin_master")

@section("main1")

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">



        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Employee's Registration</h4>
                            <p class="card-title-desc">Fill in the Form</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.homeslider') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Tittle</label>
                                            <input type="text" class="form-control" name="tittle" id="validationCustom01" placeholder="First name" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div>
                                                @error('tittle')
                                                <span style="color:red ;">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom02" class="form-label">Photo</label>
                                                <input class="form-control" name="slider_image" type="file" id="formFile">
                                                <div class="invalid-feedback">
                                                Please insert image.
                                        </div>
                                        <div>
                                                @error('slider_image')
                                                <span style="color:red ;">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <textarea name="content" id="ckeditor-classic"></textarea>
                                                    
                                            </div>
                                            <div>
                                                @error('content')
                                                <span style="color:red ;">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end col -->
                        </div>
                                <button class="col-sm-3 btn btn-primary" type="submit">Submit form
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->

                
                
        </div>


                        
                        
        </div> <!-- container-fluid -->
    </div>
                

</div>

@endsection