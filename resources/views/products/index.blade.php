@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Produtos</div>

				<div class="panel-body">
					@foreach($products as $product)
						<p>$product->name</p>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection