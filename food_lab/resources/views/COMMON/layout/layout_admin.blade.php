<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ url('img/logo.png') }}">
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
                    <div class="text-center list-group list-group-flush ">
                        <a href="dashboard"><button class="buttons btn dash">{{ __('messageZN.Dashboard') }}</button></a>
                        <a href="/orderTransaction"><button
                                class="buttons btn tran">{{ __('messageZN.Transaction') }}</button></a>
                        <a href="/customerInfo"><button
                                class="buttons btn cust">{{ __('messageZN.Customer') }}</button></a>
                        <a href="/coinListing"><button class="buttons btn coin">{{ __('messageZN.Coin') }}</button></a>
                        <a href="/dailyChart"><button
                                class="buttons btn sale">{{ __('messageZN.Finance') }}</button></a>
                        <a href="/product"><button class="buttons btn product">{{ __('messageZN.Products') }}</button></a>
                        <a href="/adminLogin"><button
                                class="buttons btn setting">{{ __('messageZN.Setting') }}</button></a>
                        <a href="/adminlogout"><button class="logout btn">{{ __('messageZN.Logout') }}</button></a>
                    </div>
                </div>
                <!-- sidenav bar End  -->
            </div>
            @yield('body')

        </div>
    </div>
</body>

</html>
