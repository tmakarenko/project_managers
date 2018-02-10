<html>
    <head>
        <title>Laravel Test - @yield('title')</title>
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="header navbar navbar-default">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/">Test</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href="/managers/create">Добавить менеджера<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="">
                                    <a href="/projects/create">Добавить проект<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="">
                                    <a href="/projects">Проекты<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="">
                                    <a href="/managers">Менеджеры<span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{url('js/jquery.min.js')}}"></script>
        <script src="{{url('js/jquery.validate.min.js')}}"></script>
        <script src="{{url('js/additional-methods.min.js')}}"></script>
    </body>
</html>