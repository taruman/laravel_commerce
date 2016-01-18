@extends('store.store')

@section('content')
	<section class="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-hover">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Descrição</td>
							<td class="price">Preço</td>
							<td class="qtd">Qtd.</td>
							<td class="total">Total</td>
							<td class="action">Ações</td>
						</tr>
					</thead>
					<tbody>
						@forelse($cart->allItems() as $k=>$item)
						<tr>
							<td class="cart_product">
								<a href="">Imagem</a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item['name']}}</a></h4>
							</td>
							<td class="cart_price">
								R$ {{$item['price']}}
							</td>
							<td class="cart_quantity">
								{{$item['qtd']}}
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$item['qtd'] * $item['price']}}</p>
							</td>
							<td class="cart_delete">
								<a href="{{route('cart.destroy', ['id' => $k])}}" class="cart_quantity_delete">Deletar</a>
							</td>
						</tr>
						@empty
						<tr>
							<td class="" colspan="6">
								<p>Nenhum item encontrado!</p>
							</td>
						</tr>
						@endforelse

						<tr class="cart_menu">
							<td colspan="6">
								<div class="pull-right">
									<span>TOTAL: R$ {{$cart->getTotal()}}</span>
									<a href="" class="btn btn-success">Fechar a Conta</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
@endsection