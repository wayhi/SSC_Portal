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
            text: 'Source: {{$type}}, Last {{$count}} Records'
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
                    {!!App\Models\view_cq::take($count)->lists('ODD')!!}
                  @elseif($type=='江西时时彩')
                    {!!App\Models\view_jx::take($count)->lists('ODD')!!}
                  @elseif($type=='天津时时彩')
                    {!!App\Models\view_tj::take($count)->lists('ODD')!!}
                  @endif





        }, {
            name: 'Even',
            data: @if($type=='重庆时时彩')
                    {!!App\Models\view_cq::take($count)->lists('EVEN')!!}
                  @elseif($type=='江西时时彩')
                    {!!App\Models\view_jx::take($count)->lists('EVEN')!!}
                  @elseif($type=='天津时时彩')
                    {!!App\Models\view_tj::take($count)->lists('EVEN')!!}
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
            text: 'Source: {{$type}}, Last {{$count}} Records'
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
                    {!!App\Models\view_cq::take($count)->lists('BIG')!!}
                  @elseif($type=='江西时时彩')
                    {!!App\Models\view_jx::take($count)->lists('BIG')!!}
                  @elseif($type=='天津时时彩')
                    {!!App\Models\view_tj::take($count)->lists('BIG')!!}
                  @endif
        },
        {
            name: 'Small',
            data: @if($type=='重庆时时彩')
                    {!!App\Models\view_cq::take($count)->lists('SMALL')!!}
                  @elseif($type=='江西时时彩')
                    {!!App\Models\view_jx::take($count)->lists('SMALL')!!}
                  @elseif($type=='天津时时彩')
                    {!!App\Models\view_tj::take($count)->lists('SMALL')!!}
                  @endif
        }

        ]
    });

});
</script>



    
        <form method="POST" action="{{ route('statistic') }}" accept-charset="UTF-8">
            <div class="row">
                <table >
                    <tr>
                        <td><h4>SSC Statistic</h4></td>

                        <td>

                             <select name='type' id='type'>
                                  <option value='重庆时时彩' @if($type=='重庆时时彩')selected @endif >重庆时时彩</option>
                                  <option value='江西时时彩' @if($type=='江西时时彩')selected @endif>江西时时彩</option>
                                  <option value='天津时时彩' @if($type=='天津时时彩')selected @endif>天津时时彩</option>
                             
                            </select> 
                        </td>

                        <td>

                                Last
                                <select name='count' id='count'>
                                  <option value='100' @if($count==100)selected @endif >100</option>
                                  <option value='200' @if($count==200)selected @endif>200</option>
                                  <option value='500' @if($count==500)selected @endif>500</option>
                             
                                </select> Records

                        </td>
                        <td>
                            <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                <input type="submit" class="btn btn-primary btn-sm" value='Load'>
                        </td>
                    </tr>



                </table>
                
            
            <div class='row'>
                <div id="container1" style="width:100%; height:400px"></div> 
                <div id="container2" style="width:100%; height:400px"></div>
            </div>

 </form>

@stop