@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<a class="btn btn-default" href="{{route('admin.products.images.create', $product->id)}}">Nova Imagem</a>
			<div class="panel panel-default">
				<div class="panel-heading">Imagens de {{$product->name}}</div>
				<div class="panel-body">
					<table class="table">
						<tr>
							<td>ID</td>
							<td>Imagem</td>
							<td>Extensão</td>
							<td>Action</td>
						</tr>					
						@foreach($product->images as $image)
						<tr>
							<td>{{$image->id}}</td>
							<td><img src="{{asset('uploads/'.$image->id.'.'.$image->extension)}}" width="80" class="img-responsive"></td>
							<td>{{$image->extension}}</td>
							<td>
								<a href="{{route('admin.products.images.destroy', ['id' => $image->id])}}">Delete</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			<a href="{{route('admin.products')}}" class="btn btn-default">Voltar</a>
		</div>
	</div>
</div>
@endsection