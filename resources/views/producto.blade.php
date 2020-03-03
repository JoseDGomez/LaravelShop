@include('layouts.header');

		

        
            
        
		<!-- SECTION -->
		<div class="section">
            
			<!-- container -->
			<div class="container">
               
				<!-- row -->
				<div class="row">
                    @foreach ($detalles as $detalles)
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
                       
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{asset('/img/'.$detalles->Imagen)}}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->
                    
					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./img/product01.png" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

                    <!-- Product details -->
                    
                        
                    
						
					
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$detalles->Nombre}}</h2>
							
							<div>
								<h3 class="product-price">{{round($detalles->Precio_Venta-(($detalles->Precio_Venta*$detalles->Descuento)/100),2)}}<del class="product-old-price">{{$detalles->Precio_Venta}}</del></h3>
								@if ($detalles->Stock > 0)
								<span class="product-available">En stock</span>
								@else
								<span class="product-old-price">Sin existencias</span>
								@endif
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="add-to-cart">
								@if ($detalles->Stock > 0)
								<div class="qty-label">
									Qty
									
									<div class="input-number">
										<form action="{{ url('/addProducto') }}" method="post">
											{{ csrf_field() }}
										<input type="number" name="cantidad" value=1>
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
									
								</div>
								<!-- /Hidden form para datos del producto -->
								
									<input type="hidden" name="id" value="{{ $detalles->idProductos }}">
									
									
								<input type="submit" class="add-to-cart-btn" value=" add to cart">
										</form>
									@else
										
									@endif
									
								<!-- /Hidden form para datos del producto -->
							</div>
						</div>
					</div>
					@endforeach
					<!-- /Product details -->
					
					
					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
                                <!-- /tab2  -->
                                
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	

		

		@include('layouts.footer');