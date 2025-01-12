@php
    /**
     * @var $examQuestion \App\Models\ExamQuestion
     * @var $exam \App\Models\Exam
    */
$quiz = $exam->quiz
@endphp
@extends('exam.layouts.app')

@section('content')
    <!-- Hero Start -->
    <section class="d-table w-100 bg-dark" style="background: url('{{ asset('frontend/images/account/bg.png') }}') center center;">
        <div class="container pt-5">
            {!! $questions->links('vendor.pagination.exam-pagination',compact('question_answer')) !!}
        </div>
    </section>
    <!-- Hero End -->
    <!-- Shape Start -->
    {{--    <div class="position-relative">--}}
    {{--        <div class="shape overflow-hidden text-white">--}}
    {{--            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
    {{--                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>--}}
    {{--            </svg>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!--Shape End-->

    <!-- Profile Start -->
    <section class="section mt-60">
        <div class="container mt-lg-3">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="sidebar sticky-bar p-4 rounded shadow">
                        <div class="widget">
                            <h3>
                                {!! $exam->quiz->title !!}
                            </h3>
                            <h2>
                                <h1 id="clock" class="text-center" style="height: 80px;"></h1>
                            </h2>
                            <form action="{{ route('exam.finish',['exam' => $exam->token]) }}" class="text-center" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-block btn-primary btn-lg">
                                    {{ __('action.finish') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    @foreach($questions as $examQuestion)
                        <div class="border-bottom mb-3">
                            <div class="question-title">
                                {!! $examQuestion->question->title !!}
                            </div>
                        </div>
                        {{--                        @if($examQuestion->question->hasTranslation('image',$lang))--}}
                        {{--                            <div class="border-bottom mb-3 mt-3 pb-2">--}}
                        {{--                                <div class="w-50 mx-auto">--}}
                        {{--                                    <img src="{{ asset($examQuestion->question->getTranslation('image',$lang)) }}" class="img-fluid" alt="">--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                        <div>
                            @foreach($examQuestion->question->getOptions() as $key => $value)
                                <div>
                                    <label class="d-flex  card-radio">
                                        <input
                                            type="radio"
                                            class="card-radio__btn d-none"
                                            id="customRadio{{$loop->index}}"
                                            id="option_{{ $key }}"
                                            name="answer"
                                            value="{{ $key }}"
                                            onchange="selectAnswer({{ $examQuestion->id }},'{{ $key }}')"
                                            @if(!is_null($examQuestion->answer) and $examQuestion->answer === $key) checked @endif
                                        >
                                        <div class="d-flex key-feature  align-items-center p-3 rounded shadow mt-3 card-radio__card w-100 shadow-lg">
                                            <div class="text-dark">
                                                <h6 class="p-0 m-0">{{ $value }}</h6>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

@section('vendor-script')
    <script src="{{ asset('landing/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.countdown.js') }}"></script>
@endsection

@section('page-script')
    <script>
        let quiz_id = {{ $exam->id }};
        let timer = {{ $left }};
        let total_questions = {{ $questions->total() }}
        $(document).ready(function () {
            function e(e) {
                (116 === (e.which || e.keyCode) || 82 === (e.which || e.keyCode)) && e.preventDefault()
            }
            let i, o = (new Date).getTime() + timer;
            $("#clock").countdown(o, {
                elapse: !0
            }).on("update.countdown", function (e) {
                let i = $(this);
                e.elapsed ?
                    (
                        Cookies.set("done", "Your Quiz is Over...!",{expires: 1}),
                            Cookies.remove("time"),
                            location.href = "{{ route('exam.finish',['exam' => $exam->token]) }}"
                    )
                    :
                    i.html(e.strftime("<span>%H:%M:%S</span>"))
            })

        });
    </script>
    <script type="text/javascript">
        // Right click disable
        $(function () {
            $(this).bind("contextmenu", function (inspect) {
                inspect.preventDefault();
            });
        });
        // End Right click disable
    </script>
    <script type="text/javascript">
        //all controller is disable
        $(function () {
            var isCtrl = false;
            document.onkeyup = function (e) {
                if (e.which === 17) isCtrl = false;
            }

            document.onkeydown = function (e) {
                if (e.which === 17) isCtrl = true;
                if (e.which === 85 && isCtrl === true) {
                    return false;
                }
            };
            $(document).keydown(function (event) {
                // if (event.keyCode === 123) { // Prevent F12
                //     return false;
                // } else if (event.ctrlKey && event.shiftKey && event.keyCode === 73) { // Prevent Ctrl+Shift+I
                //     return false;
                // }
            });
        });
        // end all controller is disable
    </script>
    <script>
        axios.defaults.withCredentials = true;
        async function selectAnswer(examQuestion,answer){
            let token = '{{ auth()->user()->createToken($exam->id)->plainTextToken }}'
            let page = '{{ request()->has('page') ? request()->query('page') : 1 }}';
            const config = {
                headers : {
                    Authorization : `Bearer ${token}`
                }
            };
            let request = {
                'exam_question_id': examQuestion,
                'answer': answer
            };
            let data;
            await axios.post('{{ route('api.exam.app.answer',['exam' => $exam->token]) }}',request,config).then( async (response) => {
                data = await response.data;
            })
            if (data.status){
                let current_page = location.href;
                if (!current_page.includes('page=')){
                    location.href = current_page + "?page=" + 2;
                }else{
                    let page_number = parseInt(page) + 1;
                    if (page_number <= total_questions){
                        location.href = current_page.replace('page=' + page,'page=' + page_number)
                    }
                }
                $(`#exam-question-${page}-status`).removeClass('icon-x-square').removeClass('icon-check-square').addClass('icon-check-square');
            }
        }
    </script>
@endsection
