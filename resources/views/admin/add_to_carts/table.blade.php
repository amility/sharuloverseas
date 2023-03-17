<div class="table-responsive-sm">
    <table class="table table-striped" id="addToCarts-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Product Id</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Attributes</th>
        <th>Created By</th>
        <th>Updated By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($addToCarts as $addToCart)
            <tr>
                <td>{{ $addToCart->user_id }}</td>
            <td>{{ $addToCart->product_id }}</td>
            <td>{{ $addToCart->price }}</td>
            <td>{{ $addToCart->quantity }}</td>
            <td>{{ $addToCart->total }}</td>
            <td>{{ $addToCart->attributes }}</td>
            <td>{{ $addToCart->created_by }}</td>
            <td>{{ $addToCart->updated_by }}</td>
                <td>
                    {!! Form::open(['route' => ['addToCarts.destroy', $addToCart->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('addToCarts.show', [$addToCart->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('addToCarts.edit', [$addToCart->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>