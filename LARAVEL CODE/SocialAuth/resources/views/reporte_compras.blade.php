<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Styles -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
   <style>
  body { 
  color: #777777;
  font-family: "Poppins", sans-serif;
  font-size: 15px;
  font-weight: 300;
  line-height: 1.625em;
  position: relative;
   }

   p{
    font-size: 16px;
   }

   h3{
    font-size: 24px;
    text-align: center;
    font-family: "Poppins", sans-serif;
   }

   </style>
</head>
<body>
<img src="img/paper.png" width="725"><br><br>

<?php $total = 0;
?>
  @foreach ($ventas as $v)
  @php 
    
     $total+=$v->precio_total;
  @endphp
  @endforeach

<table width="600">
  <tr>
    <td>
      <p style="font-size: 19px;"><b>PAPER SHOP </b><br>
      Jiutepec, Morelos<br><br>
    </td>
    <td>
      @foreach($now as $n)
    <p> {{$n}}
    @break
    @endforeach
    <br><br>
    </td>
  </tr>
  <tr>
    <td>
    <p><b>Usuario: </b> {{Auth::user()->name}} <br>
    <b>Puesto: </b> @if(Auth::user()->id==2) Administrador @else General @endif <br>
    <b>E-mail: </b> {{Auth::user()->email}} </p>
    </td>
  </tr>
</table>
<br>

<h3><b>Reporte de Compras</b></h3><br>
    <p> Fecha inicio: {{$fe}}  -  Fecha final: {{$fec}}

<table class="table">
            <tr bgcolor="#666" style="color: #FFFFFF; font-size: 16px;">
              <th >#</th>
              <th >FECHA</th>
              <th >PRODUCTO</th>
              <th >PRECIO</th>
              <th >CANTIDAD</th>
              <th >TOTAL</th>
            </tr>
        <tbody>

            @foreach($ventas as $p)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td scope="row">{{$p->compra_id}}</td>
                <td scope="row">{{$p->producto_id}}</td>
                <td scope="row">$ {{$p->precio}}</td>
                <td scope="row">{{$p->cantidad}}</td>
                <td scope="row">$ {{$p->precio_total}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>	
<div class="row" style="margin-left: 490px;"><b>TOTAL COMPRA: $ {{$total}}.00</b></div><br><br><br>
<center><p>___________________<br>FIRMA </p></center>
</body>
</html>
