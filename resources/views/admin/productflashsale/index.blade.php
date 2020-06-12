@extends('layout.app')
@section('content')
<section class="content">
   <div class=row>
   <div col-xs-12>
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
            <div class="box-header col-sm-12">
               <a class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add Product Flash Sale</a>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
               @if(count($errors) > 0)
               <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                  {{$error}}<br>
                  @endforeach
               </div>
               @endif
               @if(session('message'))
               <div class="alert alert-success">
                  {{session('message')}}
               </div>
               @endif
               <div class="row">
                  <div class="col-sm-6">
                     <div class="dataTables_length" id="example1_length">
                        <label>
                           Show 
                           <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                              <option value="1">1</option>
                              <option value="5">5</option>
                              <option value="10">10</option>
                              <option value="20">20</option>
                           </select>
                           entries
                        </label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                           <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 51px;">ID</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 150px;">Product ID</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 300px;">Flash Sale ID</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 250px;">Discount Percent</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 150px;">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($productflashsales as $item)
                           <tr role="row" class="odd">
                              <td class="sorting_1">{{ $item->id }}</td>
                              <td>{{ $item->product_id }}</td>
                              <td>{{ $item->flash_sale_id}}</td>
                              <td>{{ $item->discount_percent}}</td>
                              <td>
                                 <span>
                                 <a class="btn btn-success" href="{{route('productflashsale.edit',$item->id)}}"> Edit </a>
                                 <a class="btn btn-danger" href="{{route('productflashsale.delete',$item->id)}}"> Delete </a>
                                 </span>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-5">
                     <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of {{count($productflashsales)}} entries</div>
                  </div>
                  <div class="col-sm-7">
                     {!! $productflashsales -> links() !!}
                  </div>
               </div>
            </div>
         </div>
         <!-- /.box-body -->
         <!-- Modal -->
         <div class="modal fade" id="myModalAdd" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('productflashsale.add')}}"  enctype='multipart/form-data'>
                        {{ csrf_field() }} 
                        <div class="form-group">
                            <h1>Thêm Sản Phẩm Product Flash Sale</h1>
                            <br>
                            <label>Category</label>
                            <br>
                            <select id="categoryId" onchange="selectCategory()" class="form-control">
                               @foreach ($category as $item)
                               <option value="{{ $item->id }}">{{ $item->name }}</option>
                               @endforeach
                            </select>
                            <br>
                            <label>Product</label>
                            <br>
                            <select name="product_id" id="productId" class="form-control">
                                @foreach($category[0]->product as $item) 
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <label>Flash Sale</label>
                            <br>
                            <select name="flash_sale_id" class="form-control">
                               @foreach ($flashsale as $item)
                               <option value="{{ $item->id }}">{{ $item->name }}</option>
                               @endforeach
                            </select>
                            <br>
                            <label>Nhập giá Sale</label>
                            <br>
                            <input type="text" placeholder="Nhập giá Sale, 10% thì nhập 10" class="form-control" name="discount_percent" >
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm Sản phẩm Sale</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@stop
<script>
let category = <?= json_encode($category) ?>;
// console.log(category);

function showProduct(product) {
    console.log(product)
    $("#productId").empty();
    product.forEach( function (a) {
        $("#productId").append('<option value="'+a['id']+'">'+ a['name'] +'</option>')
    })
}

function selectCategory() {
    let category_id = $("#categoryId").val()
    let product = category.find(x => x["id"] == category_id).product;
    showProduct(product);
}
</script>