<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{URL::asset('assets/css/pdf.css')}}">
  
    
    <title>ConsentimientoInformado</title>
  
  
  </head>
  
  <body>   
      <div id="cabecera_receta">
        <div id="logo">
          <img src="{{URL::asset('/')}}imagenes/logo.jpg" width="100" height="100" >
        </div>

        <div id="informacion">
          <h2>Universidad Privada Del Edo de México</h2>
          <h4 >Calle tetlalpa S/N 2da ampliación santiago delegacion iztapalapa, código postal 09609</h4>
        </div>

        
      </div>
    <div id="Cuerpo_Receta">
      
      <h2 class="Subtitulo">Consentimiento Informado</h2>
      <br>      
        <p>A través del presente, declaro y manifiesto, en pleno uso de mis facultades mentales que sido informado/a 
          y comprendo la necesidad y fines de ser atendido/a para restaurar total o parcialmente según las necesidades.
        </p>
        <p>
          He sido informado/a de las alternativas posibles del tratamiento, al igual comprendo la necesidad de realizar,
         si es preciso, tratamientos remitidos con alguna interconsulta, tanto de carácter médico y quirúrgicos, incluyendo el uso 
           de anestesia local y/o General; siempre que el tratamiento lo amerite y bajo la atención del responsable y mínimo un 
           asistente.</p>
        <p>   
          Comprendo los posibles riesgos y complicaciones explicados con anterioridad, involucradas en los tratamientos y comprendo 
          también que no es una ciencia exacta, por lo que no existen garantías sobre el resultado exacto de los tratamientos 
          proyectados. Además de esta información que he recibido, será informado/a en cada momento y a mi requerimiento de la 
          evolución de mi proceso de  cada uno de los tratamientos, de manera verbal y/o escrita.</p>
        <p>  
  Si surgiese cualquier situación inesperada o sobrevenida durante la intervención o tratamiento, autorizo al responsable a realizar
   cualquier procedimiento o maniobra distinta de las proyectadas o usuales que a su juicio estimase oportuna para la resolución 
   teniendo siempre una justificación.
  </p>
  <p> 
  Me ha sido explicado/a que para la realización del tratamiento es imprescindible mi colaboración, siendo así que su omisión 
  puede provocar resultados distintos a los esperados en la o las rehabilitaciones.
  </p>
  <p>
  Doy mi consentimiento y por ende al equipo de ayudantes que se designe según el tratamiento lo requiera.</p>
  </p>      
  </div>

    <div class="footerCons">
      <h5>Paciente:{{$paciente}}_______________&nbsp; &nbsp; &nbsp; &nbsp;Dr:{{$doctor}}________________</h5>
    </div>

    <div class="Separador">
    </div>

    <div class="footerCons">
      <h5>Test1:{{$testigo1}}______________&nbsp; &nbsp; &nbsp; &nbsp; Test2:{{$testigo2}}:________________</h5>
      <h5>Fecha de emisión: {{" ".$date}}</h5>
    </div>

  </body>
</html>