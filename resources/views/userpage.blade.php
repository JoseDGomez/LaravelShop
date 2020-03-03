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
								  @foreach ($pedido as $pedidos)
								<tr>
								  <td>{{$pedidos->idPedido}}</td>
								  <td>{{$pedidos->Nombre}}</td>
								  <td>{{$pedidos->Apellidos}}</td>
								  <td>{{$pedidos->Fecha}}</td>
								  <td>{{$pedidos->Direccion}}</td>
								  <td>{{$pedidos->DNI}}</td>
								  <td>{{$pedidos->Estado}}</td>
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