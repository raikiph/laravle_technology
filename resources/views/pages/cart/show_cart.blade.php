@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <!-- <li><a href="{{URL::to('/')}}">Trang chu</a></li> -->
				  <li class="active">Gio hang cua ban</li>
				</ol>
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
			<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tong <span>$59</span></li>
							<li>Thue <span>$2</span></li>
							<li>Phi van chuyen <span>Free</span></li>
							<li>Thanh tien <span>$61</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							<?php
								use Illuminate\Support\Facades\Session;
								$customer_id  = Session::get('customer_id');
								if($customer_id!= NULL){
								?>
										<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toan</a>
								<?php
								}else{
									?>
								<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toan</a>
								<?php
								}
								?>		
					
					</div>
				</div>
		</div>
	</section> <!--/#cart_items-->
@endsection