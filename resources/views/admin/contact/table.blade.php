<div class="table-responsive-sm">
    <table class="table table-striped" id="subscriber-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contact_list as $contact_list)
            <tr>
                <td>{{ $contact_list->name }}</td>
                <td>{{ $contact_list->phone }}</td>
                <td>{{ $contact_list->email }}</td>
                <td>{{ $contact_list->msg }}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{url('c~AiN:2)Y42,&*/contactUs-view/'.$contact_list->id)}}" class='btn btn-ghost-success'><i
                                class="fa fa-eye"></i></a>
                                <a href="{{url('c~AiN:2)Y42,&*/destroy/'.$contact_list->id)}}" class="btn btn-ghost-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash "></i>  
                                </a>

                    </div>
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
            $("#subscriber-table").dataTable({
                "paging": true,
                "ordering": true,
                "info": true
            })
        })
    </script>
@endpush
