@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')       
<h1 class="text-white pl-5 text-xl">{{ displayGreeting()}}</h1>
<div class="w-full mt-2">
    <h1 class="text-white pl-8 text-m">{{ daysTillPayDay() }}</h1>
</div>  
<hr class="border-b-2 border-gray-600 my-8 mx-4">
<h1 class="text-white pl-5 text-xl">Current Earnings:</h1>
<div class="flex flex-wrap">
    <!-- Weekly Earnings -->
    <div class="w-full md:w-1/3 xl:w-1/3 p-3">
        <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-green-600"><i class="fa fa-money-bill fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-400">Weekly</h5>
                    <h3 class="font-bold text-3xl text-gray-600">{{ formatCurency($weeklyPay)}} </span></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Monthly Earnings -->
    <div class="w-full md:w-1/3 xl:w-1/3 p-3">
        <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-orange-600"><i class="fas fa-money-bill fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-400">Monthly</h5>
                    <h3 class="font-bold text-3xl text-gray-600">{{ formatCurency($currentMonth)}}</span></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Earnings -->
    <div class="w-full md:w-1/3 xl:w-1/3 p-3">
        <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-orange-600"><i class="fas fa-money-bill fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-400">Total</h5>
                    <h3 class="font-bold text-3xl text-gray-600">{{ formatCurency($currentMonth)}}</span></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Divider-->
{{--<hr class="border-b-2 border-gray-600 my-8 mx-4">--}}

<!--Table Card-->
@if($clocks->count() > 0)
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Recent Clocks</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">Date</th>
                        <th class="text-center text-gray-600">Clock In</th>
                        <th class="text-center text-gray-600">Clock Out</th>
                        <th class="text-center text-gray-600">Earnings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clocksToDisplay as $clock)
                        <tr class="text-white pt-2">
                            <td class="text-center">{{ Carbon\Carbon::parse($clock->shiftDate)->format('jS M') }}</td>
                            <td class="text-center">{{ Carbon\Carbon::parse($clock->in)->format('H:i') }}</td>
                            <td class="text-center">{{ Carbon\Carbon::parse($clock->out)->format('H:i') }}</td>
                            <td class="text-center">{{ formatCurency($clock->shiftPay) }}</td>
                        </tr>
                    @endforeach                            
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
{{--
<div class="flex flex-row flex-wrap flex-grow mt-2">

    <div class="w-full md:w-1/2 p-3">
        <!--Graph Card-->
        <div class="bg-gray-900 border border-gray-800 rounded shadow">
            <div class="border-b border-gray-800 p-3">
                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
            </div>
            <div class="p-5">
                <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    new Chart(document.getElementById("chartjs-7"), {
                        "type": "bar",
                        "data": {
                            "labels": ["January", "February", "March", "April"],
                            "datasets": [{
                                "label": "Page Impressions",
                                "data": [10, 20, 30, 40],
                                "borderColor": "rgb(255, 99, 132)",
                                "backgroundColor": "rgba(255, 99, 132, 0.2)"
                            }, {
                                "label": "Adsense Clicks",
                                "data": [5, 15, 10, 30],
                                "type": "line",
                                "fill": false,
                                "borderColor": "rgb(54, 162, 235)"
                            }]
                        },
                        "options": {
                            "scales": {
                                "yAxes": [{
                                    "ticks": {
                                        "beginAtZero": true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 p-3">
        <!--Graph Card-->
        <div class="bg-gray-900 border border-gray-800 rounded shadow">
            <div class="border-b border-gray-800 p-3">
                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
            </div>
            <div class="p-5">
                <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    new Chart(document.getElementById("chartjs-0"), {
                        "type": "line",
                        "data": {
                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                            "datasets": [{
                                "label": "Views",
                                "data": [65, 59, 80, 81, 56, 55, 40],
                                "fill": false,
                                "borderColor": "rgb(75, 192, 192)",
                                "lineTension": 0.1
                            }]
                        },
                        "options": {}
                    });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Graph Card-->
        <div class="bg-gray-900 border border-gray-800 rounded shadow">
            <div class="border-b border-gray-800 p-3">
                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
            </div>
            <div class="p-5">
                <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    new Chart(document.getElementById("chartjs-1"), {
                        "type": "bar",
                        "data": {
                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                            "datasets": [{
                                "label": "Likes",
                                "data": [65, 59, 80, 81, 56, 55, 40],
                                "fill": false,
                                "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                "borderWidth": 1
                            }]
                        },
                        "options": {
                            "scales": {
                                "yAxes": [{
                                    "ticks": {
                                        "beginAtZero": true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Graph Card-->
        <div class="bg-gray-900 border border-gray-800 rounded shadow">
            <div class="border-b border-gray-800 p-3">
                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
            </div>
            <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    new Chart(document.getElementById("chartjs-4"), {
                        "type": "doughnut",
                        "data": {
                            "labels": ["P1", "P2", "P3"],
                            "datasets": [{
                                "label": "Issues",
                                "data": [300, 50, 100],
                                "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                            }]
                        }
                    });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Template Card-->
        <div class="bg-gray-900 border border-gray-800 rounded shadow">
            <div class="border-b border-gray-800 p-3">
                <h5 class="font-bold uppercase text-gray-600">Template</h5>
            </div>
            <div class="p-5">
 
            </div>
        </div>
        <!--/Template Card-->
    </div>
</div>
--}}
@endsection