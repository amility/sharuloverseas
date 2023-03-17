<div class="table-responsive-sm">
    <table class="table table-striped" id="brands-table">
        <thead>
            <tr>
                <th>Tax Name</th>
                <th>Tax Rate</th>
               
                <th>Is Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tax as $taxdata)
            <tr>
                <td>{{ $taxdata->tax_name }}</td>
                <td>{{ $taxdata->tax_rate }}</td>
                
               
                
                <td>{{ $taxdata->is_active }}</td>
                <td>
                    {!! Form::open(['route' => ['tax.destroy', $taxdata->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>


                        <!-- <a href="{{ route('tax.show', [$taxdata->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a> -->

                        <a href="{{ route('tax.show', [$taxdata->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>



                        <!-- <a href="{{ route('tax.show', [$taxdata->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a> -->


                        <a href="{{ route('tax.edit', [$taxdata->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



</div>

</div>


</div>


</div>

</div>


