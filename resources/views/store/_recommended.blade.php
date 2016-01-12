    @foreach($rProducts as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">

                	@if(count($product->images) > 0)
                    <img src="{{asset('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}">
                    @else
                    <img src="{{asset('images/no-img.jpg')}}">
                    @endif
                    
                    <h2>R$ {{$product->price}}</h2>
                    <p>{{$product->name}}</p>
                    <a href="" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ {{$product->price}}</h2>
                        <p>{{$product->name}}</p>
                        <a href="" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach