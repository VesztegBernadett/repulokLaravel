<nav class="navbar navbar-expand-lg" style="background-color: cornflowerblue">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Repülők</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Összes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home', ['manufacturer' => 'Airbus']) }}">Airbus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home', ['manufacturer' => 'Boeing']) }}">Boeing</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
