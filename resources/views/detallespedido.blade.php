@include('layouts.header');
		
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header"></h3>
						
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
                  

					
					<a href="{{url('/download/'.$idPedido)}}"><button>Descargar PDF</button></a>
					<br>
					<h2>Tu pedido</h2>

					<div class="container">
					  <div class="row">
						<div class="col-xs-12">
						  <div class="table-responsive">
							<table  class="table table-bordered table-hover">
							  
							  <thead>
								<tr>
                                  <th>Nombre</th>
								  <th>Cantidad</th>
								  <th>Precio</th>
								  <th>Total</th>
								  
								</tr>
							  </thead>
							  <tbody>
								  @foreach ($productos as $producto)
                                  @if($producto !== end($productos))
								<tr>
                                  <td>{{$producto['Nombre']}}</td>
								  <td>{{$producto['Cantidad']}}</td>
								  <td>{{$producto['Precio']}}</td>
								  <td>{{$producto['Total']}}</td>
								  
                                </tr>
                                @endif
								@endforeach
							  </tbody>
							  
                            </table>
                            <div>
                            <h3>Total: {{$productos['totaltodo']}} €</h3>
                            </div>
						  </div><!--end of .table-responsive-->
						</div>
					  </div>
					</div>
					
				
					


				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

	@include('layouts.footer');