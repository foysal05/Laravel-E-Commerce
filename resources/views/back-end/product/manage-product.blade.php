@extends('back-end.master')
@section('content')
 
{{--  <h1 class="page-header">Manage Category</h1>   --}}
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product  Information
                        </div>
                        <br>
                        <a href="{{route('add-product')}}" class="btn btn-success">Add Product</a>
                        <h4 class="text-center text-success">{{ Session::get('message')}}</h4>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                           <th>Product Category</th>
                                           <th>Product Brand</th>
                                            <th>Publication Status</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                           ( $i=1)
                                        @endphp
                                        @foreach ($products as $product)
                                            
                                        
                                        <tr class="odd gradeX">
                                            <td>{{ $i++}}</td>
                                            <td><img src="{{asset ($product->product_image) }}" width="100" height="100"></td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->brand_name }}</td>
                                            {{--  <td>{{ $product->short_description }}</td>  --}}
                                            <td>{{ $product->publication_status == 1 ?   'Published'  :  'Unpublished' }}</td>
                                            {{--  <td>{{ $category->publication_status}}</td>  --}}
                                           
                                            <td class="center">
                                                    <a href="{{ route('unpublished',['id'=>$product->id])}}" title="View Details" class="btn btn-info btn-xs">
                                                            <span class="glyphicon glyphicon-eye-open"></span>
                                                        </a>
                                                @if ($product->publication_status == 1)
                                                    <a href="{{ route('unpublished',['id'=>$product->id])}}" title="Published" class="btn btn-info btn-xs">
                                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                                </a>
                                                @else
                                                    <a href="{{ route('published',['id'=>$product->id])}}" title="Unpublished" class="btn btn-warning btn-xs">
                                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                                </a>
                                                @endif
                                                
                                                <a href="{{ route('edit_product',['id'=>$product->id])}}" title="Update Product Info" class="btn btn-success btn-xs">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                <a href="{{ route('delete_product',['id'=>$product->id])}}" title="Delete Product" class="btn btn-danger btn-xs">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            
@endsection