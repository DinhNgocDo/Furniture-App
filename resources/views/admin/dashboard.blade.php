@extends('admin.app')
@section('index')
<section class="content-header">
    <h1><?= $tab ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Biểu đồ</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="dashboard-general" style="height: 500px" id="bar-chart"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset('bower_components/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('bower_components/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('bower_components/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('bower_components/Flot/jquery.flot.categories.js') }}"></script>
<script>
    $(function () {
        var url = window.location.origin;

        $.ajax({
            url: url + '/api/chart',
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                var data = [];
                var months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

                var month = res.list.map(function (item) {
                    return item.month;
                });

                var product = res.list.map(function (item) {
                    return item.product;
                });

                var count = 0;
                for (let i = 0; i < months.length; i++) {  
                    var string = i + 1;
                    // string += '';

                    if (month.includes(string)) {
                        data.push([string, product[count]]);
                        count++;
                    } else {
                        data.push([string, 0]);
                    }
                }

                var bar_data = {
                    data,
                    color: '#9fe01d'
                }

                $.plot('#bar-chart', [bar_data], {
                    label: "bar",
                    grid: {
                        borderWidth: 1,
                        borderColor: '#f3f3f3',
                        tickColor: '#f3f3f3'
                    },
                    series: {
                        bars: {
                            line: 'text',
                            show: true,
                            barWidth: 0.2,
                            align: 'center'
                        },
                    },
                    xaxis: {
                        mode: "months",
                        tickLength: 0,
                        ticks: [
                            [0, 'Tháng'],
                            [1, 'Tháng 1'],
                            [2, 'Tháng 2'],
                            [3, 'Tháng 3'],
                            [4, 'Tháng 4'],
                            [5, 'Tháng 5'],
                            [6, 'Tháng 6'],
                            [7, 'Tháng 7'],
                            [8, 'Tháng 8'],
                            [9, 'Tháng 9'],
                            [10, 'Tháng 10'],
                            [11, 'Tháng 11'],
                            [12, 'Tháng 12'],
                        ],
                    },
                    yaxis: {
                        mode: "products",
                        tickLength: 10,
                    },
                })
            },
            error: function (XHR, status, error) {

            },
            complete: function (res) {

            }
        });
    })
</script>
@endsection