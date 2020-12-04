@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard header items area -->
                    <div class="dashboard-home-header">
                        <h2>Admin Dashboard! </h2>
                    </div>
                    <hr/>
                    <div id="response" class="col-md-12">
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><i class="fa fa-times-circle"></i> {{ Session::get('error') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="section-padding dashboard-header-area padding-top-20">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-dashboard-product-head">
                                    <div class="dashboard-product-image">
                                        <i class="fa fa-user"></i>
                                        <p class="dashboard-product-type">Total Customers!
                                            <span class="product-quantity">{{ \App\UserAccount::count() }}</span>
                                        </p>
                                    </div>
                                    <div class="dashboard-product-bottom">
                                        <a href="{{url('admin/customers')}}">
                                            <div class="col-md-12" style="padding: 0;">
                                                <span class="view-btn">view all</span>
                                                <span class="view-next-btn">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-dashboard-product-head">
                                    <div class="dashboard-product-image">
                                        <i class="fa fa-warning"></i>
                                        <p class="dashboard-product-type">Pending Withdraws!
                                            <span class="product-quantity">{{ \App\Withdraw::where('status','pending')->count() }}</span>
                                        </p>
                                    </div>
                                    <div class="dashboard-product-bottom">
                                        <a href="{{url('admin/withdraws')}}">
                                            <div class="col-md-12" style="padding: 0;">
                                                <span class="view-btn">view all</span>
                                                <span class="view-next-btn">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-dashboard-product-head">
                                    <div class="dashboard-product-image">
                                        <i class="fa fa-warning"></i>
                                        <p class="dashboard-product-type">Pending Deposits!
                                            <span class="product-quantity">{{ \App\Deposit::where('status','pending')->count() }}</span>
                                        </p>
                                    </div>
                                    <div class="dashboard-product-bottom">
                                        <a href="{{url('admin/deposits')}}">
                                            <div class="col-md-12" style="padding: 0;">
                                                <span class="view-btn">view all</span>
                                                <span class="view-next-btn">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-dashboard-product-head">
                                    <div class="dashboard-product-image">
                                        <i class="fa fa-usd"></i>
                                        <p class="dashboard-product-type">Transaction Made!
                                            <span class="product-quantity">{{ count(\App\Transaction::where('status',1)->groupBy('transid')->get()) }}</span>
                                        </p>
                                    </div>
                                    <div class="dashboard-product-bottom">
                                        <a href="{{url('admin/transactions')}}">
                                            <div class="col-md-12" style="padding: 0;">
                                                <span class="view-btn">view all</span>
                                                <span class="view-next-btn">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-dashboard-product-head">
                                    <div class="dashboard-product-image">
                                        <i class="fa fa-usd usd1"></i>
                                        <p class="dashboard-product-type">Deposit Made!
                                            <span class="product-quantity">{{ count(\App\Transaction::where('status',1)->where('type','deposit')->groupBy('transid')->get()) }}</span>
                                        </p>
                                    </div>
                                    <div class="dashboard-product-bottom">
                                        <a href="{{url('admin/transactions')}}">
                                            <div class="col-md-12" style="padding: 0;">
                                                <span class="view-btn">view all</span>
                                                <span class="view-next-btn">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-dashboard-product-head">
                                    <div class="dashboard-product-image">
                                        <i class="fa fa-bank"></i>
                                        <p class="dashboard-product-type">Withdraw Made!
                                            <span class="product-quantity">{{ count(\App\Transaction::where('status',1)->where('type','withdraw')->groupBy('transid')->get()) }}</span>
                                        </p>
                                    </div>
                                    <div class="dashboard-product-bottom">
                                        <a href="{{url('admin/transactions')}}">
                                            <div class="col-md-12" style="padding: 0;">
                                                <span class="view-btn">view all</span>
                                                <span class="view-next-btn">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="single-dashboard-product-head">
                                    <div class="dashboard-product-image">
                                        <i class="fa fa-money"></i>
                                        <p class="dashboard-product-type">Express Payments!
                                            <span class="product-quantity">{{ count(\App\Transaction::where('status',1)->where('type','credit')->where('used_api','yes')->groupBy('transid')->get()) }}</span>
                                        </p>
                                    </div>
                                    <div class="dashboard-product-bottom">
                                        <a href="{{url('admin/transactions')}}">
                                            <div class="col-md-12" style="padding: 0;">
                                                <span class="view-btn">view all</span>
                                                <span class="view-next-btn">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard header items area -->

                    <!-- Starting of Dashboard Top reference area -->
                    <div class="section-padding reference-OS-area padding-top-0">
                        <div class="panel panel-default top-reference-area">
                            <div class="panel-heading">Most Used Browser</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <table class="table top-reference">
                                            <tbody>
                                            @foreach($browsers as $browser)
                                                <tr>
                                                    <td>{{$browser->info}}</td>
                                                    <td>{{$browser->total}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div id="chartContainer-topReference"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Top reference area -->

                    <!-- Starting of Dashboard Most Used OS area -->
                    <div class="section-padding reference-OS-area padding-top-0">
                        <div class="panel panel-default os-area">
                            <div class="panel-heading">Most Used OS</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <table class="table os-table">
                                            <tbody>
                                            @foreach($oss as $os)
                                                <tr>
                                                    <td>{{$os->info}}</td>
                                                    <td>{{$os->total}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div id="chartContainer-os"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Most Used OS area -->

                    <!-- Starting of Dashboard product-sold-chart area -->
                    <div class="section-padding product-sold-chart padding-top-0">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div id="chartContainer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard product-sold-chart area -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
<script>

    jQuery(window).load(function(){
        var options = {
            exportEnabled: true,
            animationEnabled: true,
            title: {
                text: "Transactions Made in Last 30 Days",
                horizontalAlign: "left",
                padding: {
                    top: 20,
                    bottom: 20,
                    left: 20
                }
            },
            axisX: {
                title: "Days",
                valueFormatString: "DD MMM"
            },
            axisY:{
                title: "Transactions Made"
            },
            data: [
                {
                    type: "splineArea", //change it to line, area, bar, pie, etc
                    dataPoints: [
                        {!! $trans_data !!}
                    ]
                }
            ]
        };
        $("#chartContainer").CanvasJSChart(options);

        // Pie chart topReference
        var chart1 = new CanvasJS.Chart("chartContainer-topReference",
            {
                exportEnabled: true,
                animationEnabled: true,
                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    }
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{y} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [

                            {!! $browser_data !!}
                        ]
                    }
                ]
            });
        chart1.render();


        // Pie chart OS
        var chart = new CanvasJS.Chart("chartContainer-os",
            {
                exportEnabled: true,
                animationEnabled: true,
                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20
                    }
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        indexLabelFontColor: "white",
                        toolTipContent: "{name}: <strong>{y} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                            {!! $os_data !!}
                        ]
                    }
                ]
            });
        chart.render();

    });

</script>
@stop