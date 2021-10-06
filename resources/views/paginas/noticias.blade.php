@extends('layouts.template')
@section('content')
<div id="content">
	<section>
		
		<!-- begin Coupons -->
		<article class="coupons">
			<div class="container">
				<header>
					<h2>Noticias</h2>
				</header>
				
                    <div class="row">
                        <div class="title">
                            <div class="centered"><div><h2>Dile no al maltrato animal!!!</h2></div></div>
                            <p>"El mundo sería un lugar mucho mejor si las personas tuvieran el corazón de los perros".</p>
                            <hr>
                        </div>
                    </div>
               
				
                
				@foreach ($noticias as $noticia)
								@foreach ($noticia->images as $img)
								<div class="col-sm-6 col-md-4 card" >
									
									<div class="thumbnail">
										
										@php
                                			$url = json_decode($img->url)
                            			@endphp
										<img src="{{ $url[0] }}" alt="..." >
										<div class="caption">
										
											<p><span>Noticias</span></p>
						
											<h3>{{$noticia->titulo}}</h3>
											<br>
											<p>{{$noticia->resumen}}.....</p>
											<br>
											
											
											
										</div>
										<span><i class="icon-calendar"><p>{{$noticia->created_at}}</p></span></i>	
									</div>
								</div>
								@endforeach
						@endforeach
                
				
			</div>  
		</article>
		<!-- end Coupons -->

	</section>

</div>

    
@endsection