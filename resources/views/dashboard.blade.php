<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
                img {
                position: relative;
                height: 50px;
                width: 50px;
            }
            ul{
                position:relative;
                font-size: 20px;
                
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="content">
                <div class="title m-b-md">

            <img src="{{$user_avatar}}"/ >{{ $user_name }}
			<hr />
			List of Repos
			<ul class="repository">
            @foreach($user_repos_issues as $repo)
                <li>{{ $repo->name }}</li>
                @if($repo->issue_list)
                    <h4>Issues</h4>
                        <ul>
                        @foreach($repo->issue_list as $issue)
                            <li><a href="{{$issue->url}}">{{ $issue->title }}</a></li> 
                        @endforeach
                        </ul>
                    <hr />
                @endif
            @endforeach
            
			<li><a href="/logout">Logout</a></li>
			</ul>
			 </div>

            </div>
        </div>
    </body>
</html>
