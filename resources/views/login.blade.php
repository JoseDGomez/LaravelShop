@include('layouts.header');
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">

                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Inicia Sesion</h3>
                    </div>
                    <form action="" method="post">
                    <div class="form-group">
                        <input class="input" type="text" name="nombre_usuario_inicio" placeholder="Nombre Usuario" value="">
                        
                    </div>
                    <div class="form-group">
                        <input class="input" type="password" name="pass_inicio" placeholder="Contraseña" value="">
                        
                    </div>
                    
                    <div class="form-group">
                        <button class="input" type="submit" >Iniciar sesion</button>
                    </div>
                    <div class="form-group">
                        <a href="">¿Olvidaste tu contraseña?</a>
                    </div>
                    </form>    
                </div>
            </div>
           
            <div class="col-sm-4">
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Crea Tu Cuenta</h3>
                    </div>
                    <form action="" method="post">
                    <div class="form-group">
                        <input class="input" type="text" name="nombre" placeholder="Nombre" value="">
                       
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="apellido" placeholder="apellido" value="">
                        
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="email" placeholder="Email" value="">
                        
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="direccion" placeholder="Direccion" value="">
                        
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="cp" placeholder="Codigo Postal" value="">
                        
                    </div>
                    <div class="form-group">
                    
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="dni" placeholder="DNI" value="">
                        
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="nombre_usuario" placeholder="Nombre Usuario" value="">
                        
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="pass" placeholder="Contraseña" value="">
                        
                    </div>
                   <div class="form-group">
                        <button class="input" type="submit" >Registrarse</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->

@include('footer');