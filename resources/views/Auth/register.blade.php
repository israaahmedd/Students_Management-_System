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
        <h2 class="text-center ">Sign up</h2>

        <!-- Login Form -->
        <form method="POST" action="{{route('handelRegister')}}">
            @csrf
            <div class="form-group">
            <label for="password">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email"
                    required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                    placeholder="Enter your password" required>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Register</button>
        </form>


    </div>

</body>

</html>