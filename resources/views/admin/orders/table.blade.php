<div class="table-responsive-sm">
    <table class="table table-striped" id="order-table">
        <thead>
            <tr>
                <th>Check all<br><input type="checkbox" id="selectall"></th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Type</th>
                <th>Purchase Date</th>
                <th>Bill To Name</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th width="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order_list as $orders)
            <tr>
                <td><input type="checkbox" class="selectedId" id="vehicle1" name="order[]" value="{{$orders->id}}">
                </td>
                <td>{{$orders->order_no}}</td>
                <td>{{ ucfirst($orders->customer_name) }}</td>
                <td>{{ ucfirst($orders->order_type) }}</td>
                <td>{{ $orders->order_date }}</td>
                <td>{{ ucfirst($orders->first_name) }}</td>
                <td><b>{{CurrencySymbol()}}</b> {{ $orders->total_price }}</td>
                <td>{{ ucfirst($orders->status) }}</td>
                <td>{{ $orders->payment_method }}</td>


                <td>

                    <div class='btn-group'>
                        <a href="{{ route('orders.show', [$orders->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('orders-update'))
                            <a href="{{ route('orders.edit', [$orders->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        @endif

                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
