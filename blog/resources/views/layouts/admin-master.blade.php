<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin area</title>
    <link rel="stylesheet" href="{{ URL::to('src/css/admin.css') }}">
    @yield('styles')
</head>
<body>
    @include('includes.admin-header')

    <div class="admin-main">
        @yield('content')
    </div>

    <script type="text/javascript">
        var baseUrl = "{{ URL::to('/') }}";
    </script>
    @yield('scripts')
</body>
</html>