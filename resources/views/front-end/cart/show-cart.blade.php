@extends('front-end.master')
@section('inner-banner')
	//@include('front-end.partials.banner')
	<div class="banner1">
			<div class="container">
				<h3><a href="{{ route('index')  }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Home</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> / </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dual</font></font></span></h3>
			</div>
		</div>
@endsection
@section('content')


<div class="content">
		<!--single-->
		<div class="single-wl3">
			<div class="container">
				<div class="row">
				<div class="col-md-11 col-md-offset-1">
					<h3 class="text-center text-success" >My Shopping Cart</h3>
					<hr>
					<h4 class="text-center text-success">{{ Session::get('message')}}</h4>
					<br>
					<table class="table table-bordered">
						<tr class="bg-primary text-center" style="color:white">
							<td style="color:white">SL. No.</td>
							<td style="color:white">Name</td>
							<td style="color:white">Image</td>
							<td style="color:white">Quantity</td>
							<td style="color:white">Unit Price</td>
							<td style="color:white">Price</td>
							<td style="color:white">Action</td>
						</tr>
									@php
                                           ( $i=1);
                                           ( $sum=0)
                                        @endphp
						@foreach ($cartProducts as $cartProduct)
							
					
						<tr class="text-center">
							<td>{{ $i++ }}</td>
							<td>{{ $cartProduct->name  }}</td>
							<td><img src="{{ asset($cartProduct->options->image)  }}" width="80" height="80"></td>
							<td>
								
								{!! Form::open(['route'=>'update-cart','method'=>'post]']) !!}
								<input type="number" value="{{ $cartProduct->qty  }}" min="1" name="qty" >
								<input type="hidden" value="{{ $cartProduct->rowId  }}" min="1" name="rowId" >
								<input type="submit" name="quantityUpdate" value="Update" >

								
								{!! Form::close() !!}
								
							
							</td>
							<td>{{ $cartProduct->price  }}</td>
							<td>{{ $cartProduct->subtotal  }}</td>
							<td>
								<a href="{{ route('delete-cart-item',['rowId'=>$cartProduct->rowId])  }}" class="btn btn-danger btn-xs" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@php
							$sum+=$cartProduct->subtotal;
						@endphp
							@endforeach
							<tfoot>
   		<tr>
   			<td colspan="5">&nbsp;</td>
   			<td>Subtotal</td>
   			<td><?php echo Cart::subtotal(); ?></td>
   		</tr>
   		<tr>
   			<td colspan="5">&nbsp;</td>
   			<td>Vat</td>
   			<td><?php echo Cart::tax(); ?></td>
   		</tr>
   		<tr>
   			<td colspan="5">&nbsp;</td>
   			<td>Total</td>
   			<td><?php echo Cart::total(); ?></td>
   		</tr>
   	</tfoot>

					</table>
					<table class="table bg-primary table-bordered" >
						<tr class="text-center" >
							<th >Total Price (BDT) :  </th>
							<td style="color:white">{{ $sum }}</td>
						</tr>
						<tr class="text-center">
							<th>Total Vat (BDT) :  </th>
						<td style="color:white">{{ $vat=0 }}</td>
					</tr>
						<tr class="text-center">
							<th>Grand Total  (BDT) :  </th>
						<td  style="color:white">{{ $orderTotal=$sum+$vat }}</td>
						</tr>
									@php
										Session::put('orderTotal',$orderTotal)
									@endphp		
					</table>

				</div>
				<div class="col-md-11 col-md-offset-1">
					@if (Session::get('customerId') && Session::get('shippingId') )
						<a href="{{ url('checkout/payment') }}" class="btn btn-success pull-right ">Checkout</a>
					@elseif( Session::get('customerId'))
					<a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right ">Checkout</a>
					@else 
						<a href="{{ route('checkout') }}" class="btn btn-success pull-right ">Checkout</a>
					@endif

					
					<a href="" class="btn btn-success ">Continue Shopping</a>
					</div>
				</div>

				
			</div>
		</div>
		<!--single-->
		
	</div>


@stop