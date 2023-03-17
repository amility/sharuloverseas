<div class="table-responsive-sm">
    <table class="table table-striped" id="brands-table">
        <thead>
            <tr>
                <th>Brand Name</th>
                <th>Brand Slug</th>

                <th>Brand Image </th>
                <th>Is Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brands)
            <tr>
                <td>{{ $brands->brand_name }}</td>
                <td>{{ $brands->brand_slug }}</td>

                <td><img src='{{ asset("$brands->brand_image_path")}}' alt="{{ $brands->brand_name }}" width="" height="100"></td>

                <td>{{ $brands->is_active }}</td>
                <td>
                    {!! Form::open(['route' => ['brands.destroy', $brands->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('brands.show', [$brands->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('customers-update'))
                            <a href="{{ route('brands.edit', [$brands->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        @endif
                        @if(Auth::user()->hasPermissionTo('customers-delete'))
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
