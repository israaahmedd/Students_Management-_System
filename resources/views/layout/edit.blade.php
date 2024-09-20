@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-12">

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form class="form-horizontal" action="{{ route('index.update', $student->ssn) }}"
                enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                        <label for="ssn" class="col-sm-3 text-end control-label col-form-label">SSN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ssn" placeholder="SSN Here" name="ssn"
                                value="{{ $student->ssn }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Fname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" placeholder="First Name Here"
                                name="fname" value="{{ $student->fname }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Lname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Last Name Here" name="lname"
                                value="{{ $student->lname }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" placeholder="Email Here" name="email"
                                value="{{ $student->email }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" placeholder="Phone Here" name="phone"
                                value="{{ $student->phone }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imgs" class="col-sm-3 text-end control-label col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="imgs" name="imgs" />
                            @if ($student->img)
                                <img src="{{ asset('images/' . $student->img) }}" alt="Student Image" style="width: 100px; height: auto; margin-top: 10px;">
                            @endif
                            @error('imgs')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="department"
                            class="col-sm-3 text-end control-label col-form-label">Department</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="department">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->dept_num }}"
                                        @if($department->dept_num == $student->dept_id) selected @endif>
                                        {{ $department->dept_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection