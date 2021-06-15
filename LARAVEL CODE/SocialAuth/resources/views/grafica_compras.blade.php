@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @if(session()->has('msj'))
        <div class="alert alert-success" role="alert">
            {{session('msj')}}
        </div>
        @endif
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8 post-list">
        <h4 style="color:#439DA9">Productos comprados en el mes de {{$m}} </h4><br>
        <div id="GraficoGoogleChart-ejemplo-1" style="width: 800px; height: 600px;">
        </div>
        
    </div>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script> 
<script>
       google.load("visualization", "1", {packages:["corechart"]});
       google.setOnLoadCallback(dibujarGrafico);
       function dibujarGrafico() {
         // Tabla de datos: valores y etiquetas de la gráfica
         var data = google.visualization.arrayToDataTable([
           ['Genre', 'Producto', { role: 'style' }],
            @foreach($detalles as $d)
              ['{{ $d->nombre}}', {{ $d->cantidad}},'color: #439DA9; fontColor: #bbb '],
            @endforeach
           
         ]);

         
         var options = {
           title: 'Cantidad comprada de cada producto',
           backgroundColor: '#E7F0F1',
           legend: { position: "none" },

         }
         // Dibujar el gráfico
         new google.visualization.ColumnChart( 
         //ColumnChart sería el tipo de gráfico a dibujar
           document.getElementById('GraficoGoogleChart-ejemplo-1')
         ).draw(data, options);
       }
     </script> 
@endsection
