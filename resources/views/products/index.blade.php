@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<a class="btn btn-default" href="{{route('admin.products.create')}}">Novo Produto</a>
			<div class="panel panel-default">
				<div class="panel-heading">Produtos</div>
				<div class="panel-body">
					<table class="table">
						<tr>
							<td>ID</td>
							<td>Nome</td>
							<td>Categoria</td>
							<td>Preço</td>
							<td>Descrição</td>
							<td>Action</td>
						</tr>					
						@foreach($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td>{{$product->name}}</td>
							<td>{{$product->category->name}}</td>
							<td>{{$product->price}}</td>
							<td>{{$product->description}}</td>
							<td>
								<a href="{{route('admin.products.destroy', ['id' => $product->id])}}">Delete</a>|
								<a href="{{route('admin.products.edit', ['id' => $product->id])}}">Editar</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			{!! $products->render() !!}
		</div>
	</div>
</div>
@endsection