<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="StepStyle - Premium Footwear" />
    <meta name="keywords" content="footwear, shoes, sneakers, premium, style" />
    <meta name="author" content="StepStyle" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="google" content="notranslate" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="icon" href="{{ asset('/frontend/images/logo.png') }}" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>StepStyle - Premium Footwear</title>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{asset('/frontend/images/logo.png')}}" class="w-50"/></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link position-relative" href="#" id="cart-toggle">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-badge">0</span>
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Step Into Style</h1>
                    <p class="lead mb-4">
                        Discover premium footwear for every occasion with our exclusive
                        collection. Quality, comfort, and style in every step.
                    </p>
                    <a href="#products" class="btn btn-primary me-3">Shop Now</a>
                    <a href="#about" class="btn btn-outline-light">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3>Free Shipping</h3>
                        <p>
                            Enjoy free shipping on all orders over $100. Fast delivery to
                            your doorstep.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <h3>Easy Returns</h3>
                        <p>
                            Not satisfied? Return within 30 days for a full refund, no
                            questions asked.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-bitcoin"></i>
                        </div>
                        <h3>Crypto Payments</h3>
                        <p>
                            Shop with convenience using Bitcoin, Ethereum, and other
                            cryptocurrencies.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products" id="products">
        <div class="container">
            <div class="section-title">
                <h2>Featured Products</h2>
                <p>Explore our curated collection of premium footwear</p>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                    <div class="product-card" data-id="{{ $product->id }}">
                        <div class="product-img">
                            <img src="{{asset($product->image_url)}}" alt="{{$product->title}}" />
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">{{$product->title}}</h5>
                            <div class="product-price">{{$product->price}}</div>
                            <div class="crypto-price">≈ {{$product->btc_price}} BTC</div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-2">(4.5)</span>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn btn-sm btn-primary quick-view-btn" data-id="{{$product->id}}">Quick View</button>
                                <button class="btn btn-sm btn-secondary add-to-cart-btn" data-id="{{$product->id}}">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
                <!-- Product items will be dynamically loaded here -->
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img
                        src="/frontend/images/card-1.jpg"
                        alt="About Us"
                        class="img-fluid rounded" />
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4">About StepStyle</h2>
                    <p>
                        Founded in 2020, StepStyle has quickly become a leading
                        destination for premium footwear enthusiasts. We pride ourselves
                        on offering a carefully curated selection of the finest shoes from
                        around the world.
                    </p>
                    <p>
                        Our mission is to provide exceptional quality, unmatched comfort,
                        and cutting-edge style. We believe that every step should be taken
                        in confidence and comfort.
                    </p>
                    <p>
                        As an innovative retailer, we've embraced cryptocurrency payments,
                        allowing our customers to shop using their preferred digital
                        assets with complete security and convenience.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">Subscribe to Our Newsletter</h2>
                    <p class="mb-4">
                        Stay updated with our latest arrivals, exclusive offers, and
                        promotional discounts.
                    </p>
                    <div class="input-group mb-3">
                        <input
                            type="email"
                            class="form-control"
                            placeholder="Enter your email"
                            aria-label="Email"
                            aria-describedby="subscribe-btn" />
                        <button class="btn btn-primary" type="button" id="subscribe-btn">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>We'd love to hear from you</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <form>
                        <div class="mb-3">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Your Name" />
                        </div>
                        <div class="mb-3">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Your Email" />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Subject" />
                        </div>
                        <div class="mb-3">
                            <textarea
                                class="form-control"
                                rows="5"
                                placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Send Message
                        </button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <div class="mb-4">
                            <h4>Our Location</h4>
                            <p>
                                <i class="fas fa-map-marker-alt me-2"></i> 123 Fashion Street,
                                New York, NY 10001
                            </p>
                        </div>
                        <div class="mb-4">
                            <h4>Email Us</h4>
                            <p><i class="fas fa-envelope me-2"></i> info@stepstyle.com</p>
                        </div>
                        <div class="mb-4">
                            <h4>Call Us</h4>
                            <p><i class="fas fa-phone me-2"></i> +1 (555) 123-4567</p>
                        </div>
                        <div>
                            <h4>Follow Us</h4>
                            <div class="social-icons">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">StepStyle</h5>
                    <p>
                        Premium footwear for every step of your journey. Quality, comfort,
                        and style combined.
                    </p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Quick Links</h5>
                    <div class="footer-links">
                        <a href="#">Home</a>
                        <a href="#products">Shop</a>
                        <a href="#about">About Us</a>
                        <a href="#contact">Contact</a>
                        <a href="#">Blog</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Customer Service</h5>
                    <div class="footer-links">
                        <a href="#">My Account</a>
                        <a href="#">Order Tracking</a>
                        <a href="#">Wishlist</a>
                        <a href="#">Returns & Exchanges</a>
                        <a href="#">FAQ</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Payment Methods</h5>
                    <p>We accept the following payment methods:</p>
                    <div class="payment-icons d-flex flex-wrap">
                        <img src="/frontend/images/icons/visa.png" alt="Visa" class="me-2 mb-2" width="36" />
                        <img
                            src="/frontend/images/icons/mastercard.png" width="36"
                            alt="Mastercard"
                            class="me-2 mb-2" />
                        <img
                            src="/frontend/images/icons/paypal.png" width="36"
                            alt="PayPal"
                            class="me-2 mb-2" />
                        <img
                            src="/frontend/images/icons/bitcoin.png" width="36"
                            alt="Bitcoin"
                            class="me-2 mb-2" />
                        <img
                            src="/frontend/images/icons/ethereum.png" width="36"
                            alt="Ethereum"
                            class="me-2 mb-2" />
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                <p class="mb-0">© 2025 StepStyle. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Cart Sidebar -->
    <div id="cart-sidebar">
        <div class="cart-header">
            <h5 class="mb-0">Your Cart</h5>
            <i class="fas fa-times" id="close-cart"></i>
        </div>
        <div class="cart-items" id="cart-items-container">
            <!-- Cart items will be added here dynamically -->
        </div>
        <div class="cart-total">
            <div class="cart-total-item">
                <span>Subtotal</span>
                <span id="cart-subtotal">$0.00</span>
            </div>
            <div class="cart-total-item">
                <span>Shipping</span>
                <span>$0.00</span>
            </div>
            <div class="cart-total-item total">
                <span>Total</span>
                <span id="cart-total">$0.00</span>
            </div>
        </div>
        <div class="checkout-options">
            <h5 class="mb-3">Payment Method</h5>
            <div class="payment-option">
                <input
                    type="radio"
                    id="card-payment"
                    name="payment"
                    value="card"
                    checked />
                <label for="card-payment">Credit/Debit Card</label>
            </div>
            <div class="payment-option">
                <input
                    type="radio"
                    id="crypto-payment"
                    name="payment"
                    value="crypto" />
                <label for="crypto-payment">Cryptocurrency</label>
            </div>
            <div class="crypto-payment" id="crypto-options" style="display: none">
                <h6 class="mb-3">Select Cryptocurrency</h6>
                <div class="crypto-option">
                    <input
                        type="radio"
                        id="bitcoin"
                        name="crypto"
                        value="bitcoin"
                        checked />
                    <img
                        src="{{ asset('/frontend/images/icons/bitcoin.png') }}"
                        alt="Bitcoin"
                        class="crypto-icon" />
                    <label for="bitcoin">Bitcoin (BTC)</label>
                </div>
                <div class="crypto-option">
                    <input type="radio" id="ethereum" name="crypto" value="ethereum" />
                    <img
                        src="{{ asset('/frontend/images/icons/ethereum.png') }}"
                        alt="Ethereum"
                        class="crypto-icon" />
                    <label for="ethereum">Ethereum (ETH)</label>
                </div>

                <div class="crypto-option">
                    <input type="radio" id="litecoin" name="crypto" value="litecoin" />
                    <img
                        src="{{ asset('/frontend/images/icons/litecoin.png') }}"
                        alt="Litecoin"
                        class="crypto-icon" />
                    <label for="litecoin">Litecoin (LTC)</label>
                </div>
                <button class="btn btn-primary w-100 mt-4" id="checkout-btn">
                    Proceed to Checkout
                </button>
            </div>
        </div>

        <!-- Overlay -->
        <div id="overlay"></div>

        <!-- Quick View Modal -->
        <div class="quick-view-modal" id="quick-view-modal">
            <span class="modal-close" id="close-modal">&times;</span>
            <div class="modal-content">
                <div class="modal-img">
                    <img
                        src="/api/placeholder/400/400"
                        alt="Product"
                        id="modal-product-img" />
                </div>
                <div class="modal-info">
                    <h3 id="modal-product-title">Product Title</h3>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="ms-2">(4.5)</span>
                    </div>
                    <div class="modal-price" id="modal-product-price">$149.99</div>
                    <p class="modal-description" id="modal-product-description">
                        Premium quality sneakers designed for comfort and style. Perfect for
                        casual wear and light athletic activities.
                    </p>


                    <div class="quantity-selector">
                        <h5>Quantity:</h5>
                        <div class="d-flex align-items-center ms-3">
                            <div class="quantity-btn" id="decrease-quantity">-</div>
                            <input
                                type="text"
                                class="quantity-input"
                                id="quantity"
                                value="1"
                                readonly />
                            <div class="quantity-btn" id="increase-quantity">+</div>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-4" id="add-to-cart-modal">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Crypto Payment Modal -->
        <div class="crypto-modal" id="crypto-payment-modal">
            <h4 class="text-center mb-4">Complete Your Cryptocurrency Payment</h4>
            <div class="wallet-address" id="wallet-address">
                3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5
            </div>
            <div class="qr-code-container d-flex justify-content-center">
                <canvas id="qr-code-canvas"></canvas>
            </div>
            <div class="timer">
                Payment expires in: <span id="payment-timer">15:00</span>
            </div>
            <p class="text-center mb-4">
                Please send the exact amount of
                <span id="crypto-amount">0.0042 BTC</span> to the address above.
            </p>
            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary" id="cancel-payment">Cancel</button>
                <button class="btn btn-primary" id="confirm-payment">
                    I've Completed Payment
                </button>
            </div>
        </div>

        <!-- Bootstrap & JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/frontend/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>

</body>

</html>