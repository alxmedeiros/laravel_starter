<div class="page-header">
    {{--<ol class="breadcrumb">--}}
    {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
    {{--<li class="breadcrumb-item active">Pages</li>--}}
    {{--</ol>--}}
    <h1 class="page-title">{{ $pageTitle }}</h1>
    @if(isset($pageAction) && !empty($pageAction))
        <div class="page-header-actions">
            @include($pageAction)
        </div>
    @endif
</div>