Seccion para editar empleados
<form method="post" enctype="multipart/form-data" action="{{url('/empleados/'.$empleado->id)}}">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <label for="Cedula">{{'Cedula'}}</label> 
    <input type="text" name="Cedula" id="Cedula" value="{{$empleado->Cedula}}">
    <br>
    <label for="Nombre">{{'Nombre'}}</label>    
    <input type="text" name="Nombre" id="Nombre" value="{{$empleado->Nombre}}">
    <br>
    <label for="Apellido">{{'Apellido'}}</label> 
    <input type="text" name="Apellido" id="Apellido" value="{{$empleado->Apellido}}">
    <br>
    <label for="Correo">{{'Correo'}}</label> 
    <input type="email" name="Correo" id="Correo" value="{{$empleado->Correo}}">
    <br>
    <label for="Foto">{{'Foto'}}</label> 
    <br>
    <img src="{{asset('storage').'/'.$empleado->Foto}}" alt="" width="200">
    <br>
    <input type="File" name="Foto" id="Foto" value="">
    <br>
    <input type="submit" value="Editar">
    <a href="{{url('empleados')}}">Volver a inicio</a>
</form>