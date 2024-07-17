<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SMART DSS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('calculate') }}">Calculate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('history') }}">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('alternatives.index') }}">Add Alternative</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
