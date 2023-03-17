@extends('templates.default.app')

@section('content')

<div class="page-header">
    <div class="page-header__container container">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.blade.php">Home</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Breadcrumb</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Brandix Screwdriver SCREW1500ACC</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="block">
    <div class="container">
        <div class="product product--layout--standard" data-layout="standard">
            <div class="product__content">
                <!-- .product__gallery -->
                <div class="product__gallery">
                    <div class="product-gallery">
                        <div class="product-gallery__featured">
                            <button class="product-gallery__zoom">
                                <svg width="24px" height="24px">
                                    <use xlink:href="images/sprite.svg#zoom-in-24"></use>
                                </svg>
                            </button>
                            <div class="owl-carousel" id="product-image">
                                <div class="product-image product-image--location--gallery">
                                    <!--
                                The data-width and data-height attributes must contain the size of a larger version
                                of the product image.

                                If you do not know the image size, you can remove the data-width and data-height
                                attribute, in which case the width and height will be obtained from the naturalWidth
                                and naturalHeight property of img.product-image__img.
                                --> <a href="images/products/product-16.jpg" data-width="700" data-height="700" class="product-image__body" target="_blank"><img class="product-image__img" src="images/products/product-16.jpg" alt=""></a></div>
                                <div class="product-image product-image--location--gallery">
                                    <!--
                                The data-width and data-height attributes must contain the size of a larger version
                                of the product image.

                                If you do not know the image size, you can remove the data-width and data-height
                                attribute, in which case the width and height will be obtained from the naturalWidth
                                and naturalHeight property of img.product-image__img.
                                --> <a href="images/products/product-16-1.jpg" data-width="700" data-height="700" class="product-image__body" target="_blank"><img class="product-image__img" src="images/products/product-16-1.jpg" alt=""></a></div>
                                <div class="product-image product-image--location--gallery">
                                    <!--
                                The data-width and data-height attributes must contain the size of a larger version
                                of the product image.

                                If you do not know the image size, you can remove the data-width and data-height
                                attribute, in which case the width and height will be obtained from the naturalWidth
                                and naturalHeight property of img.product-image__img.
                                --> <a href="images/products/product-16-2.jpg" data-width="700" data-height="700" class="product-image__body" target="_blank"><img class="product-image__img" src="images/products/product-16-2.jpg" alt=""></a></div>
                                <div class="product-image product-image--location--gallery">
                                    <!--
                                The data-width and data-height attributes must contain the size of a larger version
                                of the product image.

                                If you do not know the image size, you can remove the data-width and data-height
                                attribute, in which case the width and height will be obtained from the naturalWidth
                                and naturalHeight property of img.product-image__img.
                                --> <a href="images/products/product-16-3.jpg" data-width="700" data-height="700" class="product-image__body" target="_blank"><img class="product-image__img" src="images/products/product-16-3.jpg" alt=""></a></div>
                                <div class="product-image product-image--location--gallery">
                                    <!--
                                The data-width and data-height attributes must contain the size of a larger version
                                of the product image.

                                If you do not know the image size, you can remove the data-width and data-height
                                attribute, in which case the width and height will be obtained from the naturalWidth
                                and naturalHeight property of img.product-image__img.
                                --> <a href="images/products/product-16-4.jpg" data-width="700" data-height="700" class="product-image__body" target="_blank"><img class="product-image__img" src="images/products/product-16-4.jpg" alt=""></a></div>
                            </div>
                        </div>
                        <div class="product-gallery__carousel">
                            <div class="owl-carousel" id="product-carousel"><a href="images/products/product-16.jpg" class="product-image product-gallery__carousel-item">
                                    <div class="product-image__body"><img class="product-image__img product-gallery__carousel-image" src="images/products/product-16.jpg" alt=""></div>
                                </a><a href="images/products/product-16-1.jpg" class="product-image product-gallery__carousel-item">
                                    <div class="product-image__body"><img class="product-image__img product-gallery__carousel-image" src="images/products/product-16-1.jpg" alt=""></div>
                                </a><a href="images/products/product-16-2.jpg" class="product-image product-gallery__carousel-item">
                                    <div class="product-image__body"><img class="product-image__img product-gallery__carousel-image" src="images/products/product-16-2.jpg" alt=""></div>
                                </a><a href="images/products/product-16-3.jpg" class="product-image product-gallery__carousel-item">
                                    <div class="product-image__body"><img class="product-image__img product-gallery__carousel-image" src="images/products/product-16-3.jpg" alt=""></div>
                                </a><a href="images/products/product-16-4.jpg" class="product-image product-gallery__carousel-item">
                                    <div class="product-image__body"><img class="product-image__img product-gallery__carousel-image" src="images/products/product-16-4.jpg" alt=""></div>
                                </a></div>
                        </div>
                    </div>
                </div>
                <!-- .product__gallery / end -->
                <!-- .product__info -->
                <div class="product__info">
                    <div class="product__wishlist-compare">
                        <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                            <svg width="16px" height="16px">
                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                            <svg width="16px" height="16px">
                                <use xlink:href="images/sprite.svg#compare-16"></use>
                            </svg>
                        </button>
                    </div>
                    <h1 class="product__name">Brandix Screwdriver SCREW1500ACC</h1>

                    <div class="product__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.</div>
                    <ul class="product__features">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                    </ul>
                    <ul class="product__meta">
                        <li class="product__meta-availability">Availability: <span class="text-success">In Stock</span></li>
                        <li>Brand: <a href="#">KNIPEX</a></li>

                    </ul>
                </div>
                <!-- .product__info / end -->
                <!-- .product__sidebar -->
                <div class="product__sidebar">
                    <div class="product__availability">Availability: <span class="text-success">In Stock</span></div>
                    <div class="product__prices">{{CurrencySymbol()}} 499.00</div>
                    <!-- .product__options -->
                    <form class="product__options">

                        <div class="form-group product__option">
                            <label class="product__option-label" for="product-quantity">Quantity</label>
                            <div class="product__actions">
                                <div class="product__actions-item">
                                    <div class="input-number product__quantity">
                                        <input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </div>
                                <div class="product__actions-item product__actions-item--addtocart">
                                    <button class="btn btn-primary btn-lg">Add to cart</button>
                                </div>
                                <div class="product__actions-item product__actions-item--wishlist">
                                    <button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Wishlist">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- .product__options / end -->
                </div>
                <!-- .product__end -->

            </div>
        </div>
        <div class="product-tabs product-tabs--sticky">
            <div class="product-tabs__list">
                <div class="product-tabs__list-body">
                    <div class="product-tabs__list-container container"><a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a> <a href="#tab-specification" class="product-tabs__item">Specification</a> <a href="#tab-reviews" class="product-tabs__item">PDF</a></div>
                </div>
            </div>
            <div class="product-tabs__content">
                <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                    <div class="typography">
                        <h3>Product Full Description</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum, diam non iaculis finibus, ipsum arcu sollicitudin dolor, ut cursus sapien sem sed purus. Donec vitae fringilla tortor, sed fermentum nunc. Suspendisse sodales turpis dolor, at rutrum dolor tristique id. Quisque pellentesque ullamcorper felis, eget gravida mi elementum a. Maecenas consectetur volutpat ante, sit amet molestie urna luctus in. Nulla eget dolor semper urna malesuada dictum. Duis eleifend pellentesque dui et finibus. Pellentesque dapibus dignissim augue. Etiam odio est, sodales ac aliquam id, iaculis eget lacus. Aenean porta, ante vitae suscipit pulvinar, purus dui interdum tellus, sed dapibus mi mauris vitae tellus.</p>
                        <h3>Etiam lacus lacus mollis in mattis</h3>
                        <p>Praesent mattis eget augue ac elementum. Maecenas vel ante ut enim mollis accumsan. Vestibulum vel eros at mi suscipit feugiat. Sed tortor purus, vulputate et eros a, rhoncus laoreet orci. Proin sapien neque, commodo at porta in, vehicula eu elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur porta vulputate augue, at sollicitudin nisl molestie eget.</p>
                        <p>Nunc sollicitudin, nunc id accumsan semper, libero nunc aliquet nulla, nec pretium ipsum risus ac neque. Morbi eu facilisis purus. Quisque mi tortor, cursus in nulla ut, laoreet commodo quam. Pellentesque et ornare sapien. In ac est tempus urna tincidunt finibus. Integer erat ipsum, tristique ac lobortis sit amet, dapibus sit amet purus. Nam sed lorem nisi. Vestibulum ultrices tincidunt turpis, sit amet fringilla odio scelerisque non.</p>
                    </div>
                </div>
                <div class="product-tabs__pane" id="tab-specification">
                    <div class="spec">
                        <h3 class="spec__header">Specification</h3>
                        <div class="spec__section">
                            <h4 class="spec__section-title">General</h4>
                            <div class="spec__row">
                                <div class="spec__name">Material</div>
                                <div class="spec__value">Aluminium, Plastic</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Engine Type</div>
                                <div class="spec__value">Brushless</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Battery Voltage</div>
                                <div class="spec__value">18 V</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Battery Type</div>
                                <div class="spec__value">Li-lon</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Number of Speeds</div>
                                <div class="spec__value">2</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Charge Time</div>
                                <div class="spec__value">1.08 h</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Weight</div>
                                <div class="spec__value">1.5 kg</div>
                            </div>
                        </div>
                        <div class="spec__section">
                            <h4 class="spec__section-title">Dimensions</h4>
                            <div class="spec__row">
                                <div class="spec__name">Length</div>
                                <div class="spec__value">99 mm</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Width</div>
                                <div class="spec__value">207 mm</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Height</div>
                                <div class="spec__value">208 mm</div>
                            </div>
                        </div>
                        <div class="spec__disclaimer">Information on technical characteristics, the delivery set, the country of manufacture and the appearance of the goods is for reference only and is based on the latest information available at the time of publication.</div>
                    </div>
                </div>
                <div class="product-tabs__pane" id="tab-reviews">
                    <div class="reviews-view">
                        <div class="reviews-view__list">
                            <h3 class="reviews-view__header">PDF Download</h3>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .block-products-carousel -->
<div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">Related Products</h3>
            <div class="block-header__divider"></div>
            <div class="block-header__arrows-list">
                <button class="block-header__arrow block-header__arrow--left" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                    </svg>
                </button>
                <button class="block-header__arrow block-header__arrow--right" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="block-products-carousel__slider">
            <div class="block-products-carousel__preloader"></div>
            <div class="owl-carousel">
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__badges-list">
                            </div>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-1.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Electric Planer Brandix KL370090G 300 Watts</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}749.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__badges-list">
                            </div>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-2.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}1,019.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-3.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}850.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__badges-list">
                            </div>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-4.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices"><span class="product-card__new-price">{{CurrencySymbol()}}949.00</span> <span class="product-card__old-price">{{CurrencySymbol()}}1189.00</span></div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-5.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Brandix Router Power Tool 2017ERXPK</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}1,700.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-6.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Brandix Drilling Machine DM2019KW4 4kW</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}3,199.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-7.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Brandix Pliers</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}24.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-8.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Water Hose 40cm</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}15.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-9.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Spanner Wrench</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}19.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-10.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Water Tap</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}15.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-11.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Hand Tool Kit</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}149.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <i class="fa fa-heart"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-12.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Ash's Chainsaw 3.5kW</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}666.99</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-13.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Brandix Angle Grinder KZX3890PQW</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}649.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-14.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Brandix Air Compressor DELTAKX500</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}1,800.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-15.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Brandix Electric Jigsaw JIG7000BQ</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}290.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image product-image"><a href="{{ URL::to('/product') }}" class="product-image__body"><img class="product-image__img" src="images/products/product-16.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ URL::to('/product') }}">Brandix Screwdriver SCREW1500ACC</a></div>

                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                <div class="product-card__prices">{{CurrencySymbol()}}1,499.00</div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <i class="fa fa-heart"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection