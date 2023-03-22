@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="p-5 border-2 border border-secondary rounded">
                    <h2>Select Seller</h2>
                    <form action="{{ route('products.import_data') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <select name="seller_id" id="" class="form-control">
                            @foreach ($data as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="" class="mt-5"><b>Select files :</b> </label>
                        <input type="file" name="import_product">
                        <div class="mt-5">
                            <button type="submit" name="file" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
