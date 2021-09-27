@extends('layouts.template')
@section('content')
    

<div>
	<section>
		
		<!-- Our Services -->
		<article class="services">
			<div class="container">
				<header><h2>Denuncias</h2></header>
				<div class="row">
                    @foreach ($denuncias as $denuncia)
								@foreach ($denuncia->images as $img)
								<div class="col-sm-6 col-md-4 card" >
									<div class="thumbnail">
										@php
                                			$url = json_decode($img->url)
                            			@endphp
										<img src="{{ $url[0] }}" alt="..." >
										<div class="caption">
										
											<p><span>Denuncias</span></p>
						
											<h3>{{$denuncia->titulo}}</h3>
											<br>
											<p>{{$denuncia->descripcion}}</p>
                                            
											<br>
											
												
                                        
										</div>
                                        <span><i class="icon-calendar"><p>{{$denuncia->created_at}}</p></span></i>		
									</div>
								</div>
								@endforeach
						@endforeach
				</div>
			</div>
		</article>
		<!-- end Our Services -->

	</section>

</div>
@endsection
@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#descripcion' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection