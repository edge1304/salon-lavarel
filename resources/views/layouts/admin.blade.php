<!DOCTYPE html>

<html lang="en">
@include('partials.head')
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
    @include('partials.header')

    @include("partials/sidebar")

    @yield("content")

    @include("partials/footer")
    </div>

    @yield("popup")

    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dist/js/adminlte.min.js"></script>
    <script src="/plugins/select2/js/select2.js"></script>
    <script src="/js/CONST.js"></script>
    <script src="/js/helper.js"></script>
    @yield("script")
</body>
</html>
