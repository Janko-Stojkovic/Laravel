<div class="col-xl-3 col-lg-4 col-md-4 col-6 product-incfhny mb-4">
    <div class="product-grid2 transmitv">
        <div class="product-image2">
            <img class="pic-1 img-fluid" src="{{asset('images/'.$productImage)}}"
                 alt="{{$productName}}">
            <img class="pic-2 img-fluid" src="{{asset('images/'.$productImageHover)}}"
                 alt="{{$productName}}">
            <ul class="social">
                <li>
                    <button type="button" data-toggle="modal" data-target="#One">
                        <span class="fa fa-eye"></span>
                    </button>
                </li>
            </ul>
            <div class="transmitv single-item">
                @if(session()->has('user'))
                    <button onclick="addToCart({{$productId}})" class="transmitv-cart ptransmitv-cart add-cart"
                            data-id="${product.id}">
                        Add to Cart
                    </button>
                @endif
            </div>
        </div>
        <div class="product-content">
            <h3 class="title">{{$productBrandName}}
            </h3>
            <p>
                {{$productName}}
            </p>
            <h3 class="price">
                <del></del>
            </h3>
            <h3 class="price">${{$productPrice}}</h3>
        </div>
    </div>
</div>
