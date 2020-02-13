@include('layouts.header');
		
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Mi carrito</h3>
						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                  
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:8%">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach (Cart::content() as $item)
								
							
							<td data-th="Product">
								<div class="row">
									
									<div class="col-sm-10">
									<h4 class="nomargin">{{$item->name}}</h4>
										
									</div>
								</div>
							</td>
							<td data-th="Price">{{$item->price}}</td>
							<td data-th="Quantity">
							<form action="{{url('/updateProducto')}}" method="post">
								{{ csrf_field() }}
								
								<input type="number" name="qty" class="form-control text-center" value="{{$item->qty}}">
								<input type="hidden" name="id" value="{{ $item->rowId }}">
								
							</td>
							<td data-th="Subtotal" class="text-center">{{($item->price)*($item->qty)}} €</td>
							<td class="actions" data-th="">
							<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button></a>
							</form>
							<form action="{{url('/deleteProducto')}}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $item->rowId }}">
								<a><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>	
							</form>						
							</td>
						</tr>
						@endforeach
					</tbody>
					
					
					<tfoot>
						
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir comprando</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>  Total: {{Cart::total()}} €</strong></td>
							@if (Cart::count() == 0)
								
							@else
							@guest
							<td><a href="#" class="btn btn-success btn-block">Inicia sesion para comprar<i class="fa fa-angle-right"></i></a></td>
							@else
							<td><a href="#" class="btn btn-success btn-block">Proceder al pago <i class="fa fa-angle-right"></i></a></td>
							@endguest
							@endif
						</tr>
						
					</tfoot>
				</table>
</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

	@include('layouts.footer');