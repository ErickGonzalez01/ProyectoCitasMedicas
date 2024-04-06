<html>
<head>
    <style>
        /* Estilos generales para la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Estilos para la clase .table-responsive */
        .table-responsive {
            overflow-x:auto;
            min-height:0.01%;
        }

        /* Media queries para ajustar la tabla según el ancho de pantalla */
        
        @media screen and (max-width: 800px) {
            .table-responsive {width:100%;margin-bottom:15px;overflow-y:hidden;}
            
            .table-responsive table {width:auto;min-width:100%;}
            
            .table-responsive th,.table-responsive td {white-space:nowrap;}
            
            .table-responsive td:nth-of-type(1):before {content:"Nombre";}
            
            .table-responsive td:nth-of-type(2):before {content:"Apellido";}
            
            .table-responsive td:nth-of-type(3):before {content:"Edad";}
            
            .table-responsive td:nth-of-type(4):before {content:"Ciudad";}
            
            .table-responsive td:before {
                display:block;
                width:auto;
                font-weight:bold;
                margin-top:-20px
             }
             
             /* Ocultar los encabezados de la tabla */
             .table-responsive thead tr:not(:first-child), tbody tr:not(:first-child) {
                 display:none
             }
             
             /* Ajustar el alto y ancho de las celdas */
             .table-responsive td {
                 display:block;
                 height:auto !important;
                 width:auto !important
             }
             
             /* Ajustar el margen y el color de las celdas */
             .table-responsive tbody tr:first-child td {
                 margin-top:15px !important;
                 background-color:#eee !important
             }
             
             /* Ajustar el margen y el color de las celdas alternas */
             .table-responsive tbody tr:first-child:nth-child(even) td {
                 margin-top:15px !important;background-color:#fff !important
              }
              
              /* Ajustar el margen y el color del encabezado */
              .table-responsive thead tr:first-child th:first-child,.tbody tr:first-child td:first-child{
                  margin-top:-20px !important;background-color:#4CAF50 !important;color:white !important
               }
               
               /* Ajustar el margen y el color del encabezado alterno */
               .tbody tr:first-child:nth-child(even) th,.tbody tr:first-child:nth-child(even)td{
                   margin-top:-20px !important;background-color:#4CAF50 !important;color:white !important
                }
                
                /* Ajustar el margen y el color del último encabezado */
                thead:last-child th:last-of-type,tbody:last-of-type td:last-of-type{
                    margin-bottom:-10px;background-color:#4CAF50;color:white
                 }
                 
                 /* Ajustar el margen y el color del último encabezado alterno */
                 tbody:last-of-type:nth-child(even) th,tbody:last-of-type:nth-child(even)td{
                     margin-bottom:-10px;background-color:#4CAF50;color:white
                  } 
                  
                  /* Eliminar los bordes entre las celdas */ 
                  table,th,td{border:none}
         } 
    </style>
</head>
<body>

<div class="container">
    <div class="row">
      <div class="col-md-12">
          <!-- Aplicamos la clase.table-resposive al div que contiene la tabla -->
          <div class="table-responsive">
              <!-- Creamos una sencilla tabla HTML con algunos datos -->
              <table>
                  <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Edad</th>
                          <th>Ciudad</th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr>
                          <td>Juan</td>
                          <td>Pérez</td>
                          <td>25</td>
                          <td>Bogotá</td>

                      </tr>

                      <tr>

                          <td>Maria</td>