@extends('admin.app')

@section('content')
    <br><br>
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <!-- <div class="btn-group float-right">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-settings"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(31px, 23px, 0px);">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                    <div class="text-value">{{$total_sales ?? ''}}</div>
                                    <div>Total Sales</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <div class="chartjs-size-monitor"
                                         style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand"
                                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div
                                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink"
                                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div>
                                    <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"
                                            width="216" style="display: block;"></canvas>
                                    <div id="card-chart1-tooltip" class="chartjs-tooltip top"
                                         style="opacity: 0; left: 193.558px; top: 123.889px;">
                                        <div class="tooltip-header">
                                            <div class="tooltip-header-item">June</div>
                                        </div>
                                        <div class="tooltip-body">
                                            <div class="tooltip-body-item"><span class="tooltip-body-item-color"
                                                                                 style="background-color: rgb(0, 165, 224);"></span><span
                                                    class="tooltip-body-item-label">My First dataset</span><span
                                                    class="tooltip-body-item-value">55</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <!-- <button class="btn btn-transparent p-0 float-right" type="button">
                                        <i class="icon-location-pin"></i>
                                    </button> -->
                                    <div class="text-value">{{$total_order ?? ''}}</div>
                                    <div>Total Orders</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <div class="chartjs-size-monitor"
                                         style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand"
                                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div
                                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink"
                                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div>
                                    <canvas class="chart chartjs-render-monitor" id="card-chart2" height="70"
                                            width="216" style="display: block;"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-warning">
                                <div class="card-body pb-0">
                                    <!-- <div class="btn-group float-right">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-settings"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                    <div class="text-value">{{$total_customer ?? ''}}</div>
                                    <div>Total Users</div>
                                </div>
                                <div class="chart-wrapper mt-3" style="height:70px;">
                                    <div class="chartjs-size-monitor"
                                         style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand"
                                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div
                                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink"
                                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div>
                                    <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70"
                                            width="248" style="display: block;"></canvas>
                                    <div id="card-chart3-tooltip" class="chartjs-tooltip top"
                                         style="opacity: 0; left: 0px; top: 119.2px;">
                                        <div class="tooltip-header">
                                            <div class="tooltip-header-item">January</div>
                                        </div>
                                        <div class="tooltip-body">
                                            <div class="tooltip-body-item"><span class="tooltip-body-item-color"
                                                                                 background-color:
                                                                                 class="tooltip-body-item-label">My First dataset</span><span
                                                    class="tooltip-body-item-value">78</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-danger">
                                <div class="card-body pb-0">
                                    <!-- <div class="btn-group float-right">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-settings"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                    <div class="text-value">{{$total_product ?? ''}}</div>
                                    <div>Total Products</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <div class="chartjs-size-monitor"
                                         style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand"
                                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div
                                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink"
                                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div>
                                    <canvas class="chart chartjs-render-monitor" id="card-chart4" height="70"
                                            width="216" style="display: block;"></canvas>
                                    <div id="card-chart4-tooltip" class="chartjs-tooltip top"
                                         style="opacity: 0; left: 225px; top: 102.958px;">
                                        <div class="tooltip-header">
                                            <div class="tooltip-header-item">April</div>
                                        </div>
                                        <div class="tooltip-body">
                                            <div class="tooltip-body-item"><span class="tooltip-body-item-color"
                                                                                 style="background-color: rgba(255, 255, 255, 0.2);"></span><span
                                                    class="tooltip-body-item-label">My First dataset</span><span
                                                    class="tooltip-body-item-value">82</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                           
                            <div class="card-body">
                                <br>
                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">
                                            Customer Name
                                        </th>
                                        <th>Order Type</th>
                                        <th class="text-center">Purchase Date</th>
                                        <th>Bill To Name</th>
                                        <th class="text-center">Total Amount</th>
                                        <th>Status</th>
                                        <th class="text-center">Payment Method</th>

                                        <th class="text-center">Item Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @if(isset($latest_order))
                                        @foreach($latest_order as $value)
                                            <tr>
                                                <td class="text-center">
                                                    
                                                    {{$value->customer_name}}

                                                </td>
                                                <td>
                                                   
                                                    {{$value->order_type}}
                                                </td>
                                                <td class="text-center">
                                                    <p>{{$value->order_date}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$value->first_name}}</p>
                                                </td>
                                                <td>
                                                    ${{$value->total_price}}
                                                </td>
                                                <td>
                                                    <p>{{$value->status}}</p>
                                                </td>
                                                <td class="text-center">
                                                {{$value->payment_method}}
                                               

                                                </td>

                                                <td>

                                                    <?php
                                                    $arr = $order_id;

                                                    $str = '';

                                                    foreach ($order_id as  $valueprod) {


                                                    if($value->id == $valueprod->order_id){
                                                    ?>
                                                    <strong>


                                                        <?php
                                                        $str = ($str == '' ? '' : $str . ' , ') . $valueprod->prod_name;

                                                        ?>

                                                    </strong>
                                                    <?php
                                                    }
                                                    } echo $str;?>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                
                  
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
                    <script type="text/javascript" charset="utf8"
                            src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                    <script>
                        $(function () {
                            $("#order-table").dataTable({
                                "paging": true,
                                "ordering": true,
                                "info": true
                            })
                        })
                        $(document).ready(function () {
                        $('#selectall').click(function () {
                            $('.selectedId').prop('checked', this.checked);
                        });

                        $('.selectedId').change(function () {
                            var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
                            $('#selectall').prop("checked", check);
                        });
                    });
                    </script>
                    @endpush
