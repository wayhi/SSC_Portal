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
            type: 'bar'
        },
        title: {
            text: 'Number Appearance Times'
        },
        subtitle: {
            text: 'Source: {{$type}}, Last {{$count}} Records'
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Appearance Times'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            
            name: '时时彩数字',

            data: 
                    {{$data}}
                  


        }

        ]
    });

 

});
</script>



    
        <form method="POST" action="{{ route('number_appearance') }}" accept-charset="UTF-8">
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
                                  <option value='10' @if($count==10)selected @endif >10</option>
                                  <option value='20' @if($count==20)selected @endif>20</option>
                                  <option value='50' @if($count==50)selected @endif>50</option>
                             
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