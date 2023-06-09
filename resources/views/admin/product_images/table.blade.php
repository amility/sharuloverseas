<div class="table-responsive-sm">
    <table class="table table-striped" id="productImages-table">
        <thead>
            <tr>
                <th>Image</th>
        <th>Product Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productImages as $productImages)
            <tr>
                <td>{{ $productImages->image }}</td>
            <td>{{ $productImages->product_id }}</td>
                <td>
                    {!! Form::open(['route' => ['productImages.destroy', $productImages->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productImages.show', [$productImages->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('productImages.edit', [$productImages->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>