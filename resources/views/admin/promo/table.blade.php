<div class="table-responsive-sm">
    <table class="table table-striped" id="promo-table">
        <thead>
            <tr>
                <th>Promo Name</th>
                <th>Promo Code</th>
                <th>Price / Percentage</th>
                <th>Promo Type</th>
                <th>Max User</th>
                <th>Status</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promo as $promodata)
            <tr>
                <td>{{ $promodata->promo_name }}</td>
                <td>{{ $promodata->promo_code }}</td>
                <td>{{ $promodata->promo_type=='price'?CurrencySymbol().$promodata->promo_price:$promodata->promo_price.'%' }}</td>
                <td>{{ ucfirst($promodata->promo_type) }}</td>
                <td>{{ $promodata->max_user }}</td>
                <td>{{ $promodata->status=='1'?'Active':'Inactive' }}</td>
                <td>

                    <div class='btn-group'>
                        <a href="{{ route('promo.show', [$promodata->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('promo-update'))
                            <a href="{{ route('promo.edit', [$promodata->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        @endif
                        @if(Auth::user()->hasPermissionTo('promo-delete'))
                            {!! Form::open(['route' => ['promo.destroy', $promodata->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
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
        $("#promo-table").dataTable({
            "paging": true,
            "ordering": true,
            "info": true
        })
    })
</script>
@endpush
