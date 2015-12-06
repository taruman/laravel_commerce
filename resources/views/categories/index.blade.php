@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<a class="btn btn-default" href="{{route('admin.categories.create')}}">Nova Categoria</a>
			<div class="panel panel-default">
				<div class="panel-heading">Categorias</div>
				<div class="panel-body">
					<table class="table">
						<tr>
							<td>ID</td>
							<td>Nome</td>
							<td>Descrição</td>
							<td>Action</td>
						</tr>					
						@foreach($categories as $category)
						<tr>
							<td>{{$category->id}}</td>
							<td>{{$category->name}}</td>
							<td>{{$category->description}}</td>
							<td>
								<a href="{{route('admin.categories.destroy', ['id' => $category->id])}}">Delete</a>|
								<a href="{{route('admin.categories.edit', ['id' => $category->id])}}">Editar</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			{!! $categories->render() !!}
		</div>
	</div>
</div>
@endsection