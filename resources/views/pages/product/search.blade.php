@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Ket qua tim kiem</h2>
						@foreach($search_product as $key => $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
											<h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
											<p>{{$pro->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Them gio hang</a>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-heart"></i>Yeu thich</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>So sanh</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->
                    @endsection