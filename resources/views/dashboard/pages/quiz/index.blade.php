@extends('dashboard.layouts.app')

@section('title',__('main.quiz.index'))

@section('content')
    @livewire('quiz-index-component')
@endsection
