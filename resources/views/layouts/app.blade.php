<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <title>@yield('title','LaraBBS') - {{ setting('site_name','LaraBBS') }}</title>

    <meta name="description" content="@yield('description',setting('seo_description','LaraBBS'))">
    <meta name="keyword" content="@yield('keyword', setting('seo_keyword', 'LaraBBS'))"/>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    @yield('styles')
</head>

<body>
<div id="app" class="{{route_class()}}-page">
    @include('layouts._header')
    <div class="container">

        @include('shared._messages')

        @yield('content')

    </div>

    @include('layouts._footer')
</div>

<!-- Scripts -->
<script src="{{mix('js/app.js')}}"></script>
@yield('scripts')

@if(app()->isLocal())
    @include('sudosu::user-selector')
@endif
</body>
</html>
