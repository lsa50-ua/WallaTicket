@extends('layouts.master')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-lg p-3 mb-5 bg-body rounded">
<div class="card-body">
<h1 class="text-center mb-4">Bienvenido a WallaTicket</h1>
<p class="lead text-justify mb-4">En WallaTicket nos dedicamos a la venta de entradas para fiestas y eventos en todo el país. Ofrecemos una amplia variedad de opciones para que puedas encontrar el evento perfecto para ti.</p>


                    <h2 class="text-center mb-4">¿Qué nos hace diferentes?</h2>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-check-circle me-2 text-primary"></i>Nuestra plataforma es fácil de usar y te permite buscar eventos por ubicación, fecha, tipo de evento y mucho más.</li>
                        <li class="mb-2"><i class="fas fa-check-circle me-2 text-primary"></i>Trabajamos con organizadores de eventos de todo el país, lo que nos permite ofrecerte una gran variedad de opciones para que siempre encuentres algo que te guste.</li>
                        <li class="mb-2"><i class="fas fa-check-circle me-2 text-primary"></i>Ofrecemos precios competitivos e información exclusiva para nuestros usuarios registrados.</li>
                        <li class="mb-2"><i class="fas fa-check-circle me-2 text-primary"></i>Nuestro equipo de atención al cliente está siempre dispuesto a ayudarte con cualquier duda o problema que puedas tener.</li>
                    </ul>

                    <h2 class="text-center mb-4">¿Cómo funciona?</h2>
                    <p class="text-justify mb-4">Para comprar entradas en WallaTicket, simplemente busca el evento que te interese en nuestra plataforma, selecciona la cantidad de entradas que necesitas y sigue los pasos para completar tu compra. Una vez que hayas realizado tu compra, recibirás tus entradas por correo electrónico y podrás imprimirlas o llevarlas en tu teléfono móvil al evento.</p>

                    <h2 class="text-center mb-4">¡Regístrate ahora y accede a todas las funcionalidades de la página!</h2>
                    <p class="text-justify mb-4">Si te registras en WallaTicket ahora, podrás informarte de los eventos más top que se celebrarán próximamente en la región de Alicante. ¡No esperes más y regístrate ahora!</p>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Regístrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.fa-check-circle {
font-size: 1.2rem;
}
</style>
@endsection

@section('scripts')
<!-- Scripts -->
@endsection