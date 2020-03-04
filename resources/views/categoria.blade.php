@include('layouts.header');
	
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					@foreach ($categoria as $item)
						
					
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('/img/'.$item->Imagen)}}" alt="">
							</div>
							<div class="shop-body">
								<h3>{{$item->Nombre}}</h3>
								<a href="{{url('categoria/'.$item->idCategoria)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					@endforeach
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
		<!-- HOT DEAL SECTION -->
		
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							@foreach ($nombre as $item)
							<h3 class="title">{{$item->Nombre}}</h3>
							@endforeach
							
							<div class="section-nav">
								
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div id="store" class="col-md-9" id="divporculero">
						

						<!-- store products -->
						<div class="row">
						@foreach ($articulos as $articulo)
							
						
							<!-- product -->
							<div class="col-md-3 col-xs-6" >
								<div class="product">
									<div class="product-img">
										<img src="{{asset('/img/'.$articulo->Imagen)}}" alt="">
										<div class="product-label">
											<span class="sale">{{$articulo->Descuento}}%</span>
											<span class="new">Destacado</span>
										</div>
									</div>
									<div class="product-body">
										
										<h3 class="product-name"><a href="{{url('producto/'.$articulo->idProductos)}}">{{$articulo->Nombre}}</a></h3>
										<h4 class="product-price">{{round($articulo->Precio_Venta-(($articulo->Precio_Venta*$articulo->Descuento)/100),2)}} €<del class="product-old-price">{{$articulo->Precio_Venta}} €</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
									</div>
								</div>
							</div>
							
							<!-- /product -->
							@endforeach	
							
						</div>
						
						<li><p>{{$articulos->links()}}</p></li>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
		
		

		@include('layouts.footer');