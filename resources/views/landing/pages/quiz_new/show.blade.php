@php
    /**
    * @var \App\Models\Quiz $quiz
    */
@endphp
@extends('exam.layouts.main')

@section('aside')
    @include('exam.layouts.inc.aside')
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Product Details</h3>
                    <div class="nk-block-des text-soft">
                        <p>An example page for product details</p>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('quiz.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>{{ __('action.back') }}</span></a>
                    <a href="{{ route('quiz.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="row pb-5">
                        <div class="col-lg-6">
                            <div class="product-gallery">
                                <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                    <div class="slider-item rounded">
                                        <img src="./images/product/lg-a.jpg" class="rounded w-100" alt="">
                                    </div>
                                    <div class="slider-item rounded">
                                        <img src="./images/product/lg-g.jpg" class="rounded w-100" alt="">
                                    </div>
                                    <div class="slider-item rounded">
                                        <img src="./images/product/lg-d.jpg" class="rounded w-100" alt="">
                                    </div>
                                    <div class="slider-item rounded">
                                        <img src="./images/product/lg-h.jpg" class="rounded w-100" alt="">
                                    </div>
                                    <div class="slider-item rounded">
                                        <img src="./images/product/lg-e.jpg" class="rounded w-100" alt="">
                                    </div>
                                </div><!-- .slider-init -->
                                <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 4, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true,
                                "responsive":[{"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                            }'>
                                    <div class="slider-item">
                                        <div class="thumb">
                                            <img src="./images/product/lg-a.jpg" class="rounded" alt="">
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="thumb">
                                            <img src="./images/product/lg-g.jpg" class="rounded" alt="">
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="thumb">
                                            <img src="./images/product/lg-d.jpg" class="rounded" alt="">
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="thumb">
                                            <img src="./images/product/lg-h.jpg" class="rounded" alt="">
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="thumb">
                                            <img src="./images/product/lg-e.jpg" class="rounded" alt="">
                                        </div>
                                    </div>
                                </div><!-- .slider-nav -->
                            </div><!-- .product-gallery -->
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="product-info mt-5">
                                <h4 class="product-price text-primary">$78.00 <small class="text-muted fs-14px">$98.00</small></h4>
                                <h2 class="product-title">Classy Modern Smart watch</h2>
                                <div class="product-rating">
                                    <ul class="rating">
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                        <li><em class="icon ni ni-star-half"></em></li>
                                    </ul>
                                    <div class="amount">(2 Reviews)</div>
                                </div><!-- .product-rating -->
                                <div class="product-excrept text-soft">
                                    <p class="lead">I must explain to you how all this mistaken idea of denoun cing ple praising pain was born and I will give you a complete account of the system, and expound the actual teaching.</p>
                                </div>
                                <div class="product-meta">
                                    <h6 class="title">Color</h6>
                                    <ul class="custom-control-group">
                                        <li>
                                            <div class="custom-control color-control">
                                                <input type="radio" class="custom-control-input" id="productColor1" name="productColor" checked>
                                                <label class="custom-control-label dot dot-xl" data-bg="#754c24" for="productColor1"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control">
                                                <input type="radio" class="custom-control-input" id="productColor2" name="productColor">
                                                <label class="custom-control-label dot dot-xl" data-bg="#636363" for="productColor2"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control">
                                                <input type="radio" class="custom-control-input" id="productColor3" name="productColor">
                                                <label class="custom-control-label dot dot-xl" data-bg="#ba6ed4" for="productColor3"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control">
                                                <input type="radio" class="custom-control-input" id="productColor4" name="productColor">
                                                <label class="custom-control-label dot dot-xl" data-bg="#ff87a3" for="productColor4"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-meta">
                                    <h6 class="title">Size</h6>
                                    <ul class="custom-control-group">
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck1" checked>
                                                <label class="custom-control-label" for="sizeCheck1">XS</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck2">
                                                <label class="custom-control-label" for="sizeCheck2">SM</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck3">
                                                <label class="custom-control-label" for="sizeCheck3">L</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck4">
                                                <label class="custom-control-label" for="sizeCheck4">XL</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- .product-meta -->
                                <div class="product-meta">
                                    <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                        <li class="w-140px">
                                            <div class="form-control-wrap number-spinner-wrap">
                                                <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                                <input type="number" class="form-control number-spinner" value="0">
                                                <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                            </div>
                                        </li>
                                        <li>
                                            <button class="btn btn-primary">Add to Cart</button>
                                        </li>
                                        <li class="ms-n1">
                                            <button class="btn btn-icon btn-trigger text-primary"><em class="icon ni ni-heart"></em></button>
                                        </li>
                                    </ul>
                                </div><!-- .product-meta -->
                            </div><!-- .product-info -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                    <hr class="hr border-light">
                    <div class="row g-gs flex-lg-row-reverse pt-5">
                        <div class="col-lg-5">
                            <div class="video">
                                <img class="video-poster w-100" src="./images/product/video-a.jpg" alt="">
                                <a class="video-play popup-video" href="https://www.youtube.com/watch?v=SSo_EIwHSd4">
                                    <em class="icon ni ni-play"></em>
                                    <span>Watch Video</span>
                                </a>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-7">
                            <div class="product-details entry me-xxl-3">
                                <h3>Product details of Comfy cushions</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem consectetur, adipisci velit.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.</p>
                                <ul class="list list-sm list-checked">
                                    <li>Meets and/or exceeds performance standards.</li>
                                    <li>Liumbar support.</li>
                                    <li>Made of bonded teather and poiyurethane.</li>
                                    <li>Metal frame.</li>
                                    <li>Anatomically shaped cork-latex</li>
                                    <li>As attractively priced as you look attractive in one</li>
                                </ul>
                                <p>Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
                                <h3>The best seats in the house</h3>
                                <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings. Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
                            </div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div>
            </div>
        </div><!-- .nk-block -->
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Related Products</h3>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="slider-init row" data-slick='{"slidesToShow": 3, "centerMode": false, "slidesToScroll": 1, "infinite":false, "responsive":[ {"breakpoint": 992,"settings":{"slidesToShow": 2}}, {"breakpoint": 576,"settings":{"slidesToShow": 1}} ]}'>
                <div class="col">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/product-details.html">
                                <img class="card-img-top" src="./images/product/lg-a.jpg" alt="">
                            </a>
                            <ul class="product-badges">
                                <li><span class="badge bg-success">New</span></li>
                            </ul>
                            <ul class="product-actions">
                                <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <ul class="product-tags">
                                <li><a href="#">Smart Watch</a></li>
                            </ul>
                            <h5 class="product-title"><a href="html/product-details.html">Classy Modern Smart watch</a></h5>
                            <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$350</small> $324</div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/product-details.html">
                                <img class="card-img-top" src="./images/product/lg-b.jpg" alt="">
                            </a>
                            <ul class="product-actions">
                                <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <ul class="product-tags">
                                <li><a href="#">Vintage Phone</a></li>
                            </ul>
                            <h5 class="product-title"><a href="html/product-details.html">White Vintage telephone</a></h5>
                            <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$209</small> $119</div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/product-details.html">
                                <img class="card-img-top" src="./images/product/lg-c.jpg" alt="">
                            </a>
                            <ul class="product-badges">
                                <li><span class="badge bg-danger">Hot</span></li>
                            </ul>
                            <ul class="product-actions">
                                <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <ul class="product-tags">
                                <li><a href="#">Headphone</a></li>
                            </ul>
                            <h5 class="product-title"><a href="html/product-details.html">Black Wireless Headphones</a></h5>
                            <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$129</small> $89</div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/product-details.html">
                                <img class="card-img-top" src="./images/product/lg-d.jpg" alt="">
                            </a>
                            <ul class="product-actions">
                                <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <ul class="product-tags">
                                <li><a href="#">Smart Watch</a></li>
                            </ul>
                            <h5 class="product-title"><a href="html/product-details.html">Modular Smart Watch</a></h5>
                            <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$169</small> $120</div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/product-details.html">
                                <img class="card-img-top" src="./images/product/lg-e.jpg" alt="">
                            </a>
                            <ul class="product-actions">
                                <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <ul class="product-tags">
                                <li><a href="#">Headphones</a></li>
                            </ul>
                            <h5 class="product-title"><a href="html/product-details.html">White Wireless Headphones</a></h5>
                            <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$109</small> $78</div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="html/product-details.html">
                                <img class="card-img-top" src="./images/product/lg-f.jpg" alt="">
                            </a>
                            <ul class="product-actions">
                                <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <ul class="product-tags">
                                <li><a href="#">Phone</a></li>
                            </ul>
                            <h5 class="product-title"><a href="html/product-details.html">Black Android Phone</a></h5>
                            <div class="product-price text-primary h5">$329</div>
                        </div>
                    </div>
                </div><!-- .col -->
            </div>
        </div>
    </div>
@endsection
