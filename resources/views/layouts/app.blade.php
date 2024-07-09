<!doctype html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>@yield('title')</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	    <link href="assets/css/app.css?v=1.0" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	    <style type="text/css">
	    	.fw{
	    		padding: 8px;
	    	}
	    </style>
        <script>
            function logout()
            {
                document.getElementById('logout-form').submit();
            }
        </script>
  	</head>
  	<body>
  		<div class="container-fluid" style="background-color: #3f69a8;width:100%">
		  	<div class="container">
			    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom top">
			      <a href="./" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
			        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
			        <span class="fs-4 text-white">Campus E-Voting System</span>
			      </a>
                  <form method="post" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                  </form>
			      <ul class="nav nav-pills">
			        <li class="nav-item">
		              <a href="#" class="nav-link text-white"><i class="fas fa-poll-h fw"></i>Polls</a>
		            </li>
		            @auth
                    <li class="nav-item">
		            	<a href="#" onclick="logout()"  class="nav-link text-white"><i class="fas fa-unlock fw"></i>Logout</a>
		            </li>
                    @endauth

		        	@guest
                    <li class="nav-item">
		        		<a href="#" class="nav-link text-white"><i class="fas fa-lock fw"></i>Login</a>
		        	</li>
                    @endguest

			      </ul>
			    </header>
			</div>
		</div>
	    <div class="container my-5">

        @yield('content')

    </div>


    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="./" class="nav-link px-2 text-body-secondary">Home</a></li>
      </ul>
      <p class="text-center text-body-secondary">© {{ date('Y') }} Victor Edegbo</p>
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
