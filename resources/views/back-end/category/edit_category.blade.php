@extends('back-end.master')
@section('content')
 <br>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Update Category Form</h4>
                </div>
                <hr>
                <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
            <form class="form form-horizontal" method="POST" action="{{route('update_category')}}">
                {{ csrf_field() }}
                    .<div class="form-group">
                        <label for="cateogry_name" class="control-label col-md-4">Category</label>
                        <div class="col-md-8">
                              <input id="cateogry_name" value="{{ $category->category_name  }}" name="category_name" class="form-control" type="text">
                              <input  value="{{ $category->id  }}" name="category_id" class="form-control" type="hidden">
                        </div>
                    </div>
                    .<div class="form-group">
                        <label for="cateogry_description" class="control-label col-md-4">Category Description</label>
                        <div class="col-md-8">
                             <textarea name="category_description" resize="disable" class="form-control">value="{{ $category->category_description  }}"</textarea>
                        </div>
                    </div>
                    .<div class="form-group">
                        <label for="cateogry_description" class="control-label col-md-4">Publication Status</label>
                        <div class="col-md-8">
                             <label><input type="radio" checked class="" value="1" {{ $category->publication_status==1? 'checked' : ''  }} name="publication_status"/>Published</label>
                             <label><input type="radio"  class="" value="0" {{ $category->publication_status==0? 'checked' : ''  }} name="publication_status"/>Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-8 col-md-offset-4">
                              <input id="" name="btn" class="btn btn-success btn-block" value="Update Category Info" type="submit">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    
</div>

@endsection