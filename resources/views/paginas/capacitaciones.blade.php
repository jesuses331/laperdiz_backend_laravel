@extends('layouts.template')
@section('content')
<div>
	<section>
		
		<!-- Our Services -->
		<article class="services">
			<div class="container">
				<header><h2>Cursos y Capacitacion</h2></header>
				<div class="row">
					<div class="title">
						<div class="centered"><div><h2>Capacitaciones </h2></div></div><br>
						<p>Las mejores capacitaciones  </p>
						<hr>
					</div>
				</div>
               
                @foreach ($cursos as $curso)
                        <div class="row service">
                            <div class="col-md-7">
                                <h2>{{ $curso->titulo }}</h2>
                                <p>{{ $curso->lugar }}</p>
                                <p>{{ $curso->fecha }}</p>
                                
                            </div>
                        </div>
                @endforeach
				
			</div>
		</article>
		<!-- end Our Services -->

	</section>

</div>
    
@endsection