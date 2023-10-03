<!DOCTYPE html>
<html>
<head>
    @include('fixed.admin.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('fixed.admin.nav')
    @include('fixed.admin.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                @if(isset($pages))
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            @for($i = 0; $i < count($pages) - 1; $i++)
                                <li class="breadcrumb-item"><a href="{{ route($pages[$i]['route']) }}">{{ $pages[$i]['name'] }}</a></li>
                            @endfor
                            <li class="breadcrumb-item active" aria-current="page">{{ $pages[count($pages) - 1]['name'] }}</li>
                        </ol>
                    </nav>
                @endif
                @yield('contentHeader')
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    @include('fixed.admin.footer')
</div>
@include('fixed.admin.scripts')
</body>
</html>
