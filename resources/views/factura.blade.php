<!DOCTYPE html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Pedido</title>
    <style>
        html,
        body {
            height: 100%;
            /*width:100%;*/
        }
        body {
            margin: 0;
            /*background: linear-gradient(45deg, #49a09d, #5f2c82);*/
            font-family: sans-serif;
            font-weight: 100;
        }
        /*.container {
            position: absolute;
            top: 12%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
        }*/
        table {
            width: 700px;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 3px 3px 0 #a6a6a6, 0 3px 3px 0 #a6a6a6;
            margin-left:auto; 
            margin-right:auto;
        }
        th{
            padding: 15px;
            background-color: #30323A;
            color: black; 
        }
        td {
            padding: 15px;
            background-color: #30323A;
            color: #fff;
            text-align:center;
        }
        th {
            text-align: center;
        }
        thead th {
            background-color: #F8694A;
        }
        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
        tbody td {
            position: relative;
        }
        tbody td:hover:before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -9999px;
            bottom: -9999px;
            background-color: rgba(255, 255, 255, 0.2);
            z-index: -1;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center;">Pedido:</h1>
    <table class="center" >
    <thead>
        <tr>
        
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        @if($producto !== end($productos))
      <tr>
        <td>{{$producto['Nombre']}}</td>
        <td>{{$producto['Cantidad']}}</td>
        <td>{{$producto['Precio']}}</td>
        <td>{{$producto['Total']}}</td>
        
      </tr>
      @endif
      @endforeach
    </tbody>
    
  
  <div>
  <h3>Total: {{$productos['totaltodo']}} €</h3>
  </div>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" style="background-color: white;color:black;border: 5px solid #F8694A;;"><B>Total del pedido:</B></td>
            <td style="background-color: white;color:black;border: 5px solid #F8694A;"><B>{{$productos['totaltodo']}} €</B></td>
        </tr>
    </tfoot>
    </table>
</body>
</html>