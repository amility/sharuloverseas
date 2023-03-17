<div class="table-responsive-sm">
    <table class="table table-striped" id="subscriber-table">
        <thead>
        <tr>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subscriber as $subscribers)
            <tr>
                <td>{{ $subscribers->email }}</td>
                <td>
                    @if(Auth::user()->hasPermissionTo('subscriber-update'))
                        <form method="POST" action="{{ route('subscriberChangeStatus') }}">
                            {!! Form::token() !!}
                            <input type="hidden" name="id" value="{{ $subscribers->id }}">
                            <?php if($subscribers->is_active == "1"){ ?>
                            <input type="hidden" name="is_active" value="0">
                            <input type="submit" name="sub" class="btn btn-ghost-success btn-sm" value="Active"
                                   onclick=" return confirm('Are you sure you want to change status?')">
                            <?php }else{ ?>
                            <input type="hidden" name="is_active" value="1">
                            <input type="submit" name="sub" class="btn btn-ghost-danger btn-sm" value="In-active"
                                   onclick=" return confirm('Are you sure you want to change status?')">

                            <?php } ?>

                        </form>
                    @else
                        {{ $subscribers->is_active == '1' ? 'Active' : 'Inactive' }}
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['subscriber.destroy', $subscribers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('subscriber.show', [$subscribers->id]) }}" class='btn btn-ghost-success'><i
                                class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('subscriber-delete'))
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
            $("#subscriber-table").dataTable({
                "paging": true,
                "ordering": true,
                "info": true
            })
        })
    </script>
@endpush
