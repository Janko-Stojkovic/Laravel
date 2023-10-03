@extends("layouts.client")
@section('videoWrapper')
    <div class="videoWrapper">
        <video autoplay="" loop="" muted="" class="custom-video" poster="images/videos/bg4.jpg">
            <source src="images/videos/bg4.jpg" type="video/mp4">
        </video>
    </div>
@endsection
@section('heroText')
    <h1 class=" mt-5 mb-lg-4 class-font" data-aos="zoom-in" data-aos-delay="50">
        Kingsman Watches
    </h1>
    <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="100">
        Welcome To Your <strong class="custom-underline">Cart</strong>
    </p>
@endsection
@section('content')
    <section class="cart h-100 h-custom" style="background-color: #d2c9ff;">
        @if(session()->has("cartItems") && count(session()->get("cartItems")))
            <form action="{{route('orders.store')}}" method="POST">
                @csrf
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>

                                            </div>
                                            @if(session()->has("cartItems"))

                                                @foreach(session()->get("cartItems") as $item)

                                                    <div data-id="{{$item->product->id}}"
                                                         data-price="{{$item->product->price}}"
                                                         class="row product mb-4 d-flex justify-content-between align-items-center"
                                                         id="cart_item_{{$item->product->id}}">
                                                        <input type="hidden" name="productId" value="{{ $item->product->id }}"/>

                                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <img
                                                                src="{{asset('images/'.$item->product->image)}}"
                                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                        </div>
                                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                                            <h6 class="text-muted">{{$item->product->brandId}}</h6>
                                                            <h6 class="text-black mb-0">{{$item->product->name}}</h6>
                                                        </div>
                                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                                                            <input
                                                                onblur="changeProductQuantity({{$item->product->id}})"
                                                                id="item_product_{{$item->product->id}}" min="0"
                                                                name="quantity" value="{{$item->quantity}}"
                                                                type="number"
                                                                class="form-control form-control-sm"/>

                                                        </div>
                                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                            <h6 class="mb-0">${{$item->product->price}}</h6>
                                                        </div>
                                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                            <a href="#!"
                                                               onclick="removeFromCart({{$item->product->id}})"
                                                               class="text-muted"><i class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            @endif


                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="{{route('shop')}}" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                @php
                                                    $totalPrice = 0;
                                                    foreach (session()->get("cartItems") as $item){
                                                        $totalPrice += $item->quantity * $item->product->price;
                                                    }
                                                @endphp
                                                <h5 class="text-uppercase">Total price: <strong
                                                        id="total">$ {{$totalPrice}}</strong></h5>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="address" placeholder="You'r address"/>
                                            </div>
                                            <input type="submit" class="btn btn-dark btn-block btn-lg"
                                                    data-mdb-ripple-color="dark" value="Confirm order"/>

                                            @include('partials.messages')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        @else
            <div class="row mb-4 d-flex justify-content-between align-items-center">
                <h1 class="text-center cartInfo">Your cart is empty</h1>
            </div>
        @endif
    </section>
@endsection

@section('scripts')
    <script>
        function removeFromCart(productId) {
            $.ajax({
                url: "/cart/" + productId,
                method: "DELETE",
                data: {
                    "_token": token
                },
                success: function () {
                    $("#cart_item_" + productId).remove()
                    updateTotalPrice()
                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                }
            })
        }

        function updateTotalPrice() {
            var products = $(".products")

            let total = 0;

            for (product of products) {
                let price = $(product).data("price")
                let productId = $(product).data("id")
                let quantity = $("#item_product_" + productId).val()

                total += price * quantity;

            }


            $("#total").html("$ " + parseFloat(total).toFixed(2))
        }

        function changeProductQuantity(productId) {
            $.ajax({
                url: "/cart",
                method: "PUT",
                data: {
                    productId: productId,
                    _token: token,
                    quantity: $('#item_product_' + productId).val()
                },
                success: function () {
                    updateTotalPrice()
                },
                error: function () {
                    alert("Error")
                }
            })
        }
    </script>
@endsection

