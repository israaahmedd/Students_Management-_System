@extends ('layout.master')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Department List</h5>
        <div class="table-responsive">
          <table id="department_table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Department Number</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($departments as $department)
              <tr>
                <td>{{ $department->dept_num }}</td>
                <td>
                  <a href="{{ route('dept.show', $department->dept_num) }}" class="btn btn-sm btn-primary">View Details</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection
