<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  @include('theme_a.layouts.parts.fullHead')
</head>

    <body class="font-montserrat">

        {{--@include('theme_a.layouts.parts.__loader')--}}

        <div id="main_content">

            @include('theme_a.layouts.parts.__topHeader')

            @include('theme_a.layouts.parts.__rightSideBar')

            @include('theme_a.layouts.parts.__themeChanger')

            @include('theme_a.layouts.parts.__userRight')

            @include('theme_a.layouts.parts.__leftSideBar')

            <div class="page">

                  @include('theme_a.layouts.parts.__top')

                  @yield('content')

                    <!-------------------------------------->
                    <!-------------------------------------->
                  @include('theme_a.layouts.parts.footer')
                    <!-------------------------------------->
                    <!-------------------------------------->
            </div>

        </div>

        @include('theme_a.layouts.parts.fullScript')
    </body>

</html>
