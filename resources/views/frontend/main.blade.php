<!DOCTYPE html>
<html lang="zxx">
<head>
    @include('frontend.head')
</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="../../../../../../../Downloads/ogani-master/ogani-master/shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="../../../../../../../Downloads/ogani-master/ogani-master/shop-details.html">Shop
                            Details</a></li>
                    <li><a href="../../../../../../../Downloads/ogani-master/ogani-master/shoping-cart.html">Shoping
                            Cart</a></li>
                    <li><a href="../../../../../../../Downloads/ogani-master/ogani-master/checkout.html">Check Out</a>
                    </li>
                    <li><a href="../../../../../../../Downloads/ogani-master/ogani-master/blog-details.html">Blog
                            Details</a></li>
                </ul>
            </li>
            <li><a href="../../../../../../../Downloads/ogani-master/ogani-master/blog.html">Blog</a></li>
            <li><a href="../../../../../../../Downloads/ogani-master/ogani-master/contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> admin@gmail.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
@include('frontend.header')
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            @include('frontend.slidebar')
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="{{$products[0]->thumb}}">
                    <div class="hero__text">
                        <span>Shop quần áo</span>
                        <h2>Hàng thật <br/>100%</h2>
                        <p>Chọn và thanh toán</p>
                        <a href="#" class="primary-btn">MUA NGAY</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
               @foreach($products as $product)

                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{$product->thumb}}">
                            <h5><a href="{{route('detail',[$product->id,$product->id_category])}}">{{$product->name}}</a></h5>
                        </div>
                    </div>
               @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach($categories as $category)
                            <li data-filter=".category{{$category->id}}">{{$category->name_cate}}</li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges category{{$product->id_category}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$product->thumb}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{route('detail',[$product->id,$product->id_category])}}">{{$product->name}}</a></h6>
                            <h5>{{$product->price_out}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm mới</h4>
                    <div class="latest-product__slider owl-carousel">

                            <div class="latest-prdouct__slider__item">
                                @foreach($products_new as $product)
                                <a href="{{route('detail',[$product->id,$product->id_category])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img class="img-fluid" style="width: 100px !important; " src="{{$product->thumb}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product->name}}</h6>
                                        <span>{{$product->price_out}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm giá rẻ</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                           @foreach($products_price as $product)
                                <a href="{{route('detail',[$product->id,$product->id_category])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img class="img-fluid" style="width: 100px !important; " src="{{$product->thumb}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product->name}}</h6>
                                        <span>{{$product->price_out}}</span>
                                    </div>
                                </a>
                           @endforeach

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm tốt</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach($products_good as $product)
                                <a href="{{route('detail',[$product->id,$product->id_category])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img class="img-fluid" style="width: 100px !important; " src="{{$product->thumb}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product->name}}</h6>
                                        <span>{{$product->price_out}}</span>
                                    </div>
                                </a>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

@include('frontend.footer');


</body>

</html>
