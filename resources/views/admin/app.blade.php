<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/css/coreui.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@icon/coreui-icons-free@1.0.1-alpha.1/coreui-icons-free.css">

    <!-- PRO version // if you have PRO version licence than remove comment and use it. -->
{{--<link rel="stylesheet" href="https://unpkg.com/@coreui/icons@1.0.0/css/brand.min.css">--}}
{{--<link rel="stylesheet" href="https://unpkg.com/@coreui/icons@1.0.0/css/flag.min.css">--}}
<!-- PRO version -->

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <!--  -->
    <!-- <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dropzone/dropzone.css')}}">


    <script src="{{asset('dropzone/dropzone.js')}}"></script>
    <style type="text/css">
        .attribute_remove {
    background: #ff0707;
    border: 0px;
    padding: 7px 10px;
    color: #fff;
    font-size: 14px;
    font-weight: 500;
}
.product_select{
    background: #4dbd74;
    margin: 0px 25px;
    padding: 4px;
    border: 0px;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}
.span{
    font-size: 12px;
    font-family: ui-sans-serif;
    color: red;
}
        img.navbar-brand-full {
    width: 80%;
    height: 60px;
}
.buttons-excel{
    color: #FFFFFF;
  background: #416dea;
}
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        .btn1 {
            border: none;
            outline: none;
            padding: 10px 16px;
            background-color: #f1f1f1;
            cursor: pointer;
            font-size: 18px;
        }


        .active1, .btn1:hover {
            background-color: #666;
            color: white;
        }
    </style>
    @stack('styles')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
@include('admin.header')
<div class="app-body">
    @include('admin.sidebar')
    <main class="main">
        @yield('content')
    </main>
</div>
<footer class="app-footer">
    <div>
        
        <span>&copy;copyright 2023 Designed & Developed By <a href="https://wamexs.com">Web and Marketing Experts LLC. </a>All Rights Reserved.</span>
    </div>
    <!-- <div class="ml-auto">
            <span>Powered by</span>
            <a href="https://coreui.io">CoreUI</a>
        </div> -->
</footer>
</body>
<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<!--  -->

<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


<!-- <script>
    $(function () {
        $("#myTable").dataTable({
            "paging": true,
            "ordering": true,
            "info": true
        })
    })
</script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- button -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/select2/js/select2.min.js') }}"></script>

<script type="text/javascript">
$(function () {
        $('.block-finder__select').on('change', function() {
            const item = $(this).closest('.block-finder__form-item');

            if ($(this).val() !== 'none') {
                item.find('~ .block-finder__form-item:eq(0) .block-finder__select').prop('disabled', false).val('none');
                item.find('~ .block-finder__form-item:gt(0) .block-finder__select').prop('disabled', true).val('none');
            } else {
                item.find('~ .block-finder__form-item .block-finder__select').prop('disabled', true).val('none');
            }

            item.find('~ .block-finder__form-item .block-finder__select').trigger('change.select2');
        });
    });

    /*
    // select2
    */
    $(function () {
        $('.form-control-select2, .block-finder__select').select2({width: '100%', placeholder: "Select Products"});

        $('#product_id').select2({width: '100%', placeholder: "Select Products"});
        $('#sub_category').select2({width: '100%', placeholder: "Select Sub Category"});
        $('#category_id').select2({width: '100%', placeholder: "Select Category"});
    });
    // Bootstrap datepicker
// $('.input-daterange input').each(function() {
//   $(this).datepicker('clearDates');
// });



// Set up your table
 $(function () {
table = $('#my-table').DataTable({
    "searching": true,
    "paging": true,
            "ordering": true,
            "info": true,
            dom: 'Bfrtip',
        buttons: [
           
              {
                extend: 'excel',
                title: 'Dataexport',
                text: 'Download '
            }
        ]
   
});
})

// Extend dataTables search
$.fn.dataTable.ext.search.push(
  function(settings, data, dataIndex) {
    var min = $('#min-date').val();
    var max = $('#max-date').val();
    var createdAt = data[2] || 0; // Our date column in the table

    if (
      (min == "" || max == "") ||
      (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
    ) {
      return true;
    }
    return false;
  }
);

// Re-draw the table when the a date range filter changes
$('.date-range-filter').change(function() {
  table.draw();
});

$('#my-table_filter').hide();
</script>

<!--  -->

<script>
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("btn1");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active1");
            current[0].className = current[0].className.replace(" active1", "");
            this.className += " active";
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '#selectid', function () {

           
            var id = $(this).val();
            var dates = '<div class="form-group col-sm-6"><label>Start Date</label><input type="date" class="form-control" name="start_date" required></div><div class="form-group col-sm-6"><label>End-Date</label><input type="date" class="form-control" name="end_date" required></div><div class="form-group col-sm-6"><label>Price</label><input type="text"  class="form-control" name="price" required></div>';
            var price = '<div class="form-group col-sm-6"><label>Min-value</label><input type="text" class="form-control" name="min_value" required></div><div class="form-group col-sm-6"><label>Max-value</label><input type="text" class="form-control" name="max_value" required></div><div class="form-group col-sm-6"><label>Price</label><input type="text"  class="form-control" name="price" required></div>';
            var weight = '<div class="form-group col-sm-6"><label>Min-weight</label><input type="text" class="form-control" name="min_weight" required></div><div class="form-group col-sm-6"><label>Max-weight</label><input type="text" class="form-control" name="max_weight" required></div><div class="form-group col-sm-6"><label>Price</label><input type="text"  class="form-control" name="price" required></div>';

            if (id == "1") {
                $('#input').html(dates);
            } 
            else if (id == "3") {
                $('#input').html(weight);
            }
            else {
                $('#input').html(price);
            }
        })
    })
</script>


@stack('scripts')

</html>
