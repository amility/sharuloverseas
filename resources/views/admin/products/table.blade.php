<div class="table-responsive-sm">


    <table class="table table-responsive" id="myTable">
        <thead>
        <tr>

            <th><input type="checkbox" id="selectall"><span>Check all</span></th>
            <th>Sr.No.</th>
            <th>Category</th>
            <th>Sub-Category</th>
            <th>Brand</th>
            <th>Caliber</th>
            <th>SKU</th>
            <th>Name</th>
            <th>Price</th>
            <th>Total Stock</th>
            <th width="50">Status</th>

            <th width="100">Action</th>

        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        @foreach($products as $product)
            <tr>
                  <td><input type="checkbox" class="selectedId" id="vehicle1" name="product[]" value="{{$product->id}}">
                </td>
                <td>{{$i}}</td>
                <td>{{ $product->categoryData()->get('name')[ 0 ]->name ?? null }}</td>
                <td>{{ !is_null($product->categoryData) ? $product->categoryData->getSubCategoryName($product->sub_category_id) : null }}</td>
                <td>{{ !is_null($product->brandData) ? $product->brandData()->get('brand_name')[0]->brand_name : null }}</td>
                <td>{{ !is_null($product->caliberData) ? $product->caliberData()->get('caliber_name')[0]->caliber_name : null }}</td>
                <td>{{ $product->prod_sku }}</td>
                <td>{{ $product->prod_name }}</td>
                <td>{{ $product->prod_price }}</td>
                <td>{{ $product->total_stock }}</td>

                <td>{{ $product->is_active=='1'?'Active':'Inactive' }}</td>
            </form>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-ghost-success'><i
                                class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasPermissionTo('products-update'))
                            <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        @endif
                        @if(Auth::user()->hasPermissionTo('products-delete'))
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            <?php $i++; ?>
        @endforeach
        </tbody>
    </table>

</div>
@push('scripts')
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script>
    $(function () {
        $("#myTable").dataTable({
            "paging": true,
            "ordering": true,
            "info": true
        })
    })
      $(document).ready(function () {
    $('#selectall').click(function () {
        $('.selectedId').prop('checked', this.checked);
    });

    $('.selectedId').change(function () {
        var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
        $('#selectall').prop("checked", check);
    });
});

//        $(document).ready(function(){
//         var gh=[];
// $(document).on('change', '.selectedId', function() {

//   var id = $(this).val(); // this gives me null
//   var index = gh.indexOf(id);

//   if($(this).is(':checked')){
//     gh.push(id);
//     $('#demo').val(gh);
//   }
//   else{
//     if (index > -1) {
//       gh.splice(index, 1);
//       $('#demo').val(gh);
//     }
//   }
// // console.log(gh);
// });
</script>
@endpush

