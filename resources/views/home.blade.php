<!DOCTYPE html>
<html>
<head>
    <title>Welcome To LearnVern</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h2 class="card-title text-center">Login</h2>
                    <form action="{{ route('login.submit') }}" method="POST" name="loginForm" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <label for="emailInput">Email address:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   required="required" placeholder="Enter email">
                            <small id="emailError" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="passInput">Password:</label>
                            <input type="password" class="form-control" name="password" id="password"
                                   required="required" placeholder="Password">
                            <small id="passwordError" class="text-danger"></small>
                        </div>
                        <br>
                        <center>
                            <button type="submit" class="btn btn-success">Login</button>
                            <a href="{{ route('google') }}" class="btn btn-info">google</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Your JavaScript validation code here -->

</body>
</html>
