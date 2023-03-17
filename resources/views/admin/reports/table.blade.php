<style>
    .dt-buttons{position: relative;
    margin-left: 607px;
    bottom: 31px;
}
.input-group-addon{
    margin-top: 6px;
    margin-left:5px;
}
</style>
<div class="table-responsive-sm">
    <div class="input-group input-daterange col-md-6">
<div class="input-group-addon">From :</div>
      <input type="date" id="min-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">

      <div class="input-group-addon">To :</div>

      <input type="date"  id="max-date" class="form-control date-range-filter"  data-date-format="yyyy-mm-dd" placeholder="To:">

    </div>
    <table width="100%" class="display" id="my-table" cellspacing="0">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Order Type</th>
                <th>Purchase Date</th>
                <th>Bill To Name</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th >Payment Method</th>


            </tr>
        </thead>
        <tbody>
            @foreach($order_list as $orders)
            <tr>
                <td>{{ ucfirst($orders->customer_name) }}</td>
                <td>{{ ucfirst($orders->order_type) }}</td>
                <td><?php echo date('Y-m-d',strtotime($orders->order_date)) ?></td>
                <td>{{ ucfirst($orders->first_name) }}</td>
                <td>{{ ucfirst($orders->status) }}</td>
                <td><b>{{CurrencySymbol()}}</b> {{ $orders->total_price }}</td>
                <td>{{ $orders->payment_method }}</td>



            </tr>
            @endforeach
        </tbody>
    </table>
</div>
