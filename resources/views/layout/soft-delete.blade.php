@extends ('layout.master')
@section('content')
<div class="row">
@if(Session::has('msg'))
        <div class="alert-success">
            {{Session::get('msg')}}
        </div>
        @endif
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
          <table id="zero_config" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>SSN</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>



              </tr>
            </thead>
            <tbody>
              @forelse ($data as $student)
          <tr>
          <td>{{ $student->ssn }}</td>
          <td>{{ $student->fname }}</td>
          <td>{{ $student->lname }}</td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->phone }}</td>
          <td>{{ $student->dept_id }}</td>

          <td>
          <form action="{{ route('index.restore', $student->ssn) }}" method="POST" class="d-inline btn">
            @csrf
          
            <input type="submit" value="Restore" class="btn bg bg-success me-2 text-white">
            </form>

            <!-- <a href="{{route('index.restore', $student->ssn)}}" class="btn bg bg-success me-2 text-white">restore</a> -->
            <form action="{{ route('index.forceDelete', $student->ssn) }}" method="POST" class="d-inline btn">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn bg-danger text-white">
            </form>

          </td>
          </tr>


          @empty
            <tr>
                <td colspan="6" class="text-center ">No archived students found.</td>
            </tr>
        @endforelse


            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  /****************************************
   *       Basic Table                   *
   ****************************************/
  $("#zero_config").DataTable();
</script>