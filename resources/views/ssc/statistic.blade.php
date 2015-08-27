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
            text: 'Source: {{$type}}, Last 500 Records'
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
            data: @if($type=='重庆时时彩')
                    {!!App\Models\view_cq::take(500)->orderby('id')->lists('ODD')!!}
                  @elseif($type=='江西时时彩')
                    {!!App\Models\view_jx::take(500)->orderby('id')->lists('ODD')!!}
                  @elseif($type=='天津时时彩')
                    {!!App\Models\view_tj::take(500)->orderby('id')->lists('ODD')!!}
                  @endif






        }, {
            name: 'Even',
            data: @if($type=='重庆时时彩')
                    {!!App\Models\view_cq::take(500)->orderby('id')->lists('EVEN')!!}
                  @elseif($type=='江西时时彩')
                    {!!App\Models\view_jx::take(500)->orderby('id')->lists('EVEN')!!}
                  @elseif($type=='天津时时彩')
                    {!!App\Models\view_tj::take(500)->orderby('id')->lists('EVEN')!!}
                  @endif

        }

        ]
    });

    $('#container2').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Repeat Times'
        },
        subtitle: {
            text: 'Source: {{$type}}, Last 500 Records'
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
            data: @if($type=='重庆时时彩')
                    {!!App\Models\view_cq::take(500)->orderby('id')->lists('BIG')!!}
                  @elseif($type=='江西时时彩')
                    {!!App\Models\view_jx::take(500)->orderby('id')->lists('BIG')!!}
                  @elseif($type=='天津时时彩')
                    {!!App\Models\view_tj::take(500)->orderby('id')->lists('BIG')!!}
                  @endif
        },
        {
            name: 'Small',
            data: @if($type=='重庆时时彩')
                    {!!App\Models\view_cq::take(500)->orderby('id')->lists('SMALL')!!}
                  @elseif($type=='江西时时彩')
                    {!!App\Models\view_jx::take(500)->orderby('id')->lists('SMALL')!!}
                  @elseif($type=='天津时时彩')
                    {!!App\Models\view_tj::take(500)->orderby('id')->lists('SMALL')!!}
                  @endif
        }

        ]
    });

});
</script>



    
        <form method="POST" action="{{ route('statistic') }}" accept-charset="UTF-8">
            <div class="row">
                <div class="col-md-4">
                <h2>SSC Statistic</h2>
                </div>
                <div class='col-md-4'><h2>
                    <select name='type' id='type'>
                      <option value='重庆时时彩' @if($type=='重庆时时彩')selected @endif >重庆时时彩</option>
                      <option value='江西时时彩' @if($type=='江西时时彩')selected @endif>江西时时彩</option>
                      <option value='天津时时彩' @if($type=='天津时时彩')selected @endif>天津时时彩</option>
                 
                    </select> </h2>
                </div>  
                <div class='col-md-4'>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <h2> <input type="submit" class="btn btn-primary" value='Load'></h2></div>  
            </div>
            
            <div class='row'>
                <div id="container1" style="width:100%; height:400px"></div> 
                <div id="container2" style="width:100%; height:400px"></div>
            </div>

 </form>

@stop