<header class="titulos-area card text-white">
    <div class="container">
        <h1 class="titulos-page">{{ $title }}</h1>
        <!-- page atual -->
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
            </ol>
        </nav>
    </div>
</header>