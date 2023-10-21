<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong fixed-top" id="mainNav">
    <div class="container">

        <a class="navbar-brand" href="/"><div class="nav-logo"><img src="assets/img/logo.png" alt="..." /></div></a>
        <a class="navbar-brand" href="/">JAPANESE TIME</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @auth
                <li class="nav-item"><a class="nav-link" href="/dashboard/items">Dashboard</a></li>
                @endauth
                <li class="nav-item"><a class="nav-link" href="/categories">Collection</a></li>
                <li class="nav-item"><a class="nav-link" href="/items">All Items</a></li>
            </ul>
        </div>
    </div>
</nav>