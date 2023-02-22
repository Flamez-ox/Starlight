
@extends("admin.admin_master")

@section("main1")

<div class="main-content">
    <div class="page-content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">

                        <div class="card-header">

                            <h4 class="card-title">Create shoe post</h4>
                            <p class="card-title-desc">Fill in the sections</p>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('store.shoes') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                             <label class="form-label" for="validationCustom01">Name</label>
                                                        <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="name" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div>
                                                            @error('section_tittle')
                                                            <span style="color:red ;">
                                                                {{$message}}
                                                            </span>
                                                            @enderror
                                                            
                                                        </div>

                                        </div>

                                        <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Title</label>
                                                        <input type="text" class="form-control" name="title" id="validationCustom01" placeholder="Tittle" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div>
                                                            @error('section_header')
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
                                                            <input class="form-control" name="team_image" type="file" id="formFile">
                                                            <div class="invalid-feedback">
                                                            Please insert image.
                                                            </div>
                                                        <div>
                                                            @error('section_image')
                                                            <span style="color:red ;">
                                                                {{$message}}
                                                            </span>
                                                            @enderror
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                    </div>
                                            <button class="col-sm-3 btn btn-primary" type="submit">Insert Shoe
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