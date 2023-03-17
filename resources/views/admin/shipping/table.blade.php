<div class="table-responsive-sm">
    <table class="table table-striped" id="brands-table">
        <thead>
            <tr>
                <th>Shipping Chart</th>
                <th>Min weight (LBS)</th>
                <th>Max weight (LBS)</th>
                <th>Cost </th>


                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipping as $data)
            <tr>
                @if($data->shipping_method==1)
                    <td>Date</td>
                    @elseif($data->shipping_method==3)
                    <td>Weight (LBS)</td>
                @else
                    <td>Price</td>
                @endif

                 @if($data->shipping_method==1)
                    <td>{{$data->start_date}}</td>
                    <td>{{$data->end_date}}</td>
                    
                     @elseif($data->shipping_method==3)
                     <td>{{$data->min_weight}}lb</td>
                     <td>{{$data->max_weight}}lb</td>

                @else
                    <td>{{$data->min_value}}</td>
                     <td>{{$data->max_value}}</td>
                @endif

                <td>{{ $data->price }}</td>

                <td>
                    <div class='btn-group'>
                        <a href="{{ route('shipping.show', [$data->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('shipping-update'))
                            <a href="{{ route('shipping.edit', [$data->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        @endif
                        @if(Auth::user()->hasPermissionTo('shipping-delete'))
                            {!! Form::open(['route' => ['shipping.destroy', $data->id], 'method' => 'delete']) !!}
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
