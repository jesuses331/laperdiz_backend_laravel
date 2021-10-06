@extends('layouts.template')
@section('content')
<article class="puppies">
    <div class="container">
        <div class="row">
            <div class="col-xs-12"><h2>Adopciones</h2></div>
        </div>
        <!--Busqueda-->
        <div class="container">
            <div class="col-xs-6 " >		
                <div class="box">
                    <h2 style="vertical-align: inherit; ">
                        AQUI ENCONTRARAS <BR>
                        A TU MASCOTA
                    </h2>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="raza">Raza</label>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-group ">
                                <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                Todos <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                <li><a href="pincher.html">Pincher</a></li>
                                <li><a href="pitbull.html">Pitbull</a></li>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--FinBusqueda
        <div class="row">
            <div class="col-xs-12">
                <ul class="filters">
                    <li data-filter="all" class="active">Todos</li>
                    <li data-filter="feature">Features</li>
                    <li data-filter="male">Machos</li>
                    <li data-filter="famale">Hembras</li>
                    <li data-filter="top">Emergencias</li>
                </ul>
            </div>
        </div>-->
        
        <div class="row">
            <div class="col-md-12">
                <div class="grid">
                    <ul>
                   
                        @foreach ($mascotas as $mascota)
                        @if (($mascota->estado) != false)
                            @foreach ($mascota->images as $img)
                            <li class="male top">
                                <a href="single-puppie.html">
                                    <div class="more">
                                        <i class="icon-search pull-right"></i>
                                        <span class="price">Perro</span>
                                        <span class="wks">Necesita un hogar</span>
                                        <span class="txt">Cel: 69037331</span>
                                    </div>
                                    @php
                                        $url = json_decode($img->url)
                                    @endphp
                                    <img src="{{ $url[0] }}" alt="//"/>
                                    <span class="name">{{ $mascota->nombre }}</span>
                                    
                                </a>
                            </li>
                            @endforeach 
                        @endif    
                        @endforeach 
                      
                    </ul>
                </div>
            </div>
         
        </div> 
        <div class="row">
            <div class="col-md-12">
                <div class="center-pag">
                    <div>
                        <ul class="pagination">
                            <li class="disabled"><a href="#">&laquo;</a></li>
                            <li class="active"><a href="dogs.html">1</a></li>
                            <li><a href="dogs2.html">2</a></li>
                            <li><a href="dogs3.html">3</a></li>
                            <li><a href="dogs2.html">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>     
</article>
    <!-- end Our Puppies -->

@endsection    













