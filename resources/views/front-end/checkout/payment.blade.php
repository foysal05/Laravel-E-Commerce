@extends('front-end.master')
@section('content')
<div class="container">
				<div class="row">
						<div class="col-md-12 well ">
							<h3 class=" col-md-offset-2"> Dear {{ Session::get('customerName')  }} .You have complete payment process to get your order.</h3>
							 <br>
							 <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
						</div>
						
				{{-- <div class="col-md-5 well col-md-offset-4"> --}}
				<div class="col-md-8 well col-md-offset-2">
					<h2>Payment Step</h2>
					<br>
					<form action="{{route('new-order')}}" method="POST">
						{{ csrf_field() }}
					<table class="table">
						<tr>
							<th>Payment Mathod</th>
						</tr>
						<tr>
							<td ><input type="radio" required name="payment_type" value="Cash" > <b>Cash On Delivery</b></td>
							<td ><input type="radio" required name="payment_type" value="PayPal"> <b>PayPal</b></td>
							<td ><input type="radio" required name="payment_type" value="bKash"> <b>bKash</b></td>
						</tr>
					</table>
					
					<br>
					<input type="submit" class="btn btn-success btn-block" name="" value="Next" >
					</form>






				


				</div>
				
				
				</div>

				
			</div>
		</div>
@endsection