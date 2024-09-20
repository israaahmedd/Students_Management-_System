@extends ('layout.head')
@section('style')
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f5f5f5;
    }

    .login-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    .text-center {
        margin-bottom: 15px !important;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        width: 100%;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
@endsection


<body>

    <div class="login-container">
        <h2 class="text-center ">Login</h2>

        <!-- Login Form -->
        <form method="POST" action="{{route('handelLogin')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email"  class="form-control" placeholder="Enter your email" required>
                @error('loginError')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                @error('loginError')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="checkbox" id="remember">
                <label for="remember">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <div class="text-center">
            <a href="#">Forgot Your Password?</a>
        </div>
    </div>

</body>

</html>