@extends('layout.app')
@section('content')
<section class="content">
    <div class=row>
      <div col-xs-12>
      <div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
        <div class="box-header col-sm-12">
            <a class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add Product</a>
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
                <div class="col-sm-4">
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
                <div class="col-sm-4">
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
                <div class="col-sm-4">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 51px;">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 246px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 200px;">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">Price</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 56px;">Sale</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 76px;">Category ID</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                  @if($item->image == 'no-image.png')
                                      <img src="{{ asset('image/no-image.png')}}" style="width: 100px;height: 75px" alt="">
                                  @else 
                                      <img src="{{ asset('source/image/product/'. $item->image)}}" style="width: 100px;height: 75px" alt="">
                                  @endif
                                </td>
                                
                                @if($item->promotion_price!=0)
                                <td>{{ number_format($item ->unit_price) }} đồng</td>
                                <td>{{ number_format($item ->promotion_price) }} đồng</td>
                                @else
                                <td>{{ number_format($item ->unit_price) }} đồng</td>
                                <td>{{ number_format($item ->unit_price) }} đồng</td>
                                @endif
                                <td>{{ $item->product_type->name }}</td>
                                <td>
                                    <span>
                                        <a class="btn btn-success" href="#"> Edit </a>
                                        <a class="btn btn-danger" href="#"> Delete </a>
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
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-7">
                    {!! $products -> links() !!}
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
                        <form action="{{route('product.add')}}" method="POST" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Product Name</label>
                                <br>
                                <input type="text" name="name" placeholder="Nhập tên Product" style="width:100%; height:40px">
                                <br>
                                <label>Image</label>
                                <br>
                                <input type="file" name="image-product" id="image-product">
                                <br>
                                <label>Product Price</label>
                                <br>
                                <input type="text" name="unit_price" placeholder="Nhập giá sản phẩm" style="width:100%; height:40px">
                                <br>
                                <label>Product Sale</label>
                                <br>
                                <input type="text" name="promotion_price" placeholder="Nhập giá Sale, nếu không có thì nhập 0" style="width:100%; height:40px">
                                <br>
                                <label>Product Type</label><br>
                                <select name="id_type">
                                    @foreach ($product_type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="product_type_id" style="width:100%; height:40px" placeholder="Nhập id category , chỉ nhập số không nhập chữ"> --}}
                                <br>
                            </div>
                            <button type="submit" class="btn btn-success"> Submit </button>
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
