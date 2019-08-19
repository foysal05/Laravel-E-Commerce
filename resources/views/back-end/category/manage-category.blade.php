@extends('back-end.master')
@section('content')
 
{{--  <h1 class="page-header">Manage Category</h1>   --}}
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Category Information
                        </div>
                        <br>
                        <a href="{{route('add-category')}}" class="btn btn-success">Add Category</a>
                        <h4 class="text-center text-success">{{ Session::get('message')}}</h4>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Category Name</th>
                                           <th>Category Description</th>
                                            <th>Publication Status</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                           ( $i=1)
                                        @endphp
                                        @foreach ($categories as $category)
                                            
                                        
                                        <tr class="odd gradeX">
                                            <td>{{ $i++}}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_description }}</td>
                                            <td>{{ $category->publication_status == 1 ?   'Published'  :  'Unpublished' }}</td>
                                            {{--  <td>{{ $category->publication_status}}</td>  --}}
                                           
                                            <td class="center">
                                                @if ($category->publication_status == 1)
                                                    <a href="{{ route('unpublished',['id'=>$category->id])}}" class="btn btn-info btn-xs">
                                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                                </a>
                                                @else
                                                    <a href="{{ route('published',['id'=>$category->id])}}" class="btn btn-warning btn-xs">
                                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                                </a>
                                                @endif
                                                
                                                <a href="{{ route('edit_category',['id'=>$category->id])}}" class="btn btn-success btn-xs">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                <a href="{{ route('delete_category',['id'=>$category->id])}}" class="btn btn-danger btn-xs">
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