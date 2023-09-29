@extends('welcome')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Dang nhap tai khoan</h2>
						<form action="{{URL::to('/login-customer')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="email_account" placeholder="Tai khoan" />
							<input type="password" name="password_account" placeholder="Mat khau" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nho dang nhap
							</span>
							<button type="submit" class="btn btn-default">Dang nhap</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoac</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Dang ky</h2>
						<form action="{{URL::to('/add-customer')}}" method="post">
                            {{ csrf_field() }}
							<input name="customer_name" type="text" placeholder="Ho va ten"/>
							<input name="customer_email" type="email" placeholder="Email dang ky"/>
							<input name="customer_password" type="password" placeholder="Mat khau"/>
							<input name="customer_phone" type="text" placeholder="So dien thoai"/>
							<button type="submit" class="btn btn-default">Dang ky</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection