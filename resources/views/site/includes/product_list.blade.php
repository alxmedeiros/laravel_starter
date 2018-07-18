<!-- produtos -->
<div class="produtos-indx container">
    <div class="row">
    @foreach ($rows as $row)
        <div class="produtos-item col-12 col-sm-4">
            <a href="{{ route('site.product.detail', ['product_slug' => $row->sku]) }}" title="">
                <img src="/site/img/produto-lasanha.jpg" alt="">
                <h2 class="produtos-item-titulo">
                    <?php echo $row->short_name; ?> <span>Konjac Massa</span>
                </h2>
                <p class="produtos-item-valor"><sub>R$</sub> <?php echo $row->price; ?></p>
            </a>
            <a href="{{ route('site.product.detail', ['product_slug' => $row->sku]) }}" class="btn btn-roxo" title="">Comprar</a>
        </div>
    @endforeach
    </div>
</div>
<!-- //produtos -->