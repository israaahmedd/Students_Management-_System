@extends ('layout.master')
@section('style')
<style>
    .dropdown-menu {
        width: 300px; /* Custom width for the dropdown */
        max-height: 400px; /* Limit height with scrollable content */
        overflow-y: auto; /* Enable scroll if content exceeds height */
    }

    .dropdown-item {
        padding: 10px 15px; /* Spacing inside notification items */
        border-bottom: 1px solid #e9ecef; /* Divider between items */
    }

    .dropdown-item:last-child {
        border-bottom: none; /* Remove divider for the last item */
    }

    .badge-notification {
        font-size: 0.75rem; /* Size of the notification badge */
        padding: 0.3em 0.6em; /* Badge padding for better appearance */
    }

    /* Styling the notification bell icon */
    .fas.fa-bell {
        font-size: 1.5rem;
    }

    /* Adjust the badge position to fit over the bell icon */
    .badge-notification {
        top: 5px; /* Adjust vertical alignment */
        right: 5px; /* Adjust horizontal alignment */
    }
</style>


@endsection
@section('content')
@section('noti')
<ul class="navbar-nav d-flex flex-row me-1">
    <li class="nav-item me-3 me-lg-0">
        <div class="dropdown">
            <!-- Notification Bell Icon with Badge -->
            <a class="me-3 dropdown-toggle hidden-arrow position-relative" href="#" id="navbarDropdownMenuLink"
               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell text-white"></i>
                <span class="badge rounded-pill badge-notification bg-danger position-absolute top-0 start-100 translate-middle">
                    {{ Auth::User()->unreadNotifications->count() }}
                </span>
            </a>
            <!-- Dropdown Menu for Notifications -->
            <ul class="dropdown-menu dropdown-menu-end p-3 shadow-lg" aria-labelledby="navbarDropdownMenuLink" style="width: 300px;">
                @if(Auth::User()->unreadNotifications->count() > 0)
                    @foreach(Auth::User()->unreadNotifications as $notification)
                        <li class="mb-2">
                            <a class="dropdown-item" href="#">hhhh</a>
                        </li>
                    @endforeach
                @else
                    <li class="dropdown-item text-muted">No new notifications</li>
                @endif
            </ul>
        </div>
    </li>
</ul>
@endsection

<div class="row">
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
                <th>Images</th>
                <th>Department</th>



              </tr>
            </thead>
            <tbody>
              @foreach ($data as $student)
          <tr>
          <td>{{ $student->ssn }}</td>
          <td>{{ $student->fname }}</td>
          <td>{{ $student->lname }}</td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->phone }}</td>
          <td>
            @if ($student->img)
        <img src="{{ asset('images/' . $student->img) }}" alt="Student Image"
        style="width: 100px; height: auto;">
      @else
    No image
  @endif
          </td> <!-- Add this column -->
          <td>{{ $student->department->dept_name ?? 'No Department' }}</td>

          <td>
            <a href="{{route('index.show', $student->ssn)}}" class="btn bg bg-primary m-2 text-white">show</a>
            <a href="{{route('index.edit', $student->ssn)}}" class="btn bg bg-success me-2 text-white">edit</a>
            <form action="{{ route('index.destroy', $student->ssn) }}" method="POST" class="d-inline btn">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn bg-danger text-white">
            </form>

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
@section('script')
<script>
  /****************************************
   *       Basic Table                   *
   ****************************************/
  $("#zero_config").DataTable();
</script>