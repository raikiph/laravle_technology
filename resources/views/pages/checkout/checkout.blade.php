@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Trang chu</a></li>
				  <li class="active">Gio hang cua ban</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="register-req">
				<p>Lam on dang nhap de thanh toan gio hang va xem lich su mua hang</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Dien thong tin gui hang</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout-customer')}}" method="post">
                                    {{ csrf_field() }}
									<input type="text" name="shipping_email" placeholder="Email">
									<input type="text" name="shipping_name" placeholder="Ho va ten">
									<input type="text" name="shipping_address" placeholder="Dia chi">
									<input type="text" name="shipping_phone" placeholder="So dien thoai">
							        <p>Ghi chu gui hang</p>
                                    <textarea name="shipping_note"  placeholder="Ghi chu don hang cua ban" rows="16"></textarea>
                                    <input type="submit" name="send-order" class="btn btn-primary btn-sm" 
                                    value="Gui">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lai gio hang</h2>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
@endsection