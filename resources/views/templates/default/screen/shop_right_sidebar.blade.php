<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>Makhazan</title>
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
<!-- css -->
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="vendor/photoswipe/photoswipe.css">
<link rel="stylesheet" href="vendor/photoswipe/default-skin/default-skin.css">
<link rel="stylesheet" href="vendor/select2/css/select2.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- font - fontawesome -->
<link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
<!-- font - stroyka -->
<link rel="stylesheet" href="fonts/stroyka/stroyka.css">
</head>
<body>
<!-- site -->
<div class="site"><!-- mobile site__header -->
  <header class="site__header d-lg-none">
	  <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
    <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
      <div class="mobile-header__panel">
        <div class="container">
          <div class="mobile-header__body">
            <button class="mobile-header__menu-button">
           <i class="fa fa-list"></i>
            </button>
            <a class="mobile-header__logo" href="index.blade.php"><!-- mobile-logo -->
            <img src="images/Shuja-Logo.png" alt=""/>            <!-- mobile-logo / end --></a>
            <div class="search search--location--mobile-header mobile-header__search">
              <div class="search__body">
                <form class="search__form" action="#">
                  <input class="search__input" name="search" placeholder="Search  products" aria-label="Site search" type="text" autocomplete="off">
                  <button class="search__button search__button--type--submit" type="submit">
                 <i class="fa fa-search"></i>
                  </button>
                  <button class="search__button search__button--type--close" type="button">
                 <i class="fa fa-times"></i>
                  </button>
                  <div class="search__border"></div>
                </form>
                <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
              </div>
            </div>
            <div class="mobile-header__indicators">
              <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                <button class="indicator__button"><span class="indicator__area">
                <i class="fa fa-search makahajan_color"></i>
                </span></button>
              </div>
              <div class="indicator indicator--mobile d-sm-flex d-none"><a href="wishlist.html" class="indicator__button"><span class="indicator__area">
				  <i class="fa fa-heart"></i>
                <span class="indicator__value">0</span></span></a></div>
              <div class="indicator indicator--mobile"><a href="cart.html" class="indicator__button"><span class="indicator__area">
                <i class="fa fa-cart-plus makahajan_color"></i>
                <span class="indicator__value">3</span></span></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- mobile site__header / end --><!-- desktop site__header -->
  <header class="site__header d-lg-block d-none">
    <div class="site-header"><!-- .topbar -->
      <div class="site-header__topbar topbar">
        <div class="topbar__container container">
          <div class="topbar__row">
			 <div class="topbar__item topbar__item--link"><a class="topbar-link" href="index.blade.php">Home</a></div>
            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="about-us.html">About Us</a></div>
            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="contact-us.html">Contact Us</a></div>
            <div class="topbar__spring"></div>
            <div class="topbar__item">
              <div class="topbar-dropdown">
                <button class="topbar-dropdown__btn" type="button">My Account
                <i class="fa fa-chevron-down"></i>
                </button>
                <div class="topbar-dropdown__body"><!-- .menu -->
                  <div class="menu menu--layout--topbar">
                    <div class="menu__submenus-container"></div>
                    <ul class="menu__list">
                      <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                        <div class="menu__item-submenu-offset"></div>
                        <a class="menu__item-link" href="account-dashboard.html">Dashboard</a></li>
                      <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                        <div class="menu__item-submenu-offset"></div>
                        <a class="menu__item-link" href="account-profile.html">Edit Profile</a></li>
                      <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                        <div class="menu__item-submenu-offset"></div>
                        <a class="menu__item-link" href="account-orders.html">Order History</a></li>

                      <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                        <div class="menu__item-submenu-offset"></div>
                        <a class="menu__item-link" href="account-login.html">Logout</a></li>
                    </ul>
                  </div>
                  <!-- .menu / end --></div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- .topbar / end -->
      <div class="site-header__middle container">
        <div class="site-header__logo"><a href="index.blade.php">
			<!-- logo -->
		  <img src="images/Shuja-Logo.png" alt="makhazan"/> <!-- logo / end --></a></div>
        <div class="site-header__search">
          <div class="search search--location--header">
            <div class="search__body">
              <form class="search__form" action="#">
                <select class="search__categories" aria-label="Category">
                  <option value="all">All Categories</option>
                  <option>Power Tools</option>
                  <option>Hand Tools</option>
                  <option>Machine Tools</option>
                  <option>Power Machinery</option>
                  <option>Measurement</option>
                  <option>Automotive</option>
                </select>
                <input class="search__input" name="search" placeholder="Search products" aria-label="Site search" type="text" autocomplete="off">
                <button class="search__button search__button--type--submit" type="submit">
               <i class="fa fa-search text-white"></i>
                </button>
                <div class="search__border"></div>
              </form>
              <div class="search__suggestions suggestions suggestions--location--header"></div>
            </div>
          </div>
        </div>
        <div class="site-header__phone">
          <div class="site-header__phone-title">Support</div>
          <div class="site-header__phone-number">(+965) 123-456-78</div>
        </div>
      </div>
      <div class="site-header__nav-panel"><!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
        <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
          <div class="nav-panel__container container">
            <div class="nav-panel__row"><div class="nav-panel__departments">
				  <!-- .departments -->
                <div class="departments" data-departments-fixed-by="">
                  <div class="departments__body">
                    <div class="departments__links-wrapper">
                      <div class="departments__submenus-container"></div>
                      <ul class="departments__links">
                        <li class="departments__item"><a class="departments__item-link" href="#">Power Tools
                          <svg class="departments__item-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                          </svg>
                          </a>
                          <div class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--xl"><!-- .megamenu -->
                            <div class="megamenu megamenu--departments">
                              <div class="megamenu__body" style="background-image: url('images/megamenu/megamenu-1.jpg');">
                                <div class="row">
                                  <div class="col-3">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Power Tools</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Engravers</a></li>
                                          <li class="megamenu__item"><a href="#">Drills</a></li>
                                          <li class="megamenu__item"><a href="#">Wrenches</a></li>
                                          <li class="megamenu__item"><a href="#">Plumbing</a></li>
                                          <li class="megamenu__item"><a href="#">Wall Chaser</a></li>
                                          <li class="megamenu__item"><a href="#">Pneumatic Tools</a></li>
                                          <li class="megamenu__item"><a href="#">Milling Cutters</a></li>
                                        </ul>
                                      </li>
                                      <li class="megamenu__item"><a href="#">Workbenches</a></li>
                                      <li class="megamenu__item"><a href="#">Presses</a></li>
                                      <li class="megamenu__item"><a href="#">Spray Guns</a></li>
                                      <li class="megamenu__item"><a href="#">Riveters</a></li>
                                    </ul>
                                  </div>
                                  <div class="col-3">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Hand Tools</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Screwdrivers</a></li>
                                          <li class="megamenu__item"><a href="#">Handsaws</a></li>
                                          <li class="megamenu__item"><a href="#">Knives</a></li>
                                          <li class="megamenu__item"><a href="#">Axes</a></li>
                                          <li class="megamenu__item"><a href="#">Multitools</a></li>
                                          <li class="megamenu__item"><a href="#">Paint Tools</a></li>
                                        </ul>
                                      </li>
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Garden Equipment</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Motor Pumps</a></li>
                                          <li class="megamenu__item"><a href="#">Chainsaws</a></li>
                                          <li class="megamenu__item"><a href="#">Electric Saws</a></li>
                                          <li class="megamenu__item"><a href="#">Brush Cutters</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-3">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Machine Tools</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Thread Cutting</a></li>
                                          <li class="megamenu__item"><a href="#">Chip Blowers</a></li>
                                          <li class="megamenu__item"><a href="#">Sharpening Machines</a></li>
                                          <li class="megamenu__item"><a href="#">Pipe Cutters</a></li>
                                          <li class="megamenu__item"><a href="#">Slotting machines</a></li>
                                          <li class="megamenu__item"><a href="#">Lathes</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-3">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Instruments</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Welding Equipment</a></li>
                                          <li class="megamenu__item"><a href="#">Power Tools</a></li>
                                          <li class="megamenu__item"><a href="#">Hand Tools</a></li>
                                          <li class="megamenu__item"><a href="#">Measuring Tool</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- .megamenu / end --></div>
                        </li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Hand Tools
                          <svg class="departments__item-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                          </svg>
                          </a>
                          <div class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--lg"><!-- .megamenu -->
                            <div class="megamenu megamenu--departments">
                              <div class="megamenu__body" style="background-image: url('images/megamenu/megamenu-2.jpg');">
                                <div class="row">
                                  <div class="col-4">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Hand Tools</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Screwdrivers</a></li>
                                          <li class="megamenu__item"><a href="#">Handsaws</a></li>
                                          <li class="megamenu__item"><a href="#">Knives</a></li>
                                          <li class="megamenu__item"><a href="#">Axes</a></li>
                                          <li class="megamenu__item"><a href="#">Multitools</a></li>
                                          <li class="megamenu__item"><a href="#">Paint Tools</a></li>
                                        </ul>
                                      </li>
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Garden Equipment</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Motor Pumps</a></li>
                                          <li class="megamenu__item"><a href="#">Chainsaws</a></li>
                                          <li class="megamenu__item"><a href="#">Electric Saws</a></li>
                                          <li class="megamenu__item"><a href="#">Brush Cutters</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-4">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Machine Tools</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Thread Cutting</a></li>
                                          <li class="megamenu__item"><a href="#">Chip Blowers</a></li>
                                          <li class="megamenu__item"><a href="#">Sharpening Machines</a></li>
                                          <li class="megamenu__item"><a href="#">Pipe Cutters</a></li>
                                          <li class="megamenu__item"><a href="#">Slotting machines</a></li>
                                          <li class="megamenu__item"><a href="#">Lathes</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-4">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Instruments</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Welding Equipment</a></li>
                                          <li class="megamenu__item"><a href="#">Power Tools</a></li>
                                          <li class="megamenu__item"><a href="#">Hand Tools</a></li>
                                          <li class="megamenu__item"><a href="#">Measuring Tool</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- .megamenu / end --></div>
                        </li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Machine Tools
                          <svg class="departments__item-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                          </svg>
                          </a>
                          <div class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--nl"><!-- .megamenu -->
                            <div class="megamenu megamenu--departments">
                              <div class="megamenu__body" style="background-image: url('images/megamenu/megamenu-3.jpg');">
                                <div class="row">
                                  <div class="col-6">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Hand Tools</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Screwdrivers</a></li>
                                          <li class="megamenu__item"><a href="#">Handsaws</a></li>
                                          <li class="megamenu__item"><a href="#">Knives</a></li>
                                          <li class="megamenu__item"><a href="#">Axes</a></li>
                                          <li class="megamenu__item"><a href="#">Multitools</a></li>
                                          <li class="megamenu__item"><a href="#">Paint Tools</a></li>
                                        </ul>
                                      </li>
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Garden Equipment</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Motor Pumps</a></li>
                                          <li class="megamenu__item"><a href="#">Chainsaws</a></li>
                                          <li class="megamenu__item"><a href="#">Electric Saws</a></li>
                                          <li class="megamenu__item"><a href="#">Brush Cutters</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-6">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Instruments</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Welding Equipment</a></li>
                                          <li class="megamenu__item"><a href="#">Power Tools</a></li>
                                          <li class="megamenu__item"><a href="#">Hand Tools</a></li>
                                          <li class="megamenu__item"><a href="#">Measuring Tool</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- .megamenu / end --></div>
                        </li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Building Supplies
                          <svg class="departments__item-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                          </svg>
                          </a>
                          <div class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--sm"><!-- .megamenu -->
                            <div class="megamenu megamenu--departments">
                              <div class="megamenu__body">
                                <div class="row">
                                  <div class="col-12">
                                    <ul class="megamenu__links megamenu__links--level--0">
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Hand Tools</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Screwdrivers</a></li>
                                          <li class="megamenu__item"><a href="#">Handsaws</a></li>
                                          <li class="megamenu__item"><a href="#">Knives</a></li>
                                          <li class="megamenu__item"><a href="#">Axes</a></li>
                                          <li class="megamenu__item"><a href="#">Multitools</a></li>
                                          <li class="megamenu__item"><a href="#">Paint Tools</a></li>
                                        </ul>
                                      </li>
                                      <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Garden Equipment</a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <li class="megamenu__item"><a href="#">Motor Pumps</a></li>
                                          <li class="megamenu__item"><a href="#">Chainsaws</a></li>
                                          <li class="megamenu__item"><a href="#">Electric Saws</a></li>
                                          <li class="megamenu__item"><a href="#">Brush Cutters</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- .megamenu / end --></div>
                        </li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Electrical
                          <svg class="departments__item-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                          </svg>
                          </a>
                          <div class="departments__submenu departments__submenu--type--menu"><!-- .menu -->
                            <div class="menu menu--layout--classic">
                              <div class="menu__submenus-container"></div>
                              <ul class="menu__list">
                                <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                  <div class="menu__item-submenu-offset"></div>
                                  <a class="menu__item-link" href="#">Soldering Equipment
                                  <svg class="menu__item-arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                  </svg>
                                  </a>
                                  <div class="menu__submenu"><!-- .menu -->
                                    <div class="menu menu--layout--classic">
                                      <div class="menu__submenus-container"></div>
                                      <ul class="menu__list">
                                        <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                          <div class="menu__item-submenu-offset"></div>
                                          <a class="menu__item-link" href="#">Soldering Station</a></li>
                                        <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                          <div class="menu__item-submenu-offset"></div>
                                          <a class="menu__item-link" href="#">Soldering Dryers</a></li>
                                        <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                          <div class="menu__item-submenu-offset"></div>
                                          <a class="menu__item-link" href="#">Gas Soldering Iron</a></li>
                                        <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                          <div class="menu__item-submenu-offset"></div>
                                          <a class="menu__item-link" href="#">Electric Soldering Iron</a></li>
                                      </ul>
                                    </div>
                                    <!-- .menu / end --></div>
                                </li>
                                <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                  <div class="menu__item-submenu-offset"></div>
                                  <a class="menu__item-link" href="#">Light Bulbs</a></li>
                                <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                  <div class="menu__item-submenu-offset"></div>
                                  <a class="menu__item-link" href="#">Batteries</a></li>
                                <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                  <div class="menu__item-submenu-offset"></div>
                                  <a class="menu__item-link" href="#">Light Fixtures</a></li>
                                <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                  <div class="menu__item-submenu-offset"></div>
                                  <a class="menu__item-link" href="#">Warm Floor</a></li>
                                <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                  <div class="menu__item-submenu-offset"></div>
                                  <a class="menu__item-link" href="#">Generators</a></li>
                                <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                  <div class="menu__item-submenu-offset"></div>
                                  <a class="menu__item-link" href="#">UPS</a></li>
                              </ul>
                            </div>
                            <!-- .menu / end --></div>
                        </li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Power Machinery</a></li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Measurement</a></li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Clothes & PPE</a></li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Plumbing</a></li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Storage & Organization</a></li>
                        <li class="departments__item"><a class="departments__item-link" href="#">Welding & Soldering</a></li>
                      </ul>
                    </div>
                  </div>
                  <button class="departments__button">
                  <i class="fa fa-align-left departments__button-icon"></i>
                  Shop By Category
                  <i class="fa fa-chevron-up departments__button-arrow"></i>
                  </button>
                </div>
                <!-- .departments / end --></div>
              <!-- .nav-links -->
              <div class="nav-panel__nav-links nav-links">
                <ul class="nav-links__list d-none">
                  <li class="nav-links__item nav-links__item--has-submenu">
					  <a class="nav-links__item-link" href="index.blade.php">
                    <div class="nav-links__item-body">Home
                      <svg class="nav-links__item-arrow" width="9px" height="6px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                      </svg>
                    </div>
                    </a>
                    <div class="nav-links__submenu nav-links__submenu--type--menu"><!-- .menu -->

                      <!-- .menu / end --></div>
                  </li>

                  <li class="nav-links__item nav-links__item--has-submenu"><a class="nav-links__item-link" href="shop-grid-3-columns-sidebar.html">
                    <div class="nav-links__item-body">Shop
                      <svg class="nav-links__item-arrow" width="9px" height="6px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                      </svg>
                    </div>
                    </a>
                    <div class="nav-links__submenu nav-links__submenu--type--menu"><!-- .menu -->
                      <div class="menu menu--layout--classic">
                        <div class="menu__submenus-container"></div>
                        <ul class="menu__list">
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="shop-grid-3-columns-sidebar.html">Shop Grid
                            <svg class="menu__item-arrow" width="6px" height="9px">
                              <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                            </svg>
                            </a>
                            <div class="menu__submenu"><!-- .menu -->
                              <div class="menu menu--layout--classic">
                                <div class="menu__submenus-container"></div>
                                <ul class="menu__list">
                                  <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                    <div class="menu__item-submenu-offset"></div>
                                    <a class="menu__item-link" href="shop-grid-3-columns-sidebar.html">3 Columns Sidebar</a></li>
                                  <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                    <div class="menu__item-submenu-offset"></div>
                                    <a class="menu__item-link" href="shop-grid-4-columns-full.html">4 Columns Full</a></li>
                                  <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                    <div class="menu__item-submenu-offset"></div>
                                    <a class="menu__item-link" href="shop-grid-5-columns-full.html">5 Columns Full</a></li>
                                </ul>
                              </div>
                              <!-- .menu / end --></div>
                          </li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="shop-list.html">Shop List</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="product.html">Product
                            <svg class="menu__item-arrow" width="6px" height="9px">
                              <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                            </svg>
                            </a>
                            <div class="menu__submenu"><!-- .menu -->
                              <div class="menu menu--layout--classic">
                                <div class="menu__submenus-container"></div>
                                <ul class="menu__list">
                                  <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                    <div class="menu__item-submenu-offset"></div>
                                    <a class="menu__item-link" href="product.html">Product</a></li>
                                  <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                    <div class="menu__item-submenu-offset"></div>
                                    <a class="menu__item-link" href="product-alt.html">Product Alt</a></li>
                                  <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                    <div class="menu__item-submenu-offset"></div>
                                    <a class="menu__item-link" href="product-sidebar.html">Product Sidebar</a></li>
                                </ul>
                              </div>
                              <!-- .menu / end --></div>
                          </li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="cart.html">Cart</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="cart-empty.html">Cart Empty</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="checkout.html">Checkout</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="order-success.html">Order Success</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="wishlist.html">Wishlist</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="compare.html">Compare</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="track-order.html">Track Order</a></li>
                        </ul>
                      </div>
                      <!-- .menu / end --></div>
                  </li>
                  <li class="nav-links__item nav-links__item--has-submenu"><a class="nav-links__item-link" href="account-login.html">
                    <div class="nav-links__item-body">Account
                      <svg class="nav-links__item-arrow" width="9px" height="6px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                      </svg>
                    </div>
                    </a>
                    <div class="nav-links__submenu nav-links__submenu--type--menu"><!-- .menu -->
                      <div class="menu menu--layout--classic">
                        <div class="menu__submenus-container"></div>
                        <ul class="menu__list">
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="account-login.html">Login</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="account-dashboard.html">Dashboard</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="account-profile.html">Edit Profile</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="account-orders.html">Order History</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="account-order-details.html">Order Details</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="account-addresses.html">Address Book</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="account-edit-address.html">Edit Address</a></li>
                          <li class="menu__item"><!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="account-password.html">Change Password</a></li>
                        </ul>
                      </div>
                      <!-- .menu / end --></div>
                  </li>



                </ul>
              </div>
              <!-- .nav-links / end -->
              <div class="nav-panel__indicators">
                <div class="indicator"><a href="wishlist.html" class="indicator__button"><span class="indicator__area">
                 <i class="fa fa-heart"></i>
                  <span class="indicator__value">0</span></span></a></div>
                <div class="indicator indicator--trigger--click"><a href="cart.html" class="indicator__button"><span class="indicator__area">
                 <i class="fa fa-cart-plus"></i>
                  <span class="indicator__value">3</span></span></a>
                  <div class="indicator__dropdown"><!-- .dropcart -->
                    <div class="dropcart dropcart--style--dropdown">
                      <div class="dropcart__body">
                        <div class="dropcart__products-list">
                          <div class="dropcart__product">
                            <div class="product-image dropcart__product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-1.jpg" alt=""></a></div>
                            <div class="dropcart__product-info">
                              <div class="dropcart__product-name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
                              <ul class="dropcart__product-options">
                                <li>Color: Yellow</li>
                                <li>Material: Aluminium</li>
                              </ul>
                              <div class="dropcart__product-meta"><span class="dropcart__product-quantity">2</span> × <span class="dropcart__product-price">{{CurrencySymbol()}}699.00</span></div>
                            </div>
                            <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                            <svg width="10px" height="10px">
                              <use xlink:href="images/sprite.svg#cross-10"></use>
                            </svg>
                            </button>
                          </div>
                          <div class="dropcart__product">
                            <div class="product-image dropcart__product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-2.jpg" alt=""></a></div>
                            <div class="dropcart__product-info">
                              <div class="dropcart__product-name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 watts</a></div>
                              <div class="dropcart__product-meta"><span class="dropcart__product-quantity">1</span> × <span class="dropcart__product-price">{{CurrencySymbol()}}849.00</span></div>
                            </div>
                            <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                            <svg width="10px" height="10px">
                              <use xlink:href="images/sprite.svg#cross-10"></use>
                            </svg>
                            </button>
                          </div>
                          <div class="dropcart__product">
                            <div class="product-image dropcart__product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-5.jpg" alt=""></a></div>
                            <div class="dropcart__product-info">
                              <div class="dropcart__product-name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
                              <ul class="dropcart__product-options">
                                <li>Color: True Red</li>
                              </ul>
                              <div class="dropcart__product-meta"><span class="dropcart__product-quantity">3</span> × <span class="dropcart__product-price">{{CurrencySymbol()}}1,210.00</span></div>
                            </div>
                            <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                            <svg width="10px" height="10px">
                              <use xlink:href="images/sprite.svg#cross-10"></use>
                            </svg>
                            </button>
                          </div>
                        </div>
                        <div class="dropcart__totals">
                          <table>
                            <tr>
                              <th>Total</th>
                              <td>{{CurrencySymbol()}} 902.00</td>
                            </tr>
                          </table>
                        </div>
                        <div class="dropcart__buttons"><a class="btn btn-secondary" href="cart.html">View Cart</a> <a class="btn btn-primary" href="checkout.html">Checkout</a></div>
                      </div>
                    </div>
                    <!-- .dropcart / end --></div>
                </div>
                <div class="indicator indicator--trigger--click"><a href="account-login.html" class="indicator__button"><span class="indicator__area">
                 <i class="fa fa-user"></i>
                  </span></a>
                  <div class="indicator__dropdown">
                    <div class="account-menu">
						 <a href="account-dashboard.html" class="account-menu__user">
                      <div class="account-menu__user-avatar"><img src="images/avatars/avatar-2.jpg" alt=""></div>
                      <div class="account-menu__user-info">
                        <div class="account-menu__user-name">Mohammed Paloda</div>
                        <div class="account-menu__user-email">mohammed@makhajan.com</div>
                      </div>
                      </a>
                      <div class="account-menu__divider"></div>
                      <form class="account-menu__form">
                        <div class="account-menu__form-title">Log In to Your Account</div>
                        <div class="form-group">
                          <label for="header-signin-email" class="sr-only">Email address</label>
                          <input id="header-signin-email" type="email" class="form-control form-control-sm" placeholder="Email address">
                        </div>
                        <div class="form-group">
                          <label for="header-signin-password" class="sr-only">Password</label>
                          <div class="account-menu__form-forgot">
                            <input id="header-signin-password" type="password" class="form-control form-control-sm" placeholder="Password">
                            <a href="#" class="account-menu__form-forgot-link">Forgot?</a></div>
                        </div>
                        <div class="form-group account-menu__form-button">
                          <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </div>
                        <div class="account-menu__form-link"><a href="account-login.html">Create An Account</a></div>
                      </form>
                      <div class="account-menu__divider"></div>



                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- desktop site__header / end --><!-- site__body -->
  <div class="site__body">
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
              <li class="breadcrumb-item active" aria-current="page">Screwdrivers</li>
            </ol>
          </nav>
        </div>
        <div class="page-header__title">
          <h1>Screwdrivers</h1>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="shop-layout shop-layout--sidebar--end">
        <div class="shop-layout__content">
          <div class="block">
            <div class="products-view">
              <div class="products-view__options">
                <div class="view-options view-options--offcanvas--mobile">
                  <div class="view-options__filters-button">
                    <button type="button" class="filters-button">
                    <svg class="filters-button__icon" width="16px" height="16px">
                      <use xlink:href="images/sprite.svg#filters-16"></use>
                    </svg>
                    <span class="filters-button__title">Filters</span> <span class="filters-button__counter">3</span></button>
                  </div>
                  <div class="view-options__layout">
                    <div class="layout-switcher">
                      <div class="layout-switcher__list">
                        <button data-layout="grid-3-sidebar" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button--active">
                        <svg width="16px" height="16px">
                          <use xlink:href="images/sprite.svg#layout-grid-16x16"></use>
                        </svg>
                        </button>
                        <button data-layout="grid-3-sidebar" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button">
                        <svg width="16px" height="16px">
                          <use xlink:href="images/sprite.svg#layout-grid-with-details-16x16"></use>
                        </svg>
                        </button>
                        <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button">
                        <svg width="16px" height="16px">
                          <use xlink:href="images/sprite.svg#layout-list-16x16"></use>
                        </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="view-options__legend">Showing 6 of 98 products</div>
                  <div class="view-options__divider"></div>
                  <div class="view-options__control">
                    <label for="">Sort By</label>
                    <div>
                      <select class="form-control form-control-sm" name="" id="">
                        <option value="">Default</option>
                        <option value="">Name (A-Z)</option>
                      </select>
                    </div>
                  </div>
                  <div class="view-options__control">
                    <label for="">Show</label>
                    <div>
                      <select class="form-control form-control-sm" name="" id="">
                        <option value="">12</option>
                        <option value="">24</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false" data-mobile-grid-columns="2">
                <div class="products-list__body">
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__badges-list">
                        <div class="product-card__badge product-card__badge--new">New</div>
                      </div>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-1.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">9 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$749.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__badges-list">
                        <div class="product-card__badge product-card__badge--hot">Hot</div>
                      </div>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-2.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">11 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$1,019.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-3.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">9 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$850.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__badges-list">
                        <div class="product-card__badge product-card__badge--sale">Sale</div>
                      </div>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-4.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">7 Reviews</div>
                        </div>
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
                        <div class="product-card__prices"><span class="product-card__new-price">$949.00</span> <span class="product-card__old-price">$1189.00</span></div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-5.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">9 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$1,700.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-6.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">7 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$3,199.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-7.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Brandix Pliers</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">4 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$24.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-8.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Water Hose 40cm</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">4 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$15.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-9.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Spanner Wrench</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">9 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$19.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-10.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Water Tap</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">11 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$15.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-11.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Hand Tool Kit</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">9 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$149.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-12.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Ash's Chainsaw 3.5kW</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">11 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$666.99</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-13.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Brandix Angle Grinder KZX3890PQW</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">4 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$649.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-14.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Brandix Air Compressor DELTAKX500</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">7 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$1,800.00</div>
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
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button>
                      <div class="product-card__image product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-15.jpg" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="product.html">Brandix Electric Jigsaw JIG7000BQ</a></div>
                        <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                                <svg class="rating__star" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                  </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge">
                                  <div class="rating__fill">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                  <div class="rating__stroke">
                                    <div class="fake-svg-icon"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__rating-legend">4 Reviews</div>
                        </div>
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
                        <div class="product-card__prices">$290.00</div>
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
              </div>
              <div class="products-view__pagination">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled"><a class="page-link page-link--with-arrow" href="#" aria-label="Previous">
                    <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                      <use xlink:href="images/sprite.svg#arrow-rounded-left-8x13"></use>
                    </svg>
                    </a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active"><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link page-link--with-arrow" href="#" aria-label="Next">
                    <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                      <use xlink:href="images/sprite.svg#arrow-rounded-right-8x13"></use>
                    </svg>
                    </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="shop-layout__sidebar">
          <div class="block block-sidebar block-sidebar--offcanvas--mobile">
            <div class="block-sidebar__backdrop"></div>
            <div class="block-sidebar__body">
              <div class="block-sidebar__header">
                <div class="block-sidebar__title">Filters</div>
                <button class="block-sidebar__close" type="button">
                <svg width="20px" height="20px">
                  <use xlink:href="images/sprite.svg#cross-20"></use>
                </svg>
                </button>
              </div>
              <div class="block-sidebar__item">
                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                  <h4 class="widget-filters__title widget__title">Filters</h4>
                  <div class="widget-filters__list">
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Categories
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-categories">
                              <ul class="filter-categories__list">
                                <li class="filter-categories__item filter-categories__item--parent">
                                  <svg class="filter-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-6x9"></use>
                                  </svg>
                                  <a href="#">Construction & Repair</a>
                                  <div class="filter-categories__counter">254</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--parent">
                                  <svg class="filter-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-6x9"></use>
                                  </svg>
                                  <a href="#">Instruments</a>
                                  <div class="filter-categories__counter">75</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--current"><a href="#">Power Tools</a>
                                  <div class="filter-categories__counter">21</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Drills & Mixers</a>
                                  <div class="filter-categories__counter">15</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Cordless Screwdrivers</a>
                                  <div class="filter-categories__counter">2</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Screwdrivers</a>
                                  <div class="filter-categories__counter">30</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Wrenches</a>
                                  <div class="filter-categories__counter">7</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Grinding Machines</a>
                                  <div class="filter-categories__counter">5</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Milling Cutters</a>
                                  <div class="filter-categories__counter">2</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Electric Spray Guns</a>
                                  <div class="filter-categories__counter">9</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Jigsaws</a>
                                  <div class="filter-categories__counter">4</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Jackhammers</a>
                                  <div class="filter-categories__counter">0</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Planers</a>
                                  <div class="filter-categories__counter">12</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Glue Guns</a>
                                  <div class="filter-categories__counter">7</div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Categories Alt
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-categories-alt">
                              <ul class="filter-categories-alt__list filter-categories-alt__list--level--1" data-collapse-opened-class="filter-categories-alt__item--open">
                                <li class="filter-categories-alt__item" data-collapse-item><a href="#">Clothes & PPE</a></li>
                                <li class="filter-categories-alt__item" data-collapse-item>
                                  <button class="filter-categories-alt__expander" data-collapse-trigger></button>
                                  <a href="#">Power Tools</a>
                                  <div class="filter-categories-alt__children" data-collapse-content>
                                    <ul class="filter-categories-alt__list filter-categories-alt__list--level--2">
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Engravers</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Drills</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Wrenches</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Plumbing</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Wall Chaser</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Pneumatic Tools</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Milling Cutters</a></li>
                                    </ul>
                                  </div>
                                </li>
                                <li class="filter-categories-alt__item filter-categories-alt__item--open filter-categories-alt__item--current" data-collapse-item>
                                  <button class="filter-categories-alt__expander" data-collapse-trigger></button>
                                  <a href="#">Hand Tools</a>
                                  <div class="filter-categories-alt__children" data-collapse-content>
                                    <ul class="filter-categories-alt__list filter-categories-alt__list--level--2">
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Screwdrivers</a></li>
                                      <li class="filter-categories-alt__item filter-categories-alt__item--current" data-collapse-item>
                                        <button class="filter-categories-alt__expander" data-collapse-trigger></button>
                                        <a href="#">Handsaws</a>
                                        <div class="filter-categories-alt__children" data-collapse-content>
                                          <ul class="filter-categories-alt__list filter-categories-alt__list--level--3">
                                            <li class="filter-categories-alt__item" data-collapse-item><a href="#">Power Saws</a></li>
                                            <li class="filter-categories-alt__item" data-collapse-item><a href="#">Hacksaws</a></li>
                                            <li class="filter-categories-alt__item filter-categories-alt__item--current" data-collapse-item>
                                              <button class="filter-categories-alt__expander" data-collapse-trigger></button>
                                              <a href="#">Deep Dive</a>
                                              <div class="filter-categories-alt__children" data-collapse-content>
                                                <ul class="filter-categories-alt__list filter-categories-alt__list--level--4">
                                                  <li class="filter-categories-alt__item" data-collapse-item><a href="#">Submarines</a></li>
                                                  <li class="filter-categories-alt__item" data-collapse-item><a href="#">Silt In Bags</a></li>
                                                  <li class="filter-categories-alt__item" data-collapse-item><a href="#">Black Pearl</a></li>
                                                  <li class="filter-categories-alt__item" data-collapse-item><a href="#">Krakens</a></li>
                                                  <li class="filter-categories-alt__item" data-collapse-item><a href="#">Nautilus</a></li>
                                                  <li class="filter-categories-alt__item" data-collapse-item><a href="#">Mariana Trench</a></li>
                                                </ul>
                                              </div>
                                            </li>
                                            <li class="filter-categories-alt__item" data-collapse-item><a href="#">Chain Saws</a></li>
                                            <li class="filter-categories-alt__item" data-collapse-item><a href="#">Two-handed Saws</a></li>
                                            <li class="filter-categories-alt__item" data-collapse-item><a href="#">Other</a></li>
                                          </ul>
                                        </div>
                                      </li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Knives</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Axes</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Multitools</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Paint Tools</a></li>
                                    </ul>
                                  </div>
                                </li>
                                <li class="filter-categories-alt__item" data-collapse-item><a href="#">Measurement</a></li>
                                <li class="filter-categories-alt__item" data-collapse-item>
                                  <button class="filter-categories-alt__expander" data-collapse-trigger></button>
                                  <a href="#">Garden Equipment</a>
                                  <div class="filter-categories-alt__children" data-collapse-content>
                                    <ul class="filter-categories-alt__list filter-categories-alt__list--level--2">
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Motor Pumps</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Chainsaws</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Electric Saws</a></li>
                                      <li class="filter-categories-alt__item" data-collapse-item><a href="#">Brush Cutters</a></li>
                                    </ul>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Price
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-price" data-min="500" data-max="1500" data-from="590" data-to="1130">
                              <div class="filter-price__slider"></div>
                              <div class="filter-price__title">Price: $<span class="filter-price__min-value"></span> – $<span class="filter-price__max-value"></span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Brand
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-list">
                              <div class="filter-list__list">
                                <label class="filter-list__item"><span class="filter-list__input input-check"><span class="input-check__body">
                                  <input class="input-check__input" type="checkbox">
                                  <span class="input-check__box"></span>
                                  <svg class="input-check__icon" width="9px" height="7px">
                                    <use xlink:href="images/sprite.svg#check-9x7"></use>
                                  </svg>
                                  </span></span><span class="filter-list__title">Wakita </span><span class="filter-list__counter">7</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-check"><span class="input-check__body">
                                  <input class="input-check__input" type="checkbox" checked="checked">
                                  <span class="input-check__box"></span>
                                  <svg class="input-check__icon" width="9px" height="7px">
                                    <use xlink:href="images/sprite.svg#check-9x7"></use>
                                  </svg>
                                  </span></span><span class="filter-list__title">Zosch </span><span class="filter-list__counter">42</span></label>
                                <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-check"><span class="input-check__body">
                                  <input class="input-check__input" type="checkbox" checked="checked" disabled="disabled">
                                  <span class="input-check__box"></span>
                                  <svg class="input-check__icon" width="9px" height="7px">
                                    <use xlink:href="images/sprite.svg#check-9x7"></use>
                                  </svg>
                                  </span></span><span class="filter-list__title">WeVALT</span></label>
                                <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-check"><span class="input-check__body">
                                  <input class="input-check__input" type="checkbox" disabled="disabled">
                                  <span class="input-check__box"></span>
                                  <svg class="input-check__icon" width="9px" height="7px">
                                    <use xlink:href="images/sprite.svg#check-9x7"></use>
                                  </svg>
                                  </span></span><span class="filter-list__title">Hammer</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-check"><span class="input-check__body">
                                  <input class="input-check__input" type="checkbox">
                                  <span class="input-check__box"></span>
                                  <svg class="input-check__icon" width="9px" height="7px">
                                    <use xlink:href="images/sprite.svg#check-9x7"></use>
                                  </svg>
                                  </span></span><span class="filter-list__title">Mitasia </span><span class="filter-list__counter">1</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-check"><span class="input-check__body">
                                  <input class="input-check__input" type="checkbox">
                                  <span class="input-check__box"></span>
                                  <svg class="input-check__icon" width="9px" height="7px">
                                    <use xlink:href="images/sprite.svg#check-9x7"></use>
                                  </svg>
                                  </span></span><span class="filter-list__title">Metaggo </span><span class="filter-list__counter">25</span></label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Brand
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-list">
                              <div class="filter-list__list">
                                <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Wakita </span><span class="filter-list__counter">7</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Zosch </span><span class="filter-list__counter">42</span></label>
                                <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio" checked="checked" disabled="disabled">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">WeVALT</span></label>
                                <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio" disabled="disabled">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Hammer</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Mitasia </span><span class="filter-list__counter">1</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Metaggo </span><span class="filter-list__counter">25</span></label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Color
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-color">
                              <div class="filter-color__list">
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color input-check-color--white" style="color: #fff;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #d9d9d9;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #b3b3b3;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #808080;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #666;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #4d4d4d;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #262626;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #ff4040;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox" checked="checked">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #ff8126;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #ffd440;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #becc1f;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #8fcc14;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox" checked="checked">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #47cc5e;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #47cca0;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #47cccc;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #40bfff;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox" disabled="disabled">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #3d6dcc;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox" checked="checked">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #7766cc;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #b852cc;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #e53981;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-filters__actions d-flex">
                    <button class="btn btn-primary btn-sm">Filter</button>
                    <button class="btn btn-secondary btn-sm">Reset</button>
                  </div>
                </div>
              </div>
              <div class="block-sidebar__item d-none d-lg-block">
                <div class="widget-products widget">
                  <h4 class="widget__title">Latest Products</h4>
                  <div class="widget-products__list">
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-1.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
                        <div class="widget-products__prices">$749.00</div>
                      </div>
                    </div>
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-2.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>
                        <div class="widget-products__prices">$1,019.00</div>
                      </div>
                    </div>
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-3.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
                        <div class="widget-products__prices">$850.00</div>
                      </div>
                    </div>
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-4.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
                        <div class="widget-products__prices"><span class="widget-products__new-price">$949.00</span> <span class="widget-products__old-price">$1189.00</span></div>
                      </div>
                    </div>
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-5.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
                        <div class="widget-products__prices">$1,700.00</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- site__body / end --><!-- site__footer -->
  <footer class="site__footer">
    <div class="site-footer">
      <div class="container">
        <div class="site-footer__widgets">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
              <div class="site-footer__widget footer-contacts">
                <h5 class="footer-contacts__title">Contact Us</h5>
                <div class="footer-contacts__text">Shuwaikh Industrial Area,
				  2 Street 16 Khalifa Al Jassim Street Opposite Khalifa Al Jassim Building Kuwait</div>
                <ul class="footer-contacts__contacts">
	                  <li><i class="footer-contacts__icon far fa-envelope"></i> info@shujatrading.com</li>
                  <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> +965 98835782</li>
                </ul>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4">
              <div class="site-footer__widget footer-links">
                <h5 class="footer-links__title">Information</h5>
                <ul class="footer-links__list">
                  <li class="footer-links__item"><a href="#" class="footer-links__link">About Us</a></li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Terms & Conditions</a></li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy Policy</a></li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Brands</a></li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Contact Us</a></li>
                </ul>
              </div>
            </div>

            <div class="col-12 col-md-12 col-lg-4">
              <div class="site-footer__widget footer-newsletter">
                <h5 class="footer-newsletter__title">Subscribe to us</h5>
                <div class="footer-newsletter__text">Praesent pellentesque volutpat ex, vitae auctor lorem pulvinar mollis felis at lacinia.</div>
                <form action="#" class="footer-newsletter__form">
                  <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                  <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address" placeholder="Email Address...">
                  <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                </form>
                <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on social networks</div>
                <!-- social-links -->
                <div class="social-links footer-newsletter__social-links social-links--shape--circle">
                  <ul class="social-links__list">

                    <li class="social-links__item"><a class="social-links__link social-links__link--type--youtube" href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <li class="social-links__item"><a class="social-links__link social-links__link--type--facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="social-links__item"><a class="social-links__link social-links__link--type--twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="social-links__item"><a class="social-links__link social-links__link--type--instagram" href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                </div>
                <!-- social-links / end --></div>
            </div>
          </div>
        </div>
        <div class="site-footer__bottom">
          <div class="site-footer__copyright"><!-- copyright --> All Right Reserved, Copyright 2020
			 <!-- copyright / end --></div>
          <div class="site-footer__payments"><img src="images/payments.png" alt=""></div>
        </div>
      </div>
      <div class="totop">
        <div class="totop__body">
          <div class="totop__start"></div>
          <div class="totop__container container"></div>
          <div class="totop__end">
            <button type="button" class="totop__button">
            <i class="fa fa-chevron-up text-dark"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- site__footer / end --></div>
<!-- site / end --><!-- quickview-modal -->
<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content"></div>
  </div>
</div>
<!-- quickview-modal / end --><!-- mobilemenu -->
<div class="mobilemenu">
  <div class="mobilemenu__backdrop"></div>
  <div class="mobilemenu__body">
    <div class="mobilemenu__header">
      <div class="mobilemenu__title">Menu</div>
      <button type="button" class="mobilemenu__close">
      <svg width="20px" height="20px">
        <use xlink:href="images/sprite.svg#cross-20"></use>
      </svg>
      </button>
    </div>
    <div class="mobilemenu__content">
      <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="index.blade.php" class="mobile-links__item-link">Home</a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
            <svg class="mobile-links__item-arrow" width="12px" height="7px">
              <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
            </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="index.blade.php" class="mobile-links__item-link">Home 1</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="index-2.html" class="mobile-links__item-link">Home 2</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="index-3.html" class="mobile-links__item-link">Home 1 Finder</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="index-4.html" class="mobile-links__item-link">Home 2 Finder</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="offcanvas-cart.html" class="mobile-links__item-link">Offcanvas Cart</a></div>
              </li>
            </ul>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Categories</a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
            <svg class="mobile-links__item-arrow" width="12px" height="7px">
              <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
            </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Power Tools</a>
                  <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                  <svg class="mobile-links__item-arrow" width="12px" height="7px">
                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                  </svg>
                  </button>
                </div>
                <div class="mobile-links__item-sub-links" data-collapse-content>
                  <ul class="mobile-links mobile-links--level--2">
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Engravers</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Wrenches</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Wall Chaser</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pneumatic Tools</a></div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Machine Tools</a>
                  <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                  <svg class="mobile-links__item-arrow" width="12px" height="7px">
                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                  </svg>
                  </button>
                </div>
                <div class="mobile-links__item-sub-links" data-collapse-content>
                  <ul class="mobile-links mobile-links--level--2">
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Thread Cutting</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Chip Blowers</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Sharpening Machines</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pipe Cutters</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Slotting machines</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Lathes</a></div>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop</a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
            <svg class="mobile-links__item-arrow" width="12px" height="7px">
              <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
            </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop Grid</a>
                  <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                  <svg class="mobile-links__item-arrow" width="12px" height="7px">
                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                  </svg>
                  </button>
                </div>
                <div class="mobile-links__item-sub-links" data-collapse-content>
                  <ul class="mobile-links mobile-links--level--2">
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">3 Columns Sidebar</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="shop-grid-4-columns-full.html" class="mobile-links__item-link">4 Columns Full</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="shop-grid-5-columns-full.html" class="mobile-links__item-link">5 Columns Full</a></div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="shop-list.html" class="mobile-links__item-link">Shop List</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="shop-right-sidebar.html" class="mobile-links__item-link">Shop Right Sidebar</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="product.html" class="mobile-links__item-link">Product</a>
                  <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                  <svg class="mobile-links__item-arrow" width="12px" height="7px">
                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                  </svg>
                  </button>
                </div>
                <div class="mobile-links__item-sub-links" data-collapse-content>
                  <ul class="mobile-links mobile-links--level--2">
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="product.html" class="mobile-links__item-link">Product</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="product-alt.html" class="mobile-links__item-link">Product Alt</a></div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                      <div class="mobile-links__item-title"><a href="product-sidebar.html" class="mobile-links__item-link">Product Sidebar</a></div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="cart.html" class="mobile-links__item-link">Cart</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="cart-empty.html" class="mobile-links__item-link">Cart Empty</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="checkout.html" class="mobile-links__item-link">Checkout</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="order-success.html" class="mobile-links__item-link">Order Success</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="wishlist.html" class="mobile-links__item-link">Wishlist</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="compare.html" class="mobile-links__item-link">Compare</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="track-order.html" class="mobile-links__item-link">Track Order</a></div>
              </li>
            </ul>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="account-login.html" class="mobile-links__item-link">Account</a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
            <svg class="mobile-links__item-arrow" width="12px" height="7px">
              <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
            </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="account-login.html" class="mobile-links__item-link">Login</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="account-dashboard.html" class="mobile-links__item-link">Dashboard</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="account-profile.html" class="mobile-links__item-link">Edit Profile</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="account-orders.html" class="mobile-links__item-link">Order History</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="account-order-details.html" class="mobile-links__item-link">Order Details</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="account-addresses.html" class="mobile-links__item-link">Address Book</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="account-edit-address.html" class="mobile-links__item-link">Edit Address</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="account-password.html" class="mobile-links__item-link">Change Password</a></div>
              </li>
            </ul>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Blog</a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
            <svg class="mobile-links__item-arrow" width="12px" height="7px">
              <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
            </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Blog Classic</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="blog-grid.html" class="mobile-links__item-link">Blog Grid</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="blog-list.html" class="mobile-links__item-link">Blog List</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="blog-left-sidebar.html" class="mobile-links__item-link">Blog Left Sidebar</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="post.html" class="mobile-links__item-link">Post Page</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="post-without-sidebar.html" class="mobile-links__item-link">Post Without Sidebar</a></div>
              </li>
            </ul>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pages</a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
            <svg class="mobile-links__item-arrow" width="12px" height="7px">
              <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
            </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="about-us.html" class="mobile-links__item-link">About Us</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="contact-us.html" class="mobile-links__item-link">Contact Us</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="contact-us-alt.html" class="mobile-links__item-link">Contact Us Alt</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="404.html" class="mobile-links__item-link">404</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="terms-and-conditions.html" class="mobile-links__item-link">Terms And Conditions</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="faq.html" class="mobile-links__item-link">FAQ</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="components.html" class="mobile-links__item-link">Components</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="typography.html" class="mobile-links__item-link">Typography</a></div>
              </li>
            </ul>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a data-collapse-trigger class="mobile-links__item-link">Currency</a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
            <svg class="mobile-links__item-arrow" width="12px" height="7px">
              <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
            </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">€ Euro</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">£ Pound Sterling</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">$ US Dollar</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">₽ Russian Ruble</a></div>
              </li>
            </ul>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a data-collapse-trigger class="mobile-links__item-link">Language</a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
            <svg class="mobile-links__item-arrow" width="12px" height="7px">
              <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
            </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">English</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">French</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">German</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Russian</a></div>
              </li>
              <li class="mobile-links__item" data-collapse-item>
                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Italian</a></div>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- mobilemenu / end --><!-- photoswipe -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>
<!-- photoswipe / end --><!-- js --><script src="vendor/jquery/jquery.min.js"></script><script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script src="vendor/owl-carousel/owl.carousel.min.js"></script><script src="vendor/nouislider/nouislider.min.js"></script><script src="vendor/photoswipe/photoswipe.min.js"></script><script src="vendor/photoswipe/photoswipe-ui-default.min.js"></script><script src="vendor/select2/js/select2.min.js"></script><script src="js/number.js"></script><script src="js/main.js"></script><script src="js/header.js"></script><script src="vendor/svg4everybody/svg4everybody.min.js"></script><script>svg4everybody();</script>
</body>
</html>
