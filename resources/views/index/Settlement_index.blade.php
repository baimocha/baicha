@extends('public.header_index')
@extends('public.footer_index')
@section('data')
@section('datas')
	
	
	
	<!-- checkout -->
	<div class="checkout pages section">
		<div class="container">
			<div class="pages-head">
				<h3>结账</h3>
			</div>
			<div class="checkout-content">
				<div class="row">
					<div class="col s12">
						<ul class="collapsible" data-collapsible="accordion">
							<li>
								<div class="collapsible-header active"><h5>1 - 订单单号</h5></div>
								<div class="collapsible-body">
									<form action="#" class="checkout-radio">
										@foreach($res as $v)
										<div class="row">
											<div class="col s5">
												<h5>单号</h5>
											</div>
											<div class="col s7">
												<h5><a href="">{{$v->oid}}</a></h5>
											</div>
										</div>
										@endforeach
									</form>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><h5>2 - 收货人信息</h5></div>
								<div class="collapsible-body">
									<div class="billing-information">
										<form action="#">
											<div class="input-field">
												<h5>姓名*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>地址*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>电话*</h5>
												<input type="number" class="validate" required>
											</div>
											<a href="" class="btn button-default">CONTINUE</a>
										</form>
									</div>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><h5>3 - 付款方式</h5></div>
								<div class="collapsible-body">
									<div class="payment-mode">
										<form action="#" class="checkout-radio">
												<div class="input-field">
													<input type="radio" class="with-gap" id="bank-transfer" name="group1">
													<label for="bank-transfer"><span>支付宝</span></label>
												</div>
												<div class="input-field">
													<input type="radio" class="with-gap" id="cash-on-delivery" name="group1">
													<label for="cash-on-delivery"><span>微信</span></label>
												</div>
												<div class="input-field">
													<input type="radio" class="with-gap" id="online-payments" name="group1">
													<label for="online-payments"><span>货到付款</span></label>
												</div>
	
											<a href="" class="btn button-default">CONTINUE</a>
										</form>
									</div>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><h5>4 - 订单详细</h5></div>
								<div class="collapsible-body">
									<div class="order-review">
									@foreach($res as $v)
										<div class="row">
											
											<div class="col s12">
												<div class="cart-details">
												
													<div class="col s5">
														<div class="cart-product">
															<h5>Image</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<img src="{{$v->zhou_img}}" alt="">
														</div>
													</div>
												</div>
												<div class="divider"></div>
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>Name</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<a href="">{{$v->name}}</a>
														</div>
													</div>
												</div>
												<div class="divider"></div>
											</div>
											
										</div>
									@endforeach
									</div>
									<div class="order-review final-price">
										<div class="row">
											<div class="col s12">
												@foreach($data as $v)
												<div class="cart-details">
													<div class="col s8">
														<div class="cart-product">
															<h5>共计</h5>
														</div>
													</div>
													<div class="col s4">
														<div class="cart-product">
															<span>${{$v->pay_money}}</span>
														</div>
													</div>
												</div>
												@endforeach
											</div>
										</div>
										<a href="{{ url('pay')}}?id={{$res['0']->oid }}" class="btn button-default button-fullwidth">CONTINUE</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end checkout -->
@endsection('data')
@endsection('datas')