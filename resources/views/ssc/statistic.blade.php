@extends('ssc.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
SSC Statistic
@stop
{{-- Content --}}

@section('content')

<script type="text/javascript">
   $(function(){ 
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Fruit Consumption'
            },
            xAxis: {
                categories: ['Apples', 'Bananas', 'Oranges']
            },
            yAxis: {
                title: {
                    text: 'Fruit eaten'
                }
            },
            series: [{
                name: 'Jane',
                data: [1, 0, 4]
            }, {
                name: 'John',
                data: [5, 7, 3]
            }]
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

            
            <div id="container" style="width:100%; height:400px"></div> 


        </form>
    </div>
</div>


@stop