<!doctype html>
<html lang="en">
  <head>
  	<title>Sign In | Shayna</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/signin/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(/signin/images/bg-1.jpg);">
                    </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success" role="alert"> 
                                    {{ session('success') }}
                                </div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger" role="alert"> 
                                    {{ session('error') }}
                                </div>
                            @endif
							<form action="{{ route('authenticate') }}" method="POST" class="signin-form">
                            @csrf
			      		        <div class="form-group mb-3">
			      			        <label class="label" for="email">Email</label>
			      			        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Example@gmail.com" name="email" required value="{{ old('email') }}">
			      		        </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a href="{{ route('register') }}">Sign Up</a></p>
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

