@extends('Pages::Frontend.layouts.default')

@section('metaTitle', $page->present()->getMetaTitle)
@section('metaDescription', $page->present()->getMetaDescription)
@section('metaCanonical', $page->present()->getMetaCanonical)

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <h1>{{ $page->present()->getTitle }}</h1>
            <h3>{{ $page->present()->getSubtitle }}</h3>
            {!! $pagecontent->content !!}
        </div>
    </div>

    @if($page->slideshow != '')
        @if($page->slideshow->slides->count() > 0)
            <div class="gallery">
                <div class="row">
                    <div class="small-12 columns">
                        <div class="row">
                            <div class="small-1 columns">
                                <i class="fa fa-caret-left slide-prev"></i>
                            </div>
                            <div class="small-10 columns">
                                <div class="page-slideshow">
                                    @foreach($page->slideshow->slides as $slide)
                                        <a href="{{ ImageResizer::resize($slide->image, 1024)  }}" data-rel="lightcase:slideshow">
                                            <img alt="{{ $slide->alt_text }}" src="{{ ImageResizer::fit($slide->image, 280, 140)  }}" alt=""> </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="small-1 columns">
                                <i class="fa fa-caret-right slide-next"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    @include('PageForms::Frontend.form')
@stop

@section('scripts')
    @parent
    @if($page->slideshow != '')
        @if($page->slideshow->slides->count() > 0)
            <script>
                $(function () {
                    var slider = $('.page-slideshow').slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        infinite: false,
                        responsive: [
                            {
                                breakpoint: 640,
                                settings: {
                                    slidesToShow: 1,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 2,
                                }
                            }
                        ]
                    });
                    $('.slide-next').click(function () {
                        slider.slick('slickNext');
                    });
                    $('.slide-prev').click(function () {
                        slider.slick('slickPrev');
                    });
                });
            </script>
        @endif
    @endif
@stop
