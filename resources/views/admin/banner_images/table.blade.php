<div class="table-responsive-sm">
    <table class="table table-striped" id="bannerImages-table">
        <thead>
            <tr>
                <th>Image Path</th>
                <th>Title</th>
                <th>Preference</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bannerImages as $bannerImages)
            <tr>
                <td><img src="{{ asset($bannerImages->image_path) }}" alt="" height="100" width="100"></td>
                <td>{!! $bannerImages->title !!}</td>
                <td>{{ $bannerImages->preference }}</td>
                <td>
                    {!! Form::open(['route' => ['bannerImages.destroy', $bannerImages->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bannerImages.show', [$bannerImages->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('banner-images-update'))
                            <a href="{{ route('bannerImages.edit', [$bannerImages->id]) }}"
                               class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endif
                        @if(Auth::user()->hasPermissionTo('banner-images-delete'))
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
