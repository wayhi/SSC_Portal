@extends('ssc.layouts.default')
<script src="{{ asset('js/Chart.min.js') }}"></script>

{{-- Web site Title --}}
@section('title')
@parent
SSC Statistic
@stop
{{-- Content --}}
@section('content')
<script>
    function loadchart()
    {
        
        var data = {
            labels:["2015082401", "2015082402", "2015082402", "2015082402", "2015082402", "2015082402", "2015082402"],
            datasets:[
                {
                    label: "单双",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "大小",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        //var ctx = $("#myChart").get(0).getContext("2d");

        var ctx = document.getElementById("myChart").getContext("2d");

        var myLineChart = new Chart(ctx).Line(data,{bezierCurve: false});
        
        //alert('ok2');

    };
</script>


<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('sentinel.users.store') }}" accept-charset="UTF-8">

            <h2>SSC Statistic</h2>
            
                <div classs='col-md-4'>
                <input type="button" class="btn btn-primary" onclick="loadchart()" value='Load'>


            </div>

            <canvas id="myChart" width="800" height="400"></canvas>

        </form>
    </div>
</div>


@stop