<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
    *{
        margin : 0;
        padding : 0;
        box-sizing : border-box;
    }

    body{
        min-height : 100vh;
        background-color : #fff;
    }

    .navbar{
        width:250px;
        height : 100vh;
        position: fixed;
        margin-left : 0px;
        background-color : #38598b;
        transition : 0.4s;

    }

    .navbar-brand{
        font-size : 25px;
        font-weight : bolder;
        font-family : cursive;
    }
    .nav-link{
        font-size : 1.75rem;
    }

    .nav-link:active,
    .nav-link:focus,
    .nav-link:hover{
        background-color : #ffffff26;
    }

    .dropdown-menu{
        background-color : #38598b;
    }

    #dropdown-item{
        margin-top : 15px;
        font-size : 1.75rem;
    }

    #dropdown-item:hover,
    #dropdown-item:active,
    #dropdown-item:focus
    {
        background-color : #ffffff26;
    }

    .my-container{
        margin-left : 250px;
        transition : 0.4s;
    }

    .active-nav{
        margin-left : -300px;
    }

    .active-cont{
        margin-left : 0;
    }

    .active-btn{
        margin-left : 0;
    }

     .update-btn{
        font-size : 16px;
        width : 100px;
        padding : 10px;
    }

    #menu-btn{
        font-size : 14px;
        background-color : #38598b;
        color : #fff;
    }

    #menu-btn:focus{
        box-shadow : 0 0 0 0.25rem #7952b344;
    }

    #status{
        font-size : 16px;
        margin-bottom : 50px;
    }

   



:root {
	// Basic
	--c-white: #fff;
	--c-black: #000;

	// Greys
	--c-ash: #eaeef6;
	--c-charcoal: #a0a0a0;
	--c-void: #141b22;

	// Beige/Browns
	--c-fair-pink: #FFEDEC;
	--c-apricot: #FBC8BE;
	--c-coffee: #754D42;
	--c-del-rio: #917072;

	// Greens
	--c-java: #1FCAC5;

	// Purples
	--c-titan-white: #f1eeff;
	--c-cold-purple: #a69fd6;
	--c-indigo: #6558d3;
	--c-governor: #4133B7;
}



.cards {
	display: flex;
	flex-wrap: wrap;
	align-items: flex-start;
	flex-wrap: wrap;
	justify-content: center;
	gap: 2.5rem;
	width: 90%;
	max-width: 1000px;
	margin: 10vh auto;
}

.card {
	border-radius: 16px;
	box-shadow: 0 30px 30px -25px rgba(#4133B7, .25);
}

.information {
	background-color: var(--c-white);
	padding: 1.5rem;

	.tag {
		display: inline-block;
		background-color: var(--c-titan-white);
		color: var(--c-indigo);
		font-weight: 600;
		font-size: 1.25rem;
		margin-bottom : 10px;
		line-height: 1;
		border-radius: 6px;
		& + * {
			margin-top: 1rem;
		}
	}

	.title {
		font-size: 1.5rem;
		color: var(--c-void);
		line-height: 1.25;
		& + * {
			margin-top: 1rem;
		}
	}

	.info {
		color: var(--c-charcoal);
		& + * {
			margin-top: 1.25rem;
		}
	}

	.button {
		font: inherit;
		line-height: 1;
		background-color: var(--c-white);
		border: 2px solid var(--c-indigo);
		color: var(--c-indigo);
		padding: 0.5em 1em;
		border-radius: 6px;
		font-weight: 500;
		display: inline-flex;
		align-items: center;
		justify-content: space-between;
		gap: 0.5rem;

	}

	.button:hover{
		transition : 0.4s;
		background :var(--c-indigo);
		color: white;
	}
	
}


	.title {
		font-weight: 600;
		font-size: 1.25rem;
		color: var(--c-coffee);
		& + * {
			margin-top: .75rem;
		}
	}
	
	.info {
        
		& + * {
			margin-top: 1rem;
		};

	}


</style>

<body>

    <nav class="navbar navbar-expand d-flex flex-column align-item-start" 
         id="sidebar">
         <a href="/" class="navbar-brand text-light mt-5">
            <div>LARAPROJECT</div>
         </a>
         <ul class="navbar-nav d-flex flex-column mt-5 w-100">
          
            <li class="nav-item w-100">
                <a href="{{url('agents')}}" class="nav-link text-light pl-4 text-decoration-none">
                    <i class='bx bx-user'></i>
                    <span>Agents</span>
                </a>
            </li>

            <li class="nav-item mt-5 w-100">
                <a href="{{url('agents/invite')}}" class="nav-link text-light pl-4 text-decoration-none">
                    <i class='bx bx-send'></i>
                    <span>Invit an Agent</span>
                </a>
            </li>

             <li class="nav-item mt-5 w-100">
              <a href="{{url('tasks')}}" class="nav-link text-light pl-4 text-decoration-none">
                <i class='bx bxs-calendar'></i>
                <span>Tasks</span>
              </a>
            </li>

            <li class="nav-item mt-5 w-100">
              <a href="{{url('stats')}}" class="nav-link text-light pl-4 text-decoration-none">
                <i class='bx bx-stats'></i>
                <span>statistics</span>
              </a>
            </li>

            <li class="nav-item mt-5 w-100 dropdown">
                <a  href="#" class="nav-link text-light pl-4 text-decoration-none dropdown-toggle"
                    id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    <i class='bx bxs-user-account' ></i>
                    <span>Account</span>
                </a>
                <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                    <li>
                        <a id="dropdown-item" class="text-decoration-none text-light pl-4 p-2" href="#">
                           <i class='bx bx-user'></i>
                           <span>{{Auth::user()->name}}</span> 
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"id="dropdown-item" 
                        class="dropdown-item text-decoration-none text-light pl-4 p-2" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        >
                        <i class='bx bx-log-out'></i>
                        <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
         </ul>

    </nav>

    <section class="p-4 my-container">
        <button class="btn my-5" id="menu-btn">Toggle Sidebar</button>
        
    <div class="cards">

	<article class="information [ card ]" style="min-width : 500px;">
		<span class="tag"><b>{{$task->status}}</b></span>
		<h2 class="title"> <b>{{$task->title}}</b></h2>
		<p class="info" style="font-size : 20px;">{{$task->comment}}</p>
		<a class="button"href="{{url('tasks')}}"
            style="text-decoration:none;
                    font-size : 14px;
                    padding : 10px;
                    "
        >Go back</a>
	</article>
	
</div>
        
                        
    </section>


    <script>
        var menu_btn = document.querySelector('#menu-btn');
        var sidebar = document.querySelector('#sidebar');
        var container = document.querySelector('.my-container');

        menu_btn.addEventListener("click",()=>{
            sidebar.classList.toggle("active-nav");
            container.classList.toggle("active-cont");
            menu_btn.classList.toggle("active-btn");
        })
    </script>
    

</body>
</html>
