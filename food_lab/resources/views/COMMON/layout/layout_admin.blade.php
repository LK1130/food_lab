<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="css/adminLayout.css">
    <link rel="stylesheet" href="css/commonAdmincss.css">
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <!-- sidenav bar Start  -->
            <div class="col-md-2">
                <div class="sidenav fixed-top">
                    <div class="sidebar-heading text-center py-4 text-uppercase fs-5 text-white">
                        <li class="adminli">Admin name</li>
                        <li class="adminli">{{ __('messageZN.Last Login') }}:12:12</li>
                    </div>
                    <div class="list-group list-group-flush my-3">
                        <a href=""><button class="buttons btn ">{{ __('messageZN.Dashboard') }}</button></a>
                        <a href=""><button class="buttons btn">{{ __('messageZN.Transaction') }}</button></a>
                        <a href=""><button class="buttons btn">{{ __('messageZN.Customer') }}</button></a>
                        <a href=""><button class="buttons btn">{{ __('messageZN.Coin') }}</button></a>
                        <a href=""><button class="buttons btn">{{ __('messageZN.Finace') }}</button></a>
                        <a href=""><button class="buttons btn">{{ __('messageZN.Products') }}</button></a>
                        <a href=""><button class="buttons btn">{{ __('messageZN.Setting') }}</button></a>
                        <a href=""><button class="logout btn">{{ __('messageZN.Logout') }}</button></a>
                    </div>
                </div>
                <!-- sidenav bar End  -->
            </div>
            @yield('body')

        </div>
    </div>
</body>

</html>
