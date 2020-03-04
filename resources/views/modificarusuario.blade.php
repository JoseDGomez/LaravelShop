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
                  
                    <h3>Modificar datos</h3>
					<form action="{{ url('/checkout') }}" method="post">
                        {{ csrf_field() }}
                    <input class="input" type="text" name="direccion" value="{{auth()->user()->direccion}}" placeholder="Direccion" >
                    <input class="input" type="text" name="dni" value="{{auth()->user()->dni}}" placeholder="DNI" >
                    <input class="input" type="text" name="nombre" value="{{auth()->user()->name}}" placeholder="Nombre" >
                    <input class="input" type="text" name="apellidos" value="{{auth()->user()->apellidos}}" placeholder="Apellidos" >
                    
                    <input type="submit" class="primary-btn " value="Modificar"><input type="submit" class="primary-btn " align="right" value="Modificar">
					</form>
                        
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