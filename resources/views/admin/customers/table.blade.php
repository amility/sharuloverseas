<div class="table-responsive-sm">
    <table class="table table-striped" id="customers-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Registered Date</th>
                <th>status</th>
                <!-- <th>Email Verified At</th>
                <th>Password</th>
                <th>Remember Token</th> -->
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customers)
            <tr>
                <td>{{ $customers->name }}</td>
                <td>{{ $customers->email }}</td>

                <td><?php echo date('Y-m-d',strtotime($customers->created_at)) ?></td>

                <!-- <td>{{ $customers->email_verified_at }}</td>
                <td>{{ $customers->password }}</td>
                <td>{{ $customers->remember_token }}</td> -->

                <td>
                    @if(Auth::user()->hasPermissionTo('customers-update'))
                <form  method="POST" action="{{ route('userChangeStatus') }}">
                 {!! Form::token() !!}
                 <input type="hidden" name="id" value="{{ $customers->id }}">
                 <?php if($customers->status=="1"){ ?>
                     <input type="hidden" name="status" value="0">
                     <input type="submit" name="sub" class="btn btn-ghost-success btn-sm" value="Active" onclick=" return confirm('Are you sure you want to change status?')">
                 <?php }else{ ?>
                      <input type="hidden" name="status" value="1">
                       <input type="submit" name="sub" class="btn btn-ghost-danger btn-sm" value="In-active" onclick=" return confirm('Are you sure you want to change status?')">

                 <?php } ?>

                </form>
                         <!--  <input data-id="{{$customers->id}}" class="toggle-class" type="checkbox" data-token="{{csrf_token()}}" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $customers->status ? 'checked' : '' }}> -->
                    @else
                    {{ $customers->status=="1" ? 'Active' : 'In-Active' }}
                        @endif
                       </td>
                <td>
                    {!! Form::open(['route' => ['customers.destroy', $customers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customers.show', [$customers->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('customers-update'))
                            <a href="{{ route('customers.edit', [$customers->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        @endif
                        <!--@if(Auth::user()->hasPermissionTo('customers-delete'))-->
                        <!--    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}-->
                        <!--@endif-->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');
        var token=$(this).data('token');
         console.log(status);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/admin/userChangeStatus",
            data: {'status': status, 'user_id': user_id ,'_token':token},contentType: false,
          processData: false,

            success: function(data){
                alert(data);
              console.log(data.success)
            }
        });
    })
  })
</script>
@push('scripts')
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script>
    $(function () {
        $("#customers-table").dataTable({
            "paging": true,
            "ordering": true,
            "info": true
        })
    })
</script>
@endpush
