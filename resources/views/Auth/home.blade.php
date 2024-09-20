@include ('layout.head')
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <!-- Brand/Logo -->
    <a class="navbar-brand fw-bold" href="#">YourApp</a>
    
    <!-- Toggler Button for Mobile View -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- Login Link -->
        <li class="nav-item">
          <a class="nav-link btn btn-outline-primary px-3 me-2" href="{{ route('index.login') }}">
            Login
          </a>
        </li>
        
        <!-- Register Link -->
        <li class="nav-item">
          <a class="nav-link btn btn-primary px-3 text-white" href="{{ route('index.register') }}">
            Register
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

