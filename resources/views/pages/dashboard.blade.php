@extends('_layouts.master')

{{-- @section('seo_title', $page->seo_title ?? $page->title)
@section('seo_description', $page->seo_description ?? teaser($page->short, 255))
@section('seo_social_image', $page->mediaUrl(\Thinktomorrow\Chief\Media\MediaType::THUMB))
@section('seo_keywords', $page->seo_keywords ?? null) --}}

@section('content')

    <div class="">
        <div class="content">
            <h2 class="mb-0">De balans</h2>
            <div class="subline">Stel een sterk team samen op basis van de verschillende karakterrollen</div>
        </div>

        <canvas id="teamChart" width="100" height="60" class="my-6"></canvas>

    </div>


@endsection

@push('custom-scripts')
<script>
    var ctx = document.getElementById('teamChart');
    var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: [
                'Visionair', 'Mentor', 'Stille kracht', 'Bewaker', 'Inspecteur', 'Communicator', 'Handelaar', 'Architect'
            ],
            datasets: [{
                label: 'Hoeveelheid bepaalde rol',
                data: [10, 9, 7, 5, 2, 3, 9, 7],
                backgroundColor: [
                    '#1abc9c',
                    '#3498db',
                    '#34495e',
                    '#95a5a6',
                    '#f1c40f',
                    '#f39c12',
                    '#d35400',
                    '#8e44ad',
                ],
                borderWidth: 0,
                borderAlign: 'inner',
            }]
        },
        options: {
            scales: {
            },
            legend: {
                position: 'left',
            }
        }
    });
    </script>
@endpush
