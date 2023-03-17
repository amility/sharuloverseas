<div class="table-responsive-sm">
    <table class="table table-striped" id="brands-table">
        <thead>
        <tr>
            <th>Show Name</th>

            <th>Date</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gunshow as $gs)
            <tr>
                <td>{{ $gs->show_name }}</td>
                <td> {{$gs->month}} {{$gs->day}} {{$gs->year}}</td>

               <!-- <td>
                      @if(Auth::user()->hasPermissionTo('pages-update'))
                        {!! Form::open(['route' => ['UpdateGunshowStatus', $gs->id], 'method' => 'put']) !!}
                        <div class="">
                           <?php if($gs->is_active == '1')
                            {?>
                            <button type="submit" class="btn btn-success">Active</button>
                            <input type="hidden" name="is_active" value="{{$gs->is_active}}">
                            <?php
                            }
                            else
                            {
                            ?>
                            <button type="submit" class="btn btn-danger">In-Active</button>
                            <input type="hidden" name="is_active" value="{{$gs->is_active}}">
                            <?php
                            }
                            ?>               </div>
                        {!! Form::close() !!}
                    @else
                        {{ $gs->is_active == '1' ? 'Active' : 'Inactive' }}
                    @endif
                </td>-->
                <td>
                    {!! Form::open(['route' => ['gunshow.destroy', $gs->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('gunshow.show', [$gs->id]) }}" class='btn btn-ghost-success'><i
                                class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('pages-update'))
                            <a href="{{ route('gunshow.edit', [$gs->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        @endif
                        @if(Auth::user()->hasPermissionTo('pages-delete'))
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
