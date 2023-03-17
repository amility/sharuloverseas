 @extends('layouts.frontend.app')

@section('content')

    <div class="block-slideshow block-slideshow--layout--with-departments block">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-none d-lg-block"></div>
          <div class="col-12 col-lg-9">
            <div class="block-slideshow__body">
              <div class="owl-carousel"><a class="block-slideshow__slide" href="#">
                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-1.jpg')"></div>
                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-1-mobile.jpg')"></div>
                <div class="block-slideshow__slide-content">
                  <div class="block-slideshow__slide-title">Big choice of<br>
                    Plumbing products</div>
                  <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
                    Etiam pharetra laoreet dui quis molestie.</div>
                  <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop Now</span></div>
                </div>
                </a><a class="block-slideshow__slide" href="#">
                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-2.jpg')"></div>
                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-2-mobile.jpg')"></div>
                <div class="block-slideshow__slide-content">
                  <div class="block-slideshow__slide-title">Screwdrivers<br>
                    Professional Tools</div>
                  <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
                    Etiam pharetra laoreet dui quis molestie.</div>
                  <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop Now</span></div>
                </div>
                </a><a class="block-slideshow__slide" href="#">
                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-3.jpg')"></div>
                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-3-mobile.jpg')"></div>
                <div class="block-slideshow__slide-content">
                  <div class="block-slideshow__slide-title text-white">Knipex Quality<br>
                    Made in Germany</div>
                  <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop Now</span></div>
                </div>
                </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="block block-features block-features--layout--classic">
      <div class="container">
        <div class="block-features__list">
          <div class="block-features__item">
            <div class="block-features__icon"> <i class="fa fa-shuttle-van makahajan_color" style="font-size: 48px;"></i> </div>
            <div class="block-features__content">
              <div class="block-features__title">Free Shipping</div>
              <div class="block-features__subtitle">For orders from {{CurrencySymbol()}}50</div>
            </div>
          </div>
          <div class="block-features__divider"></div>
          <div class="block-features__item">
            <div class="block-features__icon"> <i class="fa fa-envelope-open-text makahajan_color" style="font-size: 48px;"></i> </div>
            <div class="block-features__content">
              <div class="block-features__title">Support </div>
              <div class="block-features__subtitle">support@makhazan.com</div>
            </div>
          </div>
          <div class="block-features__divider"></div>
          <div class="block-features__item">
            <div class="block-features__icon"> <i class="fa fa-credit-card makahajan_color" style="font-size: 48px;"></i> </div>
            <div class="block-features__content">
              <div class="block-features__title">100% Safety</div>
              <div class="block-features__subtitle">Only secure payments</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
      <div class="container">
        <div class="block-header">
          <h3 class="block-header__title">Featured Products</h3>
          <div class="block-header__divider"></div>
          <ul class="block-header__groups-list">
            <li>
              <button type="button" class="block-header__group block-header__group--active">All</button>
            </li>
            <li>
              <button type="button" class="block-header__group">Power Tools</button>
            </li>
            <li>
              <button type="button" class="block-header__group">Hand Tools</button>
            </li>
            <li>
              <button type="button" class="block-header__group">Plumbing</button>
            </li>
          </ul>
          <div class="block-header__arrows-list">
            <button class="block-header__arrow block-header__arrow--left" type="button"> <i class="fa fa-chevron-left"></i> </button>
            <button class="block-header__arrow block-header__arrow--right" type="button"> <i class="fa fa-chevron-right"></i> </button>
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
                  <div class="product-card__badges-list"> </div>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-1.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
                    <div class="product-card__rating"> </div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__badges-list"> </div>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"> <img class="product-image__img" src="images/products/product-2.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-3.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
                    <div class="product-card__rating"> </div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__badges-list"> </div>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-4.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-5.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-6.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-7.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Pliers</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-8.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Water Hose 40cm</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-9.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Spanner Wrench</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-10.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Water Tap</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-11.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Hand Tool Kit</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-12.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Ash's Chainsaw 3.5kW</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-13.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Angle Grinder KZX3890PQW</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-14.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Air Compressor DELTAKX500</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-15.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Electric Jigsaw JIG7000BQ</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-16.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Screwdriver SCREW1500ACC</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="block block--highlighted block-products-carousel" data-layout="horizontal" data-mobile-grid-columns="2">
      <div class="container">
        <div class="block-header">
          <h3 class="block-header__title">New Arrivals</h3>
          <div class="block-header__divider"></div>
          <ul class="block-header__groups-list">
            <li>
              <button type="button" class="block-header__group block-header__group--active">All</button>
            </li>
            <li>
              <button type="button" class="block-header__group">Power Tools</button>
            </li>
            <li>
              <button type="button" class="block-header__group">Hand Tools</button>
            </li>
            <li>
              <button type="button" class="block-header__group">Plumbing</button>
            </li>
          </ul>
          <div class="block-header__arrows-list">
            <button class="block-header__arrow block-header__arrow--left" type="button"> <i class="fa fa-chevron-left"></i> </button>
            <button class="block-header__arrow block-header__arrow--right" type="button"> <i class="fa fa-chevron-right"></i> </button>
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
                  <div class="product-card__badges-list"> </div>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-1.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-2.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-3.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-4.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-5.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-6.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-7.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Pliers</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-8.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Water Hose 40cm</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-9.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Spanner Wrench</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-10.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Water Tap</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-11.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Hand Tool Kit</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-12.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Ash's Chainsaw 3.5kW</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-13.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Angle Grinder KZX3890PQW</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-14.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Air Compressor DELTAKX500</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
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
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-15.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Electric Jigsaw JIG7000BQ</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                  <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-16.jpg" alt=""></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Brandix Screwdriver SCREW1500ACC</a></div>
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
                      <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
      <div class="container">
        <div class="block-header">
          <h3 class="block-header__title">Bestsellers</h3>
          <div class="block-header__divider"></div>
        </div>
        <div class="block-products__body">
          <div class="block-products__featured">
            <div class="block-products__featured-item">
              <div class="product-card product-card--hidden-actions">
                <button class="product-card__quickview" type="button">
                <svg width="16px" height="16px">
                  <use xlink:href="images/sprite.svg#quickview-16"></use>
                </svg>
                <span class="fake-svg-icon"></span></button>
                <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-1.jpg" alt=""></a></div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
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
                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="block-products__list">
            <div class="block-products__list-item">
              <div class="product-card product-card--hidden-actions">
                <button class="product-card__quickview" type="button">
                <svg width="16px" height="16px">
                  <use xlink:href="images/sprite.svg#quickview-16"></use>
                </svg>
                <span class="fake-svg-icon"></span></button>
                <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-2.jpg" alt=""></a></div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>
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
                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card product-card--hidden-actions">
                <button class="product-card__quickview" type="button">
                <svg width="16px" height="16px">
                  <use xlink:href="images/sprite.svg#quickview-16"></use>
                </svg>
                <span class="fake-svg-icon"></span></button>
                <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-3.jpg" alt=""></a></div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
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
                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card product-card--hidden-actions">
                <button class="product-card__quickview" type="button">
                <svg width="16px" height="16px">
                  <use xlink:href="images/sprite.svg#quickview-16"></use>
                </svg>
                <span class="fake-svg-icon"></span></button>
                <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-4.jpg" alt=""></a></div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
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
                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card product-card--hidden-actions">
                <button class="product-card__quickview" type="button">
                <svg width="16px" height="16px">
                  <use xlink:href="images/sprite.svg#quickview-16"></use>
                </svg>
                <span class="fake-svg-icon"></span></button>
                <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-5.jpg" alt=""></a></div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
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
                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card product-card--hidden-actions">
                <button class="product-card__quickview" type="button">
                <svg width="16px" height="16px">
                  <use xlink:href="images/sprite.svg#quickview-16"></use>
                </svg>
                <span class="fake-svg-icon"></span></button>
                <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-6.jpg" alt=""></a></div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a></div>
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
                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card product-card--hidden-actions">
                <button class="product-card__quickview" type="button">
                <svg width="16px" height="16px">
                  <use xlink:href="images/sprite.svg#quickview-16"></use>
                </svg>
                <span class="fake-svg-icon"></span></button>
                <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-7.jpg" alt=""></a></div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Brandix Pliers</a></div>
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
                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> <i class="fa fa-heart"></i> </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="block block-brands">
      <div class="container">
        <div class="block-header">
          <h3 class="block-header__title">Our Brands</h3>
          <div class="block-header__divider"></div>
        </div>
        <div class="block-brands__slider">
          <div class="owl-carousel">
            <div class="block-brands__item"><a href="#"><img src="images/logos/logo-1.png" alt=""></a></div>
            <div class="block-brands__item"><a href="#"><img src="images/logos/logo-2.png" alt=""></a></div>
            <div class="block-brands__item"><a href="#"><img src="images/logos/logo-3.png" alt=""></a></div>
            <div class="block-brands__item"><a href="#"><img src="images/logos/logo-4.png" alt=""></a></div>
            <div class="block-brands__item"><a href="#"><img src="images/logos/logo-5.png" alt=""></a></div>
            <div class="block-brands__item"><a href="#"><img src="images/logos/logo-6.png" alt=""></a></div>
            <div class="block-brands__item"><a href="#"><img src="images/logos/logo-7.png" alt=""></a></div>
          </div>
        </div>
      </div>
    </div>
@endsection