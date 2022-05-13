<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@section('htmlheader')
@include('partials.htmlheader')
@show
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app" class="wrapper">
    @include('partials.mainheader')
    @include('partials.mainsidebar')
    <div class="content-wrapper">
        <main class="py-4">
            @yield('content')
        </main>
</div>
    </div>
</body>
</html>
