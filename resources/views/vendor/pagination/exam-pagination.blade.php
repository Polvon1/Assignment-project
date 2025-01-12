@if ($paginator->hasPages())
    <div class="row" style="margin-bottom: -50px;z-index: 999;">
        @foreach($elements as $element)
            @if (is_string($element))
                <div class="col mb-2">
                    <div class="card public-profile border-0 rounded shadow bg-primary" style="cursor: not-allowed;">
                        <div class="card-body text-center text-white">
                            {{ $element }}
                        </div>
                    </div>
                </div>
            @endif
            @if(is_array($element))
                @foreach($element as $page => $url)
                    <div class="col mb-2" style="z-index: 9;">
                        @if($page == $paginator->currentPage())
                            <div class="card  public-profile border-0 rounded shadow-lg bg-primary" style="cursor: not-allowed;">
                                <div class="card-body text-center text-white">
                                    {{ $page }}
                                    <br>
                                    @if(is_null($question_answer[$page-1]))
                                        <i class="feather icon-x-square" id="exam-question-{{$page}}-status"></i>
                                    @else
                                        <i class="feather icon-check-square" id="exam-question-{{$page}}-status"></i>
                                    @endif
                                </div>
                            </div>
                        @else
                            <a href="{{ $url }}" class="card key-feature public-profile border-0 rounded shadow">
                                <div class="card-body text-center text-dark">
                                    {{ $page }}
                                    <br>
                                    @if(is_null($question_answer[$page-1]))
                                        <i class="feather icon-x-square" id="exam-question-{{$page}}-status"></i>
                                    @else
                                        <i class="feather icon-check-square" id="exam-question-{{$page}}-status"></i>
                                    @endif
                                </div>
                            </a>
                        @endif
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>
@endif
