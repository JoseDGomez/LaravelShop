@include('layouts.header')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
             
                <!-- /Billing Details -->

                <!-- Shiping Details -->
                <div class="shiping-details">
                    <div class="section-title">
                        <h3 class="title">Tu dirección de envio</h3>
                        <form action="{{ url('/checkout') }}" method="post">
                            {{ csrf_field() }}
                        <input class="input" type="text" name="direccion" value="{{auth()->user()->direccion}}" placeholder="Direccion" >
                        <input class="input" type="text" name="dni" value="{{auth()->user()->dni}}" placeholder="DNI" >
                        <input class="input" type="text" name="nombre" value="{{auth()->user()->name}}" placeholder="Nombre" >
                        <input class="input" type="text" name="apellidos" value="{{auth()->user()->apellidos}}" placeholder="Apellidos" >

                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="shiping-address" name="addressalt">
                        <label for="shiping-address">
                            <span></span>
                            ¿Quieres enviarlo a una direccion diferente?
                        </label>
                        <div class="caption">
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Shiping Details -->

              
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>Productos</strong></div>
                        <div><strong>SUBTOTAL</strong></div>
                    </div>
                    @foreach (Cart::content() as $item)
                        
                    
                    <div class="order-products">
                        <div class="order-col">
                            <div>{{$item->qty}} x {{$item->name}}</div>
                            <div>{{($item->price)*($item->qty)}} €</div>
                        </div>

                    @endforeach    
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">{{Cart::total()}} €</strong></div>
                    </div>
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1">
                        <label for="payment-1">
                            <span></span>
                            Direct Bank Transfer
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2">
                        <label for="payment-2">
                            <span></span>
                            Cheque Payment
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-3">
                        <label for="payment-3">
                            <span></span>
                            Paypal System
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">
                        <span></span>
                        I've read and accept the <a href="#">terms & conditions</a>
                    </label>
                </div>
                <button type="submit" class="primary-btn order-submit">Place order</button>
            </form>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@include('layouts.footer')