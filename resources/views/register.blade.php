<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>register</title>
</head>
<body>


{{-- success message --}}
@include('sweetalert::alert')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            
            {{-- validation errors --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <p>Register a new membership</p>
            <form action="{{url("postregister")}}" method="POST" class="form-group">
                @csrf
                <input type="text" name="name" class="form-control" placeholder="name">
                <input type="email" name="email" class="form-control" placeholder="email">
                <input type="number" name="phone" class="form-control" placeholder="phone">
                <input type="password" name="password" class="form-control" placeholder="password">
                <input type="password" name="password_confirmation" class="form-control" placeholder="password_confirmation">
                <input type="submit" name="register" class="btn btn-success" value="register">
                <div>
                    <a href={{url("login")}}>login page</a>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
