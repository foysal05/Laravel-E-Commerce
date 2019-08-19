@extends('back-end.master')
@section('content')
 <br>
 <script type="text/javascript">
    function isNumberKey(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
         //If you don't want to allow decimals
        //if (charCode > 31 && (charCode < 48 || charCode > 57))
        //If you want to allow decimals
        if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
          return false;
      return true;
  }
</script> 
 <script type="text/javascript">
    function isQuantity(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
         //If you don't want to allow decimals
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        //If you want to allow decimals
       // if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
          return false;
      return true;
  }
</script> 
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-heading">

                    <h4 class="text-center text-success">Add Product Form</h4>
                    
                </div>
                <hr>
                <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
            <form class="form form-horizontal" method="POST" action="{{route('update-product')}}" enctype= 'multipart/form-data'>
				{{ csrf_field() }}
		<input name="id" type="hidden" value="{{ $product->id }}" >
                    .<div class="form-group">
                        <label for="cateogry_name" class="control-label col-md-4">Category Name</label>
                        <div class="col-md-8">
                              <select class="form-control" name="category_id">
                                <option value="">--Select Category Name--</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id==$category->id? 'selected' : ''  }} >{{ $category->category_name }}</option>
                                @endforeach
                                  
                              </select>
                               {{-- <span class="text-danger">{{ $errors->has('category_id')? $errors->first('category_id') : ' ' }}</span>  --}}
                               <span class="text-danger">{{ $errors->has('category_id')? 'The Category field is required.' : ' ' }}</span> 
                        </div>
                    </div>
                    .<div class="form-group">
                        <label for="cateogry_description" class="control-label col-md-4">Brand Name</label>
                        <div class="col-md-8">
                            <select class="form-control" name="brand_id">
                                <option value="">--Select Brand Name--</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id==$brand->id? 'selected' : ''  }}  >{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                              <span class="text-danger">{{ $errors->has('brand_id')? 'The Brand field is required.' : ' ' }}</span> 
                        </div>
                    </div>
                    .<div class="form-group">
                        <label for="cateogry_description" class="control-label col-md-4">Product Name</label>
                        <div class="col-md-8">
                            <input type="text" value="{{ $product->product_name }}" class="form-control" name="product_name">
                              <span class="text-danger">{{ $errors->has('product_name')? $errors->first('product_name') : ' ' }}</span> 
                        </div>
                    </div>
                    .<div class="form-group">
                        <label for="cateogry_description" class="control-label col-md-4">Product Price</label>
                        <div class="col-md-8">
                            <input type="text" value="{{ $product->product_price }}" onkeypress="return isNumberKey(event)" class="form-control" name="product_price">
                              <span class="text-danger">{{ $errors->has('product_price')? $errors->first('product_price') : ' ' }}</span> 
                        </div>
                    </div>
                    .<div class="form-group">
                        <label for="cateogry_description" class="control-label col-md-4">Product Quantity</label>
                        <div class="col-md-8">
                            <input type="text" value="{{ $product->product_quantity }}" onkeypress="return isQuantity(event)" class="form-control" name="product_quantity">
                              <span class="text-danger">{{ $errors->has('product_quantity')? $errors->first('product_quantity') : ' ' }}</span> 
                        </div>
                    </div>
                    ..<div class="form-group">
                        <label for="short_description" class="control-label col-md-4">Short Description</label>
                        <div class="col-md-8">
                          
                                <textarea id="short_description" class="form-control" name="short_description"  rows="3">{{ $product->short_description }}</textarea>
                            
                              <span class="text-danger">{{ $errors->has('short_description')? $errors->first('short_description') : ' ' }}</span> 
                        </div>
                    </div>
                    ..<div class="form-group">
                        <label for="long_description" class="control-label col-md-4">Long Description</label>
                       
                    </div>
                    <label for="short_description" class="control-label col-md-2"></label>
                    <div class="col-md-10">
                        
                        <textarea id="editor" class="form-control" name="long_description"  rows="3">{{ $product->long_description }}</textarea>
                    
                      <span class="text-danger">{{ $errors->has('long_description')? $errors->first('long_description') : ' ' }}</span> 
                </div>
                    ..<div class="form-group">
                        <label for="short_description" class="control-label col-md-4">Product Image</label>
                        <div class="col-md-8">
                            ,
                                
                             <input type="file" class="form-control" value="{{ $product->product_name }}" name="product_image" accept=".jpg,.jpeg,.png">
                            <img class="img-fluid" src="{{ asset($product->product_image) }}" width="100" height="100"  alt="">
                              <span class="text-danger">{{ $errors->has('product_image')? $errors->first('product_image') : ' ' }}</span> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cateogry_description" class="control-label col-md-4">Publication Status</label>
                        <div class="col-md-8">
                             <label><input type="radio" {{ $product->publication_status==1? 'checked' : ''  }}    class="" value="1" name="publication_status"/>Published</label>
                             <label><input type="radio" {{ $product->publication_status==0? 'checked' : ''  }}  class="" value="0" name="publication_status"/>Unpublished</label>
                             <br>
                             <span class="text-danger">{{ $errors->has('publication_status')? $errors->first('publication_status') : ' ' }}</span>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-8 col-md-offset-4">
                              <input id="" name="btn" class="btn btn-success btn-block" value="Update Product Info" type="submit">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    
</div>

@endsection