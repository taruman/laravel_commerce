@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if($errors->any())
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">Cadastrar Imagem</div>

				<div class="panel-body">
					{!! Form::open(['route' => ['admin.products.images.store', $product->id], 'files' => true]) !!}
					<div class="form-group">
						<label>Imagem</label>
						{!! Form::file('image', null, ['class' => 'form-control']) !!}
					</div>
					<input type="submit" class="btn btn-default btn-block" value="Cadastrar">
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection