@extends('app')

@section('content')
<div class="container">
	@if($errors->any())
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
	@endif
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Atualizar Categoria</div>

				<div class="panel-body">
					{!! Form::open(['route' => ['admin.categories.update', 'id' => $category->id], 'method' => 'put']) !!}
					<div class="form-group">
						<label>Nome</label>
						<input class="form-control" type="text" name="name" value="{{$category->name}}">
					</div>
					<div class="form-group">
						<label>Descrição</label>
						<textarea class="form-control" name="description">{{$category->description}}</textarea>
					</div>
					<input type="submit" class="btn btn-default btn-block" value="Cadastrar">
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection