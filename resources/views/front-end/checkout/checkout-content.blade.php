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
						<div class="col-md-12 well">
							<h3>You have to login to complete order process, If you are not registered please complete registration first.</h3>
							 <br>
							 <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
						</div>
						
				{{-- <div class="col-md-5 well col-md-offset-4"> --}}
				<div class="col-md-5 well col-md-offset-1">
					<h2>Register, if tou ate not registered</h2>
					<br>
					
					{{-- <form action="{{ route('customer-sign-up')  }}"> --}}
					<form action="{{url('customer/signup')}}" method="POST">
						{{ csrf_field() }}
						
						{{--  {!! Form::open('action'=>'route('register')', 'method'=>'post' !!}  --}}
						 {{--  {{ Form::open(['route' => 'register','class'=>'form form-horizontal'] ) }}  --}}
						
						<div class="form-group">
							<label >First Name</label>
							<input  class="form-control"  type="text" name="first_name">
							 <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : ' ' }}</span>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input  class="form-control" required  type="text"  name="last_name">
							 <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : ' ' }}</span>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input  class="form-control" required type="email" name="email_address">
							 <span class="text-danger">{{ $errors->has('email_address') ? $errors->first('email_address') : ' ' }}</span>
						</div>
						<div class="form-group">
							<label >Phone</label>
							<input  class="form-control" required type="text" name="phone">
							 <span class="text-danger">{{ $errors->has('phone') ? 'The phone number must be 11 digits' : ' ' }}</span>
						</div>
						<div class="form-group">
							<label >Password</label>
							<input class="form-control" type="password" name="password">
							 <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
						</div>
						<div class="form-group">
							<label >Confirm Password</label>
							<input  class="form-control" required type="password" name="confirm_password">
							 <span class="text-danger">{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : ' ' }}</span>
						</div>
						<style>
							textarea {
								resize: none;
							}
						</style>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required rows="5" cols="50" name="address" name="address"></textarea>
						</div>
						<div class="form-group">
							
							<input class="btn btn-success btn-block" value="Registration" name="btn" type="submit">
						</div>
				
				{!! Form::close() !!}
				


				</div>
				<div class="col-md-5 well" style="margin-left: 20px">
					<h2>Already Registered ? Login Here</h2>
					<h3 class="text-center text-danger">{{ Session::get('loginError') }}</h3>
					<br>
					<form action="{{ route('customer-login') }}" method="post">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="my-input">Email Address</label>
							<input id="my-input" class="form-control" type="email" name="email_address">
							<span class="text-danger">{{ $errors->has('email_address') ? $errors->first('email_address') : ' ' }}</span>
						</div>
						<div class="form-group">
							<label for="my-input">Password</label>
							<input id="my-input" class="form-control" type="password" name="password">
						</div>
						<div class="form-group">
						
							<input id="my-input" class="btn btn-info btn-block" type="submit" name="login">
						</div>
					</form>

				</div>
				
				</div>

				
			</div>
		</div>
		<!--single-->
		
	</div>


@stop