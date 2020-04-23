@extends('_layouts.master')

{{-- @section('seo_title', $page->seo_title ?? $page->title)
@section('seo_description', $page->seo_description ?? teaser($page->short, 255))
@section('seo_social_image', $page->mediaUrl(\Thinktomorrow\Chief\Media\MediaType::THUMB))
@section('seo_keywords', $page->seo_keywords ?? null) --}}

@section('content')

    <div class="stack-xl">
        <div class="content">
            <h1>Chief</div>
            <div class="subline">Think Tomorrow's homemade skeleton</div>

            <div class="stack">
                <a target="_blank" href="https://thinktomorrow.github.io/package-docs/src/chief/initial_setup.html#installation">Documentation</a>
                <a target="_blank" href="https://github.com/thinktomorrow/chief">Github</a>
                <a target="_blank" href="https://github.com/thinktomorrow/chief/issues">Contribute</a>
                <a target="_blank" href="https://thinktomorrow.be">Think Tomorrow</a>
            </div>

        </div>
    </div>

    @include('modules.contactform')

@endsection
