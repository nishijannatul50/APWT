<style>
    .nav-link {
        color: blue;
    }
</style>
<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <h5 class="fw-bold">DRUGS AND STITCH</h5>
        <div class="navbar-nav ms-auto">
            <a class="fw-bold nav-link mx-2" href="{{ route ('/') }}">Home</a>
            <a class="fw-bold nav-link mx-2" href="{{ route ('contact') }}">Contact</a>
            @if(session()->has('name'))
            <div class="d-flex">
                <a class="fw-bold nav-link mx-2" href="{{ route ('dashboard') }}">Dashboard</a>
                <a style="color: red" class="fw-bold nav-link mx-2" href="{{ route ('logout') }}">Logout</a>
            </div>
            @else
            <a class="fw-bold nav-link mx-2" href="{{ route ('login') }}">Login</a>
            @endif
        </div>
    </div>
</nav>