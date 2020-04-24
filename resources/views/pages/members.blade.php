@extends('_layouts.master')

@section('content')

    <div class="p-4 h-screen overflow-scroll">
         {{-- Intro  --}}
        <header class="mb-6">
            <h2 class="mb-0">Jouw teamleden</h2>
            <div class="subline">Hier heb je een overzicht van al je teamleaden en hun karakterrollen.</div>
        </header>
        <div class="flex flex-wrap -mx-2">
            {{-- Members --}}
            @for($i=0;$i<5;$i++)
            <article class="w-1/3 p-2">
                <div class="px-4 py-3 bg-white shadow-lg border border-grey-200">
                    <div class="flex items-center">
                        <div class="avatar w-8 h-8 overflow-hidden rounded-full center-center">
                            @svg('person', 'w-4 h-4')
                        </div>
                        <div class="px-2 text-grey-800">Aurélie Berkmans</div>
                    </div>
                {{-- show the chart --}}
                <canvas id="teamChart" width="30" height="30" class="mt-4"></canvas>

                </div>
            </article>
            @endfor

        </div>
    </div>


@endsection


@push('custom-scripts')
<script>
    var ctx = document.getElementById('teamChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Visionair', 'Mentor', 'Stille kracht', 'Bewaker', 'Inspecteur', 'Communicator', 'Handelaar', 'Architect'
            ],
            datasets: [{
                label: 'Hoeveelheid rol',
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
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
            legend: {
                display: false,
            }
        }
    });
    </script>
@endpush
