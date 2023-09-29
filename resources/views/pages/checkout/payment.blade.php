@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Trang chu</a></li>
				  <li class="active">Thanh toan gio hang</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="review-payment">
				<h2>Xem lai gio hang</h2>
			</div>
            <div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hinh anh</td>
							<td class="description">Mo ta</td>
							<td class="price">Gia</td>
							<td class="quantity">So luong</td>
							<td class="total">Tong tien</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
            <h4 style="margin: 40px 0;font-size:20px;">Chon hinh thuc thanh toan</h4>
			<form action="{{URL::to('/order-place')}}" method="POST">
                {{ csrf_field() }}
                <div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Tra bang the atm</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="checkbox"> Nhan tien mat</label>
					</span>
					<span>
						<label><input name="payment_option" value="3" type="checkbox"> Thanh toan the ghi no</label>
					</span>
					<input type="submit" name="send_order_place" class="btn btn-primary btn-sm" 
                                    value="Dat hang">
				</div>
                </form>

		</div>
	</section> <!--/#cart_items-->
@endsection