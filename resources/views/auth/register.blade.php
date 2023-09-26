<!DOCTYPE html>
<html lang="en">
<head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraProject</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles --> 
        <style>
            *{
                margin : 0;
                padding : 0;
                box-sizing : border-box;
                font-family : century gothic;
            }


            header{
                position: relative;
                top : 0;
                width : 100%;
                padding : 30px 100px;
                display : flex;
                justify-content : space-between;
                align-items : center;
            }

            header .logo{
                position: relative;
                color : #000;
                font-size : 30px;
                text-decoration : none;
                font-weight : 800;
                letter-spacing : 1px;
            }

            header .navigation a{
                color : #000;
                text-decoration : none;
                font-weight : 500;
                letter-spacing : 1px;
                padding : 2px 15px;
                border-radius : 20px;
                transition : 0.3s;
                
            }

            header .navigation a:not(:last-child){
                margin-right : 30px;
            }

            header .navigation a:hover{
                background : #38598b;
                width : 20px;
                padding : 20px;
                color : white;
            }

            .divider:after,
            .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
            }
            .h-custom {
            height: calc(100% - 73px);
            }
            @media (max-width: 450px) {
            .h-custom {
            height: 100%;
            }
            }

        </style>
</head>
<body>

    <section>
        <header>
            <h2><a href="/" class="logo">LARAPROJECT</a></h2>
           @if (Route::has('login'))
            <div class="navigation">
             @auth   
           
             @if (Auth::user()->user_type === 'admin')
            <a href="{{ url('/clients') }}">ADMIN DASHBOARD</a>
            @endif

             @if (Auth::user()->user_type === 'client')
            <a href="{{ url('/responsables') }}">CLIENT DASHBOARD</a>
            @endif

             @if (Auth::user()->user_type === 'responsable')
            <a href="{{ url('/agents') }}">RESPONSABLE DASHBOARD</a>
            @endif

             @if (Auth::user()->user_type === 'agent')
            <a href="{{ url('/agent-tasks') }}">AGENT SPACE</a>
            @endif

            @else
            <a href="{{ route('login') }}">LOGIN</a>
            @endauth
            </div>
             @endif
        </header>

       <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 my-5">
        <form method="POST" action="{{ route('accept')}}">
            @csrf

            <input type="hidden" value="client" name="user_type">

            <input type="hidden" value="{{ $company->id }}" name="company_id">


            <!-- Name input -->
          <div class="form-outline mb-4">
            <input type="text" id="name" class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="Enter a Name" name="name" value="{{ old('name') }}"
              required autocomplete="name" autofocus required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            <label class="form-label" for="form3Example3">Name</label>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input readonly value="{{ $invite->email }}" type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="Enter a valid email address" name="email" value="{{ old('email') }}"
              required autocomplete="email" autofocus >
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            <label class="form-label" for="form3Example3">Email address</label>
          </div>


          <!-- Password input -->
          <div class="form-outline mb-3">

            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
              placeholder="Enter password" />
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            <label class="form-label" for="form3Example4">Password</label>
          </div> 

            <!-- Confirm Password input -->
          <div class="form-outline mb-3">
            <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
            <label for="form3Example4" class="fform-label">Confirm Password</label>
         </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Register
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

    </section>
    
</body>
</html>