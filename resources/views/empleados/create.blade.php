Seccion para crear empleados
<form action="{{url('/empleados')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<label for="Cedula">{{'Cedula'}}</label> 
<input type="text" name="Cedula" id="Cedula" value="">
<br>
<label for="Nombre">{{'Nombre'}}</label>    
<input type="text" name="Nombre" id="Nombre" value="">
<br>
<label for="Apellido">{{'Apellido'}}</label> 
<input type="text" name="Apellido" id="Apellido" value="">
<br>
<label for="Correo">{{'Correo'}}</label> 
<input type="email" name="Correo" id="Correo" value="">
<br>
<label for="Foto">{{'Foto'}}</label> 
<input type="File" name="Foto" id="Foto" value="">
<br>
<input type="submit" value="Agregar">
<a href="{{url('empleados')}}">Volver a inicio</a>
</form>