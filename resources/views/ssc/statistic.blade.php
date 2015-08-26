@extends('ssc.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
SSC Statistic
@stop
{{-- Content --}}

@section('content')
<script src="{{asset('/js/highcharts_themes/grid-light.js')}}"></script>
<script type="text/javascript">
   $(function () {
    $('#container1').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Repeat Times'
        },
        subtitle: {
            text: 'Source: CQ, Last 500 Records'
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Repeat Times of Total Number'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Odd',
            data: {{App\Models\view_cq::take(500)->orderby('id')->lists('ODD')}}
        }, {
            name: 'Even',
            data: {!!App\Models\view_cq::take(500)->orderby('id')->lists('EVEN');!!}
        }

        ]
    });

    $('#container2').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'SSC Repeat Times'
        },
        subtitle: {
            text: 'Source: CQ'
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Repeat Times of Total Number'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Big',
            data: {!!App\Models\view_cq::take(500)->orderby('id')->lists('BIG');!!}
        },
        {
            name: 'Small',
            data: {!!App\Models\view_cq::take(500)->orderby('id')->lists('SMALL');!!}
        }

        ]
    });

});
</script>


<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('sentinel.users.store') }}" accept-charset="UTF-8">

            <h2>SSC Statistic</h2>
            
                <div classs='col-md-4'>
                <input type="button" class="btn btn-primary" value='Load'>


            </div>

            
            <div id="container1" style="width:100%; height:400px"></div> 
            <div id="container2" style="width:100%; height:400px"></div> 

        </form>
    </div>
</div>


@stop