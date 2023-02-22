@extends("admin.admin_master")

@section("main1")

<div class="main-content">
    <div class="page-content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">

                        <div class="card-header">

                            <h4 class="card-title">Create Solutions</h4>
                            <p class="card-title-desc">Fill in the form</p>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('update.solution', $solutions->id) }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                             <label class="form-label" for="validationCustom01">Tittle</label>
                                                        <input type="text" class="form-control" name="tittle" id="validationCustom01" placeholder="Tittle" value="{{$solutions->tittle}}" required>
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
                                                            <textarea name="content"class="form-control" style="height: 250px;">{{$solutions->content}}</textarea>
                                                                
                                        </div>
                                            <div>
                                                @error('service_content')
                                                <span style="color:red ;">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                                
                                            </div>
                                            </div>

                                            
                                    </div>
                                            <button class="col-sm-3 btn btn-primary" type="submit">update solution
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