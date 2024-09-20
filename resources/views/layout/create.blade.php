@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('msg'))
        <div class="alert-success">
            {{Session::get('msg')}}
        </div>
        @endif
        <div class="card">
            <form class="form-horizontal" action="{{ route('index.store')}}"  enctype="multipart/form-data"
                method="post">
                @csrf

                <div class="card-body">
                    <div class="form-group row">
                        <label for="ssn" class="col-sm-3 text-end control-label col-form-label">SSN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ssn" placeholder="SSN Here" name="ssn"
                                value="{{ old('ssn') }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Fname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname"
                                placeholder="First Name Here" name="fname" value="{{ old('fname') }}" />
                            @error('fname')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Lname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname"
                                placeholder="Last Name Here" name="lname" value="{{ old('lname') }}" />
                            @error('lname')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-end control-label col-form-label"
                            name="email">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Email Here" name="email" value="{{ old('email') }}" />
                            @error('email')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                placeholder="Phone Here" name="phone" value="{{ old('phone') }}" />
                            @error('phone')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="department" class="col-sm-3 text-end control-label col-form-label">Department</label>
                        <div class="col-sm-9">
                            <select name="department">
                                @foreach ($departments as $department)
                                    <option value="{{$department->dept_num}}">
                                        {{$department->dept_name}}

                                    </option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="img" class="col-sm-3 text-end control-label col-form-label"
                            name="img">image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control " id="img"
                                 name="img">
                              
                            @error('img')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror

                        </div>
                    </div> 
                  
                    <!-- Additional fields omitted for brevity -->
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection