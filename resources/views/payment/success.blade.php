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
            <a class="navbar-brand" href="#"><img src="{{asset('/frontend/images/logo.png')}}" class="w-25 h-25" /></a>
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

    <div class="container">
        <div class="page success-page">
            <div class="icon success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <h1>Payment Successful!</h1>
            <p>Thank you for your purchase. Your transaction has been completed successfully.</p>

            <div class="order-details">
                <h3 style="margin-bottom: 15px;">Order Details</h3>

                <div class="detail-row">
                    <span>Date:</span>
                    <span><?php echo date('l jS \of F Y h:i:s A'); ?></span>
                </div>

            </div>

            <p>A confirmation email has been sent to your registered email address.</p>

            <div style="margin-top: 30px;">

                <a href="/" class="button tertiary" style="margin-left: 10px;">Continue Shopping</a>
            </div>
        </div>
    </div>

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

    <!-- Bootstrap & JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/frontend/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
    <script src="https://commerce.coinbase.com/v1/checkout.js"></script>


</body>

</html>