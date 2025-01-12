<div class="row">
    @forelse($categories as $category)
        <div class="col-lg-4 col-md-4 mt-4 pt-2">
            <a href="#" class="card features fea-primary rounded p-4 bg-light text-center position-relative overflow-hidden border-0  d-flex align-items-center shadow" style="min-height: 180px;">
                {{--                @if($category->icon)--}}
                {{--                    <span class="h1 icon2 text-primary">--}}
                {{--                        <img src="{{ asset($category->icon) }}" class="category-icon" alt="">--}}
                {{--                    </span>--}}
                {{--                @else--}}
                {{--                    <span class="h1 icon2 text-primary">--}}
                {{--                        <img src="{{ asset('landing/images/quiz.png') }}" class="category-icon" alt="">--}}
                {{--                    </span>--}}
                {{--                @endif--}}
                <div class="card-body p-0 content d-flex align-items-center">
                    <h5>{{ $category->title }}</h5>
                </div>
                <span class="big-icon text-center">
                     @if($category->icon)
                        <img src="{{ asset($category->icon) }}" class="w-100" alt="">
                    @else
                        <img src="{{ asset('landing/images/quiz.png') }}" class="w-50" alt="" style="opacity: 0.4">
                    @endif
                </span>
            </a>
        </div>
    @empty
    @endforelse
    <div class="col-lg-12 text-center col-md-4 mt-3 pt-2 d-flex justify-content-center">
        {!! $categories->links() !!}
    </div>

    <div class="col-lg-12 mt-2 d-flex justify-content-end">
        <a href="#" class="btn btn-primary">
            {{ __('landing.category.more') }} <i class="uil uil-arrow-right"></i>
        </a>
    </div>
</div>
