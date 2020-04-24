@extends('_layouts.master')

@section('content')
<div  class="flex flex-wrap" style="flex:1">
    @include('pages._partials.sidebar')
    <div class="p-4 h-screen overflow-scroll" style="flex:4">
        {{-- Intro  --}}
        <header class="mb-6">
            <h2 class="mb-0">De balans</h2>
            <div class="subline">Stel een sterk team samen op basis van de verschillende karakterrollen</div>
        </header>
        {{-- Make the pie --}}
        <canvas id="teamChart" width="90" height="47"></canvas>
        {{-- Give feedback about the team composition  --}}
        <section class="px-4 py-2 bg-white shadow w-1/2 mx-auto mt-4">
            Het team mist nog een
            <span class="bg-grey-200 text-grey-700 rounded px-2 py-1">Inspecteur</span>,
            <span class="bg-grey-200 text-grey-700 rounded px-2 py-1">Communicator</span>
            . Vergeet die rol zeker niet op te nemen.
        </section>
    </div>
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
