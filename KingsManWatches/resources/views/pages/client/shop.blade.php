@extends("layouts.client")
@section('videoWrapper')
    <div class="videoWrapper">
        <video autoplay="" loop="" muted="" class="custom-video" poster="images/videos/bg3.jpg">
            <source src="images/videos/bg3.jpg" type="video/mp4">
        </video>
    </div>
@endsection
@section('heroText')
    <h1 class=" mt-5 mb-lg-4 class-font" data-aos="zoom-in" data-aos-delay="50">
        Kingsman Watches
    </h1>
    <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="100">
        Look At Our <strong class="custom-underline">Shop</strong>
    </p>
@endsection
@section("content")

    <section class="w3l-ecommerce-main-inn">
        <!--/mag-content-->
        <div class="ecomrhny-content-inf py-5">
            <div class="container py-lg-5">

                <!--/row1-->
                <div class="ecommerce-grids row">
                    <div class="ecommerce-left-hny col-lg-3">
                        <!--/ecommerce-left-hny-->
                        <aside>
                            <div class="sider-bar">
                                <div class="single-gd mb-5">
                                    <h4>Search <span>here</span></h4>
                                    <form action="{{route('shop')}}" method="GET">
                                        <div class="form-group">
                                            <input class="form-control" type="search" name="keyword"
                                                   placeholder="Search here...">
                                        </div>
                                        <div class="form-group ecom-ordering-select d-flex">
                                            <span class="fa fa-angle-down" aria-hidden="true"></span>
                                            <select name="sort" id="sort">
                                                <option value="default" selected>Sort By Price:</option>
                                                <option value="asc">Sort by Price: low to high</option>
                                                <option value="desc">Sort by Price: high to low</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h4>Product <span>Brands</span></h4>
                                            <ul class="list-group single" id="brands">
                                                @foreach($brands as $brand)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center w-100">
                                                        <input
                                                            {{in_array($brand->id, $checkedBrands) ? "checked" : ""}} id="inlineCheckbox-{{$brand->id}}"
                                                            type="checkbox" value="{{$brand->id}}" class="brand"
                                                            name="brandIds[]"/> {{$brand->name}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-sm" id="search" type="submit"
                                                   value="Search"/>
                                        </div>

                                    </form>
                                </div>
                                <!-- /Gallery-imgs -->
                                {{--                                --}}
                                {{--                                                                <div class="single-gd mb-5">--}}
                                {{--                                                                    <h4>Discount </h4>--}}
                                {{--                                                                    <div classes="box-hny">--}}
                                {{--                                                                        <ul class="list-group single" id="discounts">--}}

                                {{--                                                                        </ul>--}}
                                {{--                                                                    </div>--}}
                                {{--                                                                </div>--}}
                            </div>
                        </aside>
                        <!--//ecommerce-left-hny-->
                    </div>

                    <div class="ecommerce-right-hny col-lg-9">
                        <div class="row ecomhny-topbar">

                        </div>
                        <!-- /row-->
                        <div class="ecom-products-grids" id="products">
                            @foreach($products as $p)
                                <x-product :productId="$p->id"
                                           :productName="$p->name"
                                           :productBrandId="$p->brandId"
                                           :productBrandName="$p->brandName"
                                           :productPrice="$p->price"
                                           :productDescription="$p->description"
                                           :productImage="$p->image"
                                           :productImageHover="$p->imageHover"
                                />
                            @endforeach

                        </div>
                        <span class="">
                                {{$products->links()}}
                            </span>
                        <!-- //row-->
                    </div>
                </div>
                <!--//row1-->
            </div>
        </div>
        <!--//mag-content-->
    </section>
    <div style="margin: 8px auto; display: block; text-align:center;">
        <!---728x90--->
    </div>
@endsection
@section('scripts')
    <script>
        function addToCart(id) {
            $.ajax({
                url: "/cart/add/" + id,
                method: "POST",
                data: {
                    "_token": token
                },
                headers: {
                    "Accept": "application/json"
                },
                success: function () {
                    $('.alert-success').removeClass('d-none')
                    $('.alert').html('Successfully added products!')
                },
                error: function () {
                    $('.alert-success').removeClass('d-none')
                    $('.alert').html('Can`t add this products')
                }
            })
        }

    </script>
@endsection
