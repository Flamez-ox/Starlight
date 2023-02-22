@extends("admin.admin_master")

@section("main1")

<div class="container-fluid">

        <!-- start page title -->
        <div class="main-content">
       

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Services Tables</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.service.create') }}">Add Service</a></li>
                                    <li class="breadcrumb-item active">Service Tables</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                <div class="card-title-desc">
                                @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{session('success')}}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                @endif
                                </div>
                            </div>

                            <?php 
                            
                            $mark = 1;
                            ?>

                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Images</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    
                                    <tr>
                                    @foreach($services as $service)
                                        <td>{{ $mark++}}</td>
                                        <td>{{$service->Service_tittle}}</td>
                                        <td>{{$service->Service_content}}</td>
                                        <td><img src="{{ asset($service->Service_image) }}" alt="Service image" width="50"></td>
                                        <td>
                                        <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">Action
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('edit.service', $service->id ) }}">Edit</a>
                                                    <a class="dropdown-item" href="{{ route('destroy.service', $service->id ) }}">Delete</a>
                                                </div>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end cardaa -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->





        </div>
        <!-- end page title -->

</div> 

@endsection