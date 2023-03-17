<div class="table-responsive-sm">
    <table class="table table-striped" id="bannerImages-table">
        <thead>
            <tr>
                <th>SR.No</th>
                <th>Attribute Name</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($list as $lists)
            <tr>
                <td>{{$i}}</td>
                <td>{!! $lists->name !!}</td>
                @php $a = 'Active'; @endphp
                <td>{{$lists->is_active == '1'?$a:'In-Active'}}</td>
                <td>
                <div class='btn-group'>
                        <!-- <a href="{{url('admin/contactUs-view/'.$lists->id)}}" class='btn btn-ghost-success'><i
                                class="fa fa-eye"></i></a> -->

                                <a href="{{url('admin/attribute_edit/'.$lists->id)}}" class="btn btn-ghost-info"><i class="fa fa-edit"></i></a>

                                <a href="{{url('admin/attribute_destroy/'.$lists->id)}}" class="btn btn-ghost-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash "></i>  
                                </a>

               </td>
            </tr>
            @php  $i++; @endphp
            @endforeach
        </tbody> 
    </table>
</div>
