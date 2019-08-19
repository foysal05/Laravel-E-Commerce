@extends('front-end.master')
@section('content')
<div class="container">
				<div class="row">
						<div class="col-md-12 well ">
							<h3 class=" col-md-offset-2"> Dear {{ Session::get('customerName')  }} .You have to give us product shipping address to receive your product.</h3>
							 <br>
							 <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
						</div>
						
				{{-- <div class="col-md-5 well col-md-offset-4"> --}}
				<div class="col-md-8 well col-md-offset-2">
					<h2>Shipping info goes here...</h2>
					<br>
					
					{{-- <form action="{{ route('customer-sign-up')  }}"> --}}
					<form action="{{url('/shipping/save')}}" method="POST">
						{{ csrf_field() }}
						
						{{--  {!! Form::open('action'=>'route('register')', 'method'=>'post' !!}  --}}
						 {{--  {{ Form::open(['route' => 'register','class'=>'form form-horizontal'] ) }}  --}}
						
						<div class="form-group">
							<label >First Name</label>
							<input  class="form-control"  type="text" value="{{ Session::get('customerName')  }}" name="full_name">
							 <span class="text-danger">{{ $errors->has('full_name') ? $errors->first('full_name') : ' ' }}</span>
						</div>
						
						<div class="form-group">
							<label>Email</label>
							<input  class="form-control" required value="{{ $customer->email_address }}" type="email" name="email_address">
							 <span class="text-danger">{{ $errors->has('email_address') ? $errors->first('email_address') : ' ' }}</span>
						</div>
						<div class="form-group">
							<label >Phone</label>
							<input  class="form-control" value="{{ $customer->phone }}" required type="text" name="phone">
							 <span class="text-danger">{{ $errors->has('phone') ? 'The phone number must be 11 digits' : ' ' }}</span>
						</div>
						
						<style>
							textarea {
								resize: none;
							}
						</style>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required rows="5" cols="50" name="address" name="address">{{ $customer->address }}</textarea>
						</div>
						<div class="form-group">
							
							<input class="btn btn-success btn-block" value="Save Shipping Info" name="btn" type="submit">
						</div>
				
				{!! Form::close() !!}
				


				</div>
				
				
				</div>

				
			</div>
		</div>
@endsection