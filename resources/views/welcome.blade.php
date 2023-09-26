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

            section{
                position : relative;
                width : 100%;
                min-height : 100vh;
                display : flex;
                flex-direction : column;
                justify-content : flex-start;
                background : url(https://chef-de-projet.fr/wp-content/uploads/2021/07/Logiciels-gestion-des-taches.png);
                background-size : cover;
                
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

            .content .info h2{
                color : #38598b;
                text-transform : uppercase;
                font-weight : 600;
                letter-spacing : 2px;
                line-height : 60px;
                margin : 50px;
            }

            .content .info h2 span{
                color : black;
                font-size : 20px;
                font-family : cursive;
            }

            .content .info p{
                width : 500px;
                font-size : 16px;
                font-weight : 900;
                margin : 50px;

            }

            .content .info p:hover{
                transform : scale(1.05);
            }

             .logged-user{
                color : red;
                font-weight : 600;
                letter-spacing : 2px;
                line-height : 60px;
              
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

        <div class="content">
            <div class="info">
                @if (auth()->check())
                    <h2>WELCOME {{Auth::user()->name}}
                @else
                    <h2>WELCOME TO OUR WEBSITE
                @endif
                 <br>
                    <span>MANAGE YOUR TASKS</span>
                </h2>
                <p>Organize and manage your team like a boss with LARAPROJECT, a task management tool packing more capabilities than you can imagine..</p>
            </div>
        </div>

    </section>
    
</body>
</html>