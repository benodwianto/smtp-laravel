    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom bg-dark sticky-top">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-light text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-4">BlogSpot</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item me-3"><a href="{{ url('blog') }}" class="nav-link active" aria-current="page">Home</a>
            </li>
            <li class="nav-item me-3"><a href="{{ url('login') }}" class="nav-link btn btn-secondary text-dark"
                    style="background-color: rgb(223, 223, 43)" aria-current="page">Login</a></li>
            <li class="nav-item me-3"><a href="{{ url('logout') }}" class="nav-link btn btn-warning text-dark"
                    style="background-color: rgb(163, 98, 85)" aria-current="page">logout</a></li>
        </ul>
    </header>
