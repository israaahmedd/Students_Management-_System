@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Student Information</h4>
            </div>
            <form class="form-horizontal p-4" enctype="multipart/form-data" method="post">
                @csrf
                @method('get')
                <div class="card-body">
                    <!-- SSN Field -->
                    <div class="form-group row mb-3">
                        <label for="ssn" class="col-sm-3 col-form-label text-end">SSN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ssn" placeholder="Enter SSN" name="ssn"
                                value="{{ $data->ssn }}" readonly/>
                        </div>
                    </div>

                    <!-- First Name Field -->
                    <div class="form-group row mb-3">
                        <label for="fname" class="col-sm-3 col-form-label text-end">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name"
                                name="fname" value="{{ $data->fname }}" readonly/>
                        </div>
                    </div>

                    <!-- Last Name Field -->
                    <div class="form-group row mb-3">
                        <label for="lname" class="col-sm-3 col-form-label text-end">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name"
                                name="lname" value="{{ $data->lname }}" readonly/>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group row mb-3">
                        <label for="email" class="col-sm-3 col-form-label text-end">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                name="email" value="{{ $data->email }}" readonly/>
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div class="form-group row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label text-end">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number"
                                name="phone" value="{{ $data->phone }}" readonly />
                        </div>
                    </div>

                    <!-- Department Field -->
                     
                    <div class="form-group row mb-3">
                        <label for="department" class="col-sm-3 col-form-label text-end">Department</label>
                        <div class="col-sm-9">
                          <a href="{{route('dept.index')}}"> <input type="text" class="form-control" id="department" name="department"
                          value="{{ $data->department->dept_name }}" readonly /></a> 
                        </div>
                    </div>
                </div>

                <!-- Form Footer -->
                
            </form>
        </div>
    </div>
</div>
@endsection
