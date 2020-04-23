@extends('_layouts.master')

@section('content')
    <div class="container stack-l m-stack-xl">
        <div class="row justify-center mb-8">
            <div class="xs-column-12 s-column-10 m-column-8">
                <h1>{{ trans('contact.thanks.title') }}</h1>
                <p>{!! trans('contact.thanks.description') !!}</p>
            </div>
        </div>
    </div>
@endsection
