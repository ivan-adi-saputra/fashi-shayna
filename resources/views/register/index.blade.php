<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up | Shayna</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/signin/css/style.css">

	</head>
	<body>
	<section class="ftco-section-up">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(/signin/images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
			      	    </div>

						<form action="{{ route('register.store') }}" method="POST" class="signin-form">
                        @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Name</label>
			      			<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name" required value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
			      		</div>
			      		<div class="form-group mb-3">
			      			<label class="label" for="username">Username</label>
			      			<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
                              @error('username')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
			      		</div>
			      		<div class="form-group mb-3">
			      			<label class="label" for="email">Email</label>
			      			<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Example@gmail.com" required value="{{ old('email') }}">
                              @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
			      		</div>
		                <div class="form-group mb-3">
		            	    <label class="label" for="password">Password</label>
		                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
		                </div>
		                <div class="form-group">
		            	    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
		                </div>
                        </form>
                            <p class="text-center">I am already member? <a href="{{ route('login') }}">Sign In</a></p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>

	<script src="/signin/js/jquery.min.js"></script>
    <script src="/signin/js/popper.js"></script>
    <script src="/signin/js/bootstrap.min.js"></script>
    <script src="/signin/js/main.js"></script>

	</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="signin/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="signin/css/style.css">
</head>
<body>

    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="{{ route('register.store') }}" method="POST" class="register-form" id="register-form">
                        @csrf
                            <div class="form-group @error('name') is-invalid @enderror">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Example@gmail.com"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <button type="submit" class="form-group form-button form-submit">Register</button>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="signin/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="signin/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html> --}}