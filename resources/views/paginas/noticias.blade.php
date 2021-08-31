@extends('layouts.template')
@section('content')
<div id="content">
	<section>
		
		<!-- begin Coupons -->
		<article class="coupons">
			<div class="container">
				<header><h2>Noticias</h2></header>
				
                    <div class="row">
                        <div class="title">
                            <div class="centered"><div><h2>Dile no al maltrato animal!!!</h2></div></div>
                            <p>"El mundo sería un lugar mucho mejor si las personas tuvieran el corazón de los perros".</p>
                            <hr>
                        </div>
                    </div>
               
				
                @foreach ($noticias as $noticia)
				<div class="row coupon">
					<div class="col-sm-4">
						<img src="img/coupons/coupon02.jpg" alt="//">
					</div>
					<div class="col-sm-7">
						<span class="expires">{{ $noticia->fecha }}</span>
						<h3>{{ $noticia->titulo }}</h3>
						<span class="free">{{ $noticia->ciudad }}</span>
						<p>{{ $noticia->descripcion }}</p>
						<a href="#" class="btn btn-default">Leer mas....</a>
					</div>
				</div>
                @endforeach
				
			</div>  
		</article>
		<!-- end Coupons -->

	</section>

</div>

    
@endsection