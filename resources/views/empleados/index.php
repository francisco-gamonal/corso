<center><h2><span class="glyphicon glyphicon-list-alt"><br>Agregar Mensajeros</span></h2></center>
<hr>
<div class="right">
{{ Form::open(array(
            'action'=>'registrar-empleados',
            'method'=>'GET',
            'role'=>'form',
            'class'=>'form-inline'
            ))}}
            {{Form::input('submit',null,'Agregar +',array('class'=>'btn btn-danger '))}}
{{Form::close()}}
</div>
