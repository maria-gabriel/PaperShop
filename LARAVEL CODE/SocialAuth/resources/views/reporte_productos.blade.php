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
  @foreach ($productos as $v)
  @php 
    
     $total+=1;
  @endphp
  @endforeach
<table width="600">
  <tr>
    <td width="370">
      <p style="font-size: 19px;"><b>PAPER SHOP </b><br>
      Jiutepec, Morelos<br>
    </td>
    <td>
      @foreach($now as $n)
    <p> {{$n}}
    @break
    @endforeach
    </td>
  </tr>
</table>

<h3><b>Reporte de Productos</b></h3><br>

<table class="table">
            <tr bgcolor="#666" style="color: #FFFFFF; font-size: 16px;">
              <th >#</th>
              <th >Nombre</th>
              <th >Marca</th>
              <th >Descripcion</th>
              <th >Cantidad</th>
              <th >Precio</th>
              <th >Unidad</th>
              <th >Imagen</th>
            </tr>
        <tbody>

            @foreach($productos as $p)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td scope="row">{{$p->nombre}}</td>
                <td scope="row">{{$p->marca}}</td>
                <td scope="row">{{$p->descripcion}}</td>
                <td scope="row">{{$p->cantidad}}</td>
                <td scope="row">$ {{$p->precio}}</td>
                <td scope="row">{{$p->unidad}}</td>
                <td><img src="img/products/{{$p->imagen}}" width="90" height="90"></td>
            </tr>
            @endforeach

        </tbody>
    </table>	
<div class="row" style="margin-left: 490px;"><b>TOTAL PRODUCTOS: {{$total}}</b></div><br>
</body>
</html>
