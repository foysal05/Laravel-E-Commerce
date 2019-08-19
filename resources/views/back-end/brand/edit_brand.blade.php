@extends('back-end.master')
@section('content')
 <br>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Add Brand Form</h4>
                </div>

                
                <hr>
                <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                {{ Form::open(['route' => 'update_brand','class'=>'form form-horizontal'] ) }}

                         {{--  {{ Form::label('brand_name', 'Brand Name',['class'=>'col-md-4'] ) }}
                        {{ Form::text('brand_name','', ['class' => 'form-control col-md-8'] )  }}  --}}
                        <input type="hidden" name="id" value="{{ $brand->id}}">

                        .<div class="form-group">
                            <label for="cateogry_name" class="control-label col-md-4">Brand Name</label>
                            <div class="col-md-8">
                               
                                <input type="text" class="form-control col-md-8" name="brand_name" value="{{ $brand->brand_name }}">
                                <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</span>
                            </div>
                        </div>
                        .<div class="form-group">
                            <label for="brand_description" class="control-label col-md-4">Brand Description</label>
                            <div class="col-md-8">
                               
                                
                                <textarea class="form-control col-md-8" name="brand_description">{{ $brand->brand_description }}</textarea>
                                <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand_status" class="control-label col-md-4">Publication Status </label>
                            <div class="col-md-8">
                                 <label><input type="radio"  class="" value="1" {{ $brand->publication_status==1? 'checked' : ''  }}  name="publication_status"/>Published</label>
                                 <label><input type="radio"  class="" value="0"  {{ $brand->publication_status==0? 'checked' : ''  }} name="publication_status"/>Unpublished</label>
                                 <br>
                                 <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-md-8 col-md-offset-4">
                                 {{ Form::submit('Save Brand Info',['class'=>'btn btn-success btn-block','name'=>'btn_save']) }}
                            </div>
                        </div>

                {{ Form::close() }}
          

            </div>
        </div>
    </div>
    
</div>

@endsection