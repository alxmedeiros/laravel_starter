@extends('site.common.layout')

@section('content')

    <!-- faq-->
    <section class="faq">

        @include('site.common.page-header', ['title' => 'FAQ', 'breadcrumb' => 'FAQ'])

        <div class="container mb-sm-5">
            <div class="row">
                <div class="col-12 col-sm-10 mx-sm-auto col-lg-8">
                    <div class="faq-item">
                        <h2 class="faq-titulo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a arcu
                            iaculis, maximus mauris et?</h2>
                        <p>Maecenas a arcu iaculis, maximus mauris et, ultrices velit. Interdum et malesuada fames ac
                            ante ipsum primis in faucibus. Morbi id gravida dui. Morbi laoreet tortor vitae euismod
                            laoreet. Duis dapibus quam vitae urna elementum, eu volutpat lectus vehicula. Ut dapibus
                            nibh neque. Mauris erat leo, rutrum quis facilisis volutpat, mattis ac risus.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- //faq-->

@endsection
