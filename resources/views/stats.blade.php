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
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

    table{
        margin-top : 20px;
        font-size : 14px;
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

     .btn{
        font-size : 14px;
    }

    #menu-btn{
        background-color : #38598b;
        color : #fff;
    }

    #menu-btn:focus{
        box-shadow : 0 0 0 0.25rem #7952b344;
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


        <div class="container mt-5 display-6" >
            <div class="row" >

                <div class="col"> 
                    <div class="row">
                        <div class="col-6">
                            <p class="ms-5">{{$tasks_number}}</p>
                            <p class="ms-4 lead">Total Tasks</p>
                        </div>
                        <div class="col-6 display-1"><i class='bx bx-task'></i></div>
                    </div>
                </div>

                <div class="col"> 
                    <div class="row">
                        <div class="col-6">
                            <p class="ms-5">{{$your_tasks_number}}</p>
                            <p class="ms-4 lead">Your Tasks</p>
                        </div>
                        <div class="col-6 display-1"><i class='bx bx-notepad' ></i></div>
                    </div>
                </div>
                 <div class="col"> 
                    <div class="row">
                        <div class="col-6">
                            <p class="ms-5">{{$agents_number}}</p>
                            <p class="ms-4 lead">Total Agents</p>
                        </div>
                        <div class="col-6 display-1"><i class='bx bx-user' ></i></div>
                    </div>
                </div>
                <div class="col"> 
                    <div class="row">
                        <div class="col-6">
                            <p class="ms-5">{{$your_agents_number}}</p>
                            <p class="ms-4 lead">Your Agents</p>
                        </div>
                        <div class="col-6 display-1"><i class='bx bx-user-circle' ></i></div>
                    </div>
                </div>
            </div>

           <div class="row m-5">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr >
                    <th scope="col">#</th>
                    <th scope="col">Agent Name</th>
                    <th scope="col">To do </th>
                    <th scope="col">In progress</th>
                    <th scope="col">Finished</th>
                    <th scope="col">Exceeded</th>
                    <th scope="col">In problem</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agentsWithTaskCounts as $agent)
                    <tr>
                    <th scope="row">{{$agent->id}}</th>
                    <td>{{$agent->name}}</td>
                    <td class="table-active">{{$agent->todo_count}}</td>
                    <td class="table-primary">{{$agent->in_progress_count}}</td>
                    <td class="table-success">{{$agent->finished_count}}</td>
                    <td class="table-warning">{{$agent->exceeded_count}}</td>
                    <td class="table-danger">{{$agent->in_problem_count}}</td>
                    <td>{{$agent->task_count}}</td>
                    </tr>
                    <tr>
                    @endforeach
                </tbody>
            </table>
           </div>

            <div class="row m-5">
                <div class="col-12">
                    <div id="piechart" style=
                    "width: 900px; 
                    height: 500px;
                    "></div>
                </div>
            </div>

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

    <script type="text/javascript">
        var taskData = @json($taskData);
    </script>
    
    <script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(taskData);

        var options = {
          title: 'Tasks status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    

</body>
</html>
