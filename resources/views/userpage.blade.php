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
                  

					<form action="{{ url('/baja') }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="id" value={{auth()->user()->id}}>
						<input type="submit" value="Dar de baja">
					</form>
					<a href="{{url('/modificardatos')}}"><button>Modificar datos</button></a>
					<br>
					<h2>Pedidos</h2>

					<div class="container">
					  <div class="row">
						<div class="col-xs-12">
						  <div class="table-responsive">
							<table  class="table table-bordered table-hover">
							  
							  <thead>
								<tr>
								  <th>Nº</th>
								  <th>Nombre</th>
								  <th>Apellidos</th>
								  <th>Fecha</th>
								  <th>Direccion</th>
								  <th>DNI</th>
								  <th>Estado</th>
								</tr>
							  </thead>
							  <tbody>
								  @foreach ($pedidos as $pedido)
									  
								  
								<tr>
								  <td>{{$pedido->idPedido}}</td>
								  <td>{{$pedido->Nombre}}</td>
								  <td>{{$pedido->Apellidos}}</td>
								  <td>{{$pedido->Fecha}}</td>
								  <td>{{$pedido->Direccion}}</td>
								  <td>{{$pedido->DNI}}</td>
								  <td>{{$pedido->Estado}}</td>
								  <td><a href="{{url('/pedido/'.$pedido->idPedido)}}"><button>Mostrar pedido</button></a>
									@if ($pedido->Estado != "E" && $pedido->Estado != "C")
									<a href="{{url('/cancelPedido/'.$pedido->idPedido)}}"><button>Cancelar</button></td>
									@else
										
									@endif

								</tr>
								@endforeach
							  </tbody>
							  
							</table>
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