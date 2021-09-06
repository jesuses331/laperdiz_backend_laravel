@extends('layouts.template')
@section('content')
    

<div>
	<section>
		
		<!-- Our Services -->
		<article class="services">
			<div class="container">
				<header><h2>Denuncias</h2></header>
				<div class="row">
					<div class="title">
						<div class="centered"><div><h2>No podemos permanecer impasibles ante el maltrato animal.</h2></div></div><br>
						<p>Recuerda que al momento de colocar tu denuncia, puedes dejar tus datos BAJO GARANTÍA DE CONFIDENCIALIDAD*, tus datos serán protegidos para que tengas la tranquilidad de colocar tu denuncia. </p>
						<hr>
					</div>
				</div>
                @php
                    $b=true;
                @endphp
                @foreach ($denuncias as $denuncia)
                    @foreach ($denuncia->images as $img)
                        
                    
                    @if ($b)
                        <div class="row service">
                            <div class="col-md-7">
                                <h2>{{ $denuncia->titulo }}</h2>
                                <p>{{ $denuncia->descripcion }}</p>
                                <p>Necesita una Madre Nodriza para poder alimentarlo hasta que alguien de buen corazon lo pueda adoptar</p>
                                <a href="#">&srarr; Leer mas...</a>
                            </div>
                            @php
                                $url = json_decode($img->url)
                            @endphp
                            <div class="col-md-5"><img src="{{ $url[0] }}" alt="//">
                               
                                
                            </div>
                        </div>
                        @php
                            $b=false;
                        @endphp
                    @else
                        <div class="row service">
                        
                            <div class="col-md-5">
                            @php
                                $url = json_decode($img->url)
                            @endphp
                            <img src="{{ $url[0] }}" alt="//">
                            <div class="col-md-7">
                                <h2>{{ $denuncia->titulo }}</h2>
                                <p>{{ $denuncia->descripcion }}</p>
                                <a href="https://www.lavozdetarija.com/2021/06/30/videos-muestran-el-cruel-biocidio-de-un-jaguar-en-la-zona-oriental-de-bolivia/">&srarr; Leer mas.....</a>
                            </div>
                        </div>
                        @php
                            $b=true;
                        @endphp
                    @endif

                    @endforeach
                @endforeach
				
			</div>
		</article>
		<!-- end Our Services -->

	</section>

</div>
@endsection