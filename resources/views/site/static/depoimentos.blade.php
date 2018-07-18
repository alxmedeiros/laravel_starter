@extends('site.common.layout')

@section('content')

    <!-- faq-->
    <section class="faq">

        @include('site.common.page-header', ['title' => 'Depoimentos', 'breadcrumb' => 'Depoimentos'])

        <div class="container mb-sm-5">
            <div class="row">
                <div class="col-12 col-sm-10 mx-sm-auto col-lg-8">
                    <div class="depos-int-item">
                        <div class="depos-int-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a arcu iaculis, maximus mauris et, ultrices velit. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div>
                        <h5 class="depos-nome">Lorem ipsum dolor</h5>
                    </div>
                    <div class="depos-int-item">
                        <div class="depos-int-info">
                            <p>Morbi id gravida dui. Morbi laoreet tortor vitae euismod laoreet. Duis dapibus quam vitae urna elementum, eu volutpat lectus vehicula. Ut dapibus nibh neque. Mauris erat leo, rutrum quis facilisis volutpat, mattis ac risus.</p>
                        </div>
                        <h5 class="depos-nome">Duis dapibus quam</h5>
                    </div>
                    <div class="depos-int-item">
                        <div class="depos-int-info">
                            <p>Nunc efficitur est id ligula varius fermentum. Integer aliquam, magna et ornare placerat, enim erat sodales quam, vel rutrum sapien diam quis lectus. Donec lectus lorem, varius eu dolor nec, ultrices placerat nibh.</p>
                        </div>
                        <h5 class="depos-nome">Nulla dolor leo</h5>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- //faq-->

@endsection
