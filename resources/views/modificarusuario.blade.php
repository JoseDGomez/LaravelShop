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
                    @if ($errors->any())
                    <div class="row text-center" style="margin-left:0.5px;">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @elseif(Session::has("exito"))
                    <div class="container">
                        <div class="row text-center">
                            <div class="alert alert-success">
                                <span>Datos modificados con exito</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <h3>Modificar datos</h3>
					<form action="{{ url('/updateUser') }}" method="post">
                        {{ csrf_field() }}
                        <div class="toggle-bar">
                            <div class="toggle-register">
                                <label for="exampleFormControlInput1"><h4>Informacion de la cuenta</h4></label>
                            </div>
                            </div>
                            @if ($errors->any())
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" value="{{old('apellidos')}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" value="{{old('direccion')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Correo Electronico</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">DNI</label>
                                    <input type="text" class="form-control" name="dni" value="{{old('dni')}}">
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="{{Auth::user()->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" value="{{Auth::user()->apellidos}}">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" value="{{Auth::user()->direccion}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Correo Electronico</label>
                                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">DNI</label>
                                    <input type="text" class="form-control" name="dni" value="{{Auth::user()->dni}}">
                                </div>
                            @endif
                    
                    <input type="submit" class="primary-btn " value="Modificar">
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