<section class="blog">
    <div class="container">
        <h2 class="blog-titulo">Blog</h2>
        <div class="row">
            <div class="blog-content col ml-lg-5">
            @foreach($posts as $post)
                @if ($loop->last)
                <div class="blog-item row mt-4 mt-lg-0">
                    <div class="col-12 col-sm-6 col-lg-4 ml-lg-5 order-2 order-sm-1">
                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                            <h3 class="blog-item-titulo">{{ $post->title }}</h3>
                            <p>{{ $post->excerpt }}</p>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 order-1 order-sm-2">
                        <a href="{{ $post->url }}" title="{{ $post->title }}"><img src="{{ $post->image }}" alt=""></a>
                    </div>
                </div>
                @else
                <div class="blog-item row">
                    <div class="col-12 col-sm-6 ml-lg-5">
                        <a href="{{ $post->url }}" title="{{ $post->title }}"><img src="{{ $post->image }}" alt=""></a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                            <h3 class="blog-item-titulo">{{ $post->title }}</h3>
                            <p>{{ $post->excerpt }}</p>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
</section>