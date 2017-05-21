@extends('templates.esqueleto')

@section('content')

<div class="container" style="margin-top: 75px">
	
	<div id="error" class="alert alert-danger" role="alert"><strong>ERROR:</strong> {{$mensaje}}</div>

</div>

@endsection