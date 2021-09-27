@extends('layouts.template')
@section('content')
<div id="content">
	<section id="home" class="updatable">
		<!-- Slider -->
		<article class="bannercontainer">
			<div class="banner ">
				<ul>                        
					<li data-transition="fade" data-slotamount="1">
						<img src="img/slider/slider01.jpg" alt="//" />
						<div 
							class="caption lfb " 
							data-x="left"
							data-y="top"
							data-speed="1000"
							data-start="500"
							data-easing="easeOutBack"
						>		
							<p><span>Tu denuncia  <br> es muy importante <br> para detener <br>el Maltrato Animal</span>
								Los ojos de un animal <br/>tienen el poder de hablar<br /> un gran lenguaje.</p>
							
							<!--<a href="coupons.html" class="">Coupons and Deals</a>-->
						</div>                                 
					</li>

					<li data-transition="3dcurtain-vertical" data-slotamount="1">
						<img src="img/slider/slider02.jpg" alt="//" />
						<div 
							class="caption lfb " 
							data-x="right"
							data-y="top"
							data-speed="1000"
							data-start="500"
							data-easing="easeOutBack"
						>	
							<p><span>Patitas Bolivianas!</span> La grandeza de una nación y su progreso moral<br /> puede ser juzgado por la forma en que sus<br />animales son tratados (Mahatma Gandhi) .</p>
							
						</div>  
					</li> 

					<li data-transition="papercut" data-slotamount="1">
						<img src="img/slider/slider03.jpg" alt="//" />
						<div 
							class="caption lfb " 
							data-x="left"
							data-y="top"
							data-speed="1000"
							data-start="500"
							data-easing="easeOutBack"
						>	
							<p><span>Ellos tambien son VIDA!</span> Salva una vida <br /> abre tu corazon y tu vida <br />para un VERDADERO AMIGO.</p>
							
						</div>                                    
					</li> 
				</ul>
			</div>
		</article>
       
		<!-- End Slider -->

		<!-- begin Featured Pooch 
		<article class="featured">
			<div class="container">
				<header><h2>ADOPCIONES</h2></header>

				<div class="row">
					<div class="col-md-9">
						<img src="img/featured.jpg" alt="featured" class="img-rounded thumb">
						<h3>"I'd make a great pet... I promise!"</h3>
						<p>What efffise can you say about this cute little creature!. We just rescued from the animal shelter and we're hoping to fing her a great home! Stop by the shop and come pet met...</p>
						<div class="foot">Posted 17 Jul 2013 <i class="icon-dot"></i> By Chris Patterson <span class="label label-default">Featured</span> </div>
					</div>
					<div class="col-md-3 vitals">
						<h4>Puppy Vitals <i class="icon-heart"></i></h4>
						<p>
							<strong>Name:</strong> Lassie<br />
							<strong>Age:</strong> 16 months, 9 days<br />
							<strong>Gender:</strong> Famale<br />
							<strong>Breed:</strong> Yorkshire Terrier<br />
							<strong>Price:</strong> Call of prices<br />
						</p>
					</div>
				 </div>

			</div>     
		</article>-->
		<!-- end Featured Pooch -->

		

		<!-- Our Puppies -->
		<article class="puppies">
		<div class="container">
			<div class="row">
				<div class="col-xs-12"><h2>VISION</h2></div>
				<p style="margin: 15px">Consolidar un equipo multidisciplinario de hombres y mujeres profesionales técnicos 
					y voluntarios con el propósito de proteger la naturaleza y conservar sus beneficios
					 para convivir bien entre la población y ecosistema.cuenta con un equipo de trabajo
					  basado en valores y principios éticos Morales para lograr un impacto social 
					  mediante la implementación de programas y asociaciones en organizaciones salud y 
					  educación.</p> <br>
				<div class="col-xs-12"><h2>MISION</h2></div>
				<p style="margin: 15px">Tenemos como propósito principal proteger las fuertes  de agua como patrimonio 
					natural de la vida aprovechar el desarrollo sostenible de los recursos naturales. promociónar el ecoturismo generando acciones propositivas de conservación de la biodiversidad a través de la investigación científica la planificación y el compromiso de la comunidad,gestión
					municipal,gobernación y participantes de la organizaciones internacionales
					 coadyuvar ,en la tarea de resolver la problemática del cambio climático</p> <br>
			</div>

			<div class="row">
				<div class="col-xs-12"><h2>MASCOTAS EN ADOPCIÓN</h2></div>
			</div>
			<div class="row">
				<div class="col-xs-12 ">
					<div class="grid">
						<ul> 
                            @foreach ($mascotas as $mascota)
                                    <li class="male top">
                                        <a href="dogs.html">
                                            <div class="more">
                                                <i class="icon-search pull-right"></i>
                                                <span class="price">$2100</span>
                                                <span class="wks">9 Wks F</span>
                                                <span class="txt">Maltese</span>
                                            </div>
											@foreach ($mascota->images as $img)
												@php
													$url = json_decode($img->url)
												@endphp
												<img src="{{ asset($url[0]) }}" alt="//"/>
											@endforeach
                                            	<span class="name">{{ $mascota->nombre }}</span>
                                        </a>
                                    </li>    
                            @endforeach
							
							
						</ul>
					</div>
				</div>
			 </div>

		</div>     
		</article>
		<!-- end Our Puppies -->
		<!-- begin Our Reputation -->
		<article class="reputation">
			<div class="container">
				<header><h2>Ellos tambien nos dan una mano</h2></header>

				<div class="row">
					<div class="col-md-12">
						<div id="carousel-reputation" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<img src="img/reputation/reputation01.jpg" alt="//" class="img-circle">
									<p>"Alimentando a las mascotas"</p>
									
								</div>
								<div class="item">
									<img src="img/reputation/reputation02.jpg" alt="//" class="img-circle">
									<p>"Denuncia cualquier maltrato"</p>
									<span>Stewart Little, Unites States</span>
								</div>
								<div class="item">
									<img src="img/reputation/reputation03.jpg" alt="//" class="img-circle">
									<p>"Al cuidado de los animalitos"</p>
									<span>Stewart Little, Unites States</span>
								</div>
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-reputation" data-slide="prev">
								<i class="icon-left-open"></i>
							</a>
							<a class="right carousel-control" href="#carousel-reputation" data-slide="next">
								<i class="icon-right-open"></i>
							</a>
						</div>
					</div>
				 </div>

			</div>     
		</article>
		<!-- end Our Reputation -->

		<!-- Our Services -->
		<article class="services">
			<div class="container">
			
				<div class="row">
					<div class="col-xs-12"><h2 class="header">Denuncias</h2></div>
				</div>
                @section('denuncias')
				
						<div class="row">
							@foreach ($denuncias as $denuncia)
								@foreach ($denuncia->images as $img)
								<div class="col-sm-6 col-md-4 card " style="height: 300px">
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
											<span><i class="icon-calendar"><p>{{$denuncia->created_at}}</p></span></i>
												
											
										</div>
										
									</div>
								</div>
								@endforeach
						@endforeach
						</div>
						
                @endsection
				
			</div>
		</article>
		<!-- end Our Services -->


		<!-- Coupons 
		<article class="coupons">
			<div class="container">
				<header><h2>Coupons</h2></header>
				
				<div class="row">
					<div class="title">
						<div class="centered"><div><h2>In-Store Printable Coupons</h2></div></div>
						<p>We offer all of our customers in-store printable coupons that you can only find online on our website. Check back daily for news deals!</p>
						<hr>
					</div>
				</div>
		
				<div class="row coupon">
					<div class="col-sm-4">
						<img src="img/coupons/coupon01.jpg" alt="pet image">
					</div>
					<div class="col-sm-7">
						<span class="expires">expires: 4/11/2014</span>
						<h3>Hand Scissor Haircut</h3>
						<span class="newnumber">Free</span>
						<p>Cats and dogs ejoyment. Our facility was designed to offer your pet the most exclusive and unique experience, a perfect alternative to a caged</p>
						<a href="#" class="btn btn-default">Print Code</a>
					</div>
				</div>

			</div>     
		</article>-->
		<!-- end Coupons -->

	</section>
</div>
@endsection
