<div class="table-responsive-sm">
    <table class="table table-striped" id="customerAddresses-table">
        <thead>
            <tr>
                <th>Customer Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Company Name</th>
        <th>Country</th>
        <th>Street Address</th>
        <th>Appartment</th>
        <th>Town City</th>
        <th>State Country</th>
        <th>Postcode Zip</th>
        <th>Email Address</th>
        <th>Phone</th>
        <th>Is Primary</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customerAddresses as $customerAddress)
            <tr>
                <td>{{ $customerAddress->customer_id }}</td>
            <td>{{ $customerAddress->first_name }}</td>
            <td>{{ $customerAddress->last_name }}</td>
            <td>{{ $customerAddress->company_name }}</td>
            <td>{{ $customerAddress->country }}</td>
            <td>{{ $customerAddress->street_address }}</td>
            <td>{{ $customerAddress->appartment }}</td>
            <td>{{ $customerAddress->town_city }}</td>
            <td>{{ $customerAddress->state_country }}</td>
            <td>{{ $customerAddress->postcode_zip }}</td>
            <td>{{ $customerAddress->email_address }}</td>
            <td>{{ $customerAddress->phone }}</td>
            <td>{{ $customerAddress->is_primary }}</td>
                <td>
                    {!! Form::open(['route' => ['customerAddresses.destroy', $customerAddress->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customerAddresses.show', [$customerAddress->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('customerAddresses.edit', [$customerAddress->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>