<!DOCTYPE html>
<html>
<head>
	<title>Turnos del día</title>
	
</head>
<body>
<div class="container">
	<a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Bajar PDF</a>
	
	<table class="table table-bordered">
		<thead>
			<th>hora</th>
			<th>dia</th>
			<th>apellido</th>
			<th>paciente</th>
			<th>tratamiento</th>
			<th>llegada</th>
		</thead>
		<tbody>
			@foreach ($turnos as $key => $value)
			<tr>
			<td>{{ $value->hora }}</td>
			<td>{{ $value->dia }}</td>
			<td>{{ $value->apellido }}</td>
			<td>{{ $value->paciente }}</td>
			<td>{{ $value->tratamiento }}</td>
			<td>{{ $value->llegada }}</td>
		
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>