@extends('store.store')

@section('categories')
    @include('store._categories')
@endsection

@section('content')
	<div class="col-sm-9 padding-right">
		<div class="features_items"><!--features_items-->
		    <h2 class="title text-center">Em destaque</h2>
			@include('store._features', ['fProducts' => $fProducts])
		</div>

		<div class="features_items"><!--recommended-->
		    <h2 class="title text-center">Recomendados</h2>
			@include('store._recommended', ['rProducts' => $rProducts])
		</div>
	</div>
@endsection
