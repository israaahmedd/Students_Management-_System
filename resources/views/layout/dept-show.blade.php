
@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Department Information</h4>
                <span class="badge bg-light text-primary fw-bolder fs-4">{{$department->dept_name}}</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Students in the Department</h5>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($department-> students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Displays the row number -->
                            <td>{{ $student->fname }}</td>  
                            <td>{{ $student->email }}</td>  
                        @endforeach 
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('dept.index')}}" class="btn btn-secondary">Back to Departments</a>
            </div>
        </div>
    </div>
</div>
@endsection