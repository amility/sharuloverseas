<div class="table-responsive-sm">
    <table class="table table-striped" id="caliber-table">
        <thead>
            <tr>
                <th>Caliber Name</th>
                <th>Caliber Slug</th>

                <th>Caliber Image </th>
                <th>Is Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($caliber as $caliber)
            <tr>
                <td>{{ $caliber->caliber_name }}</td>
                <td>{{ $caliber->caliber_slug }}</td>

                <td><img src='{{ asset("$caliber->caliber_image_path")}}' alt="{{ $caliber->caliber_name }}" width="200" height="100"></td>

                <td>{{ $caliber->is_active }}</td>
                <td>
                    {!! Form::open(['route' => ['caliber.destroy', $caliber->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('caliber.show', [$caliber->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('customers-update'))
                            <a href="{{ route('caliber.edit', [$caliber->id]) }}" class='btn btn-ghost-info'><i
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
