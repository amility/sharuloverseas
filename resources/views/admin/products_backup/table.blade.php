<div class="table-responsive-sm">
    <table class="table table-striped" id="products-table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Brand</th>
                <th>Prod Sku</th>
                <th>Prod Name</th>
                <th>Prod Slug</th>
                <th>Prod Price</th>
                <th>Total Stock</th>
                <th>Prod Video Url</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $products)
            <tr>
                <td>{{ $products->category_id }}</td>
                <td>{{ $products->brand_id }}</td>
                <td>{{ $products->prod_sku }}</td>
                <td>{{ $products->prod_name }}</td>
                <td>{{ $products->prod_slug }}</td>
                <td>{{ $products->prod_price }}</td>
                <td>{{ $products->total_stock }}</td>
                <td>{{ $products->prod_video_url }}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $products->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$products->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('products.edit', [$products->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>