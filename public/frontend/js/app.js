// Sample product data

// Cart
let cart = [];
let currentProduct = null;

// DOM Elements
const productContainer = document.getElementById("product-container");
const cartToggle = document.getElementById("cart-toggle");
const closeCart = document.getElementById("close-cart");
const cartSidebar = document.getElementById("cart-sidebar");
const overlay = document.getElementById("overlay");
const cartItemsContainer = document.getElementById("cart-items-container");
const cartSubtotal = document.getElementById("cart-subtotal");
const cartTotal = document.getElementById("cart-total");
const cartBadge = document.querySelector(".cart-badge");
const quickViewModal = document.getElementById("quick-view-modal");
const closeModal = document.getElementById("close-modal");
const modalProductImg = document.getElementById("modal-product-img");
const modalProductTitle = document.getElementById("modal-product-title");
const modalProductPrice = document.getElementById("modal-product-price");
const modalProductDescription = document.getElementById(
    "modal-product-description"
);
const addToCartModal = document.getElementById("add-to-cart-modal");
const decreaseQuantity = document.getElementById("decrease-quantity");
const increaseQuantity = document.getElementById("increase-quantity");
const quantityInput = document.getElementById("quantity");
const cryptoPaymentRadio = document.getElementById("crypto-payment");
const cardPaymentRadio = document.getElementById("card-payment");
const cryptoOptions = document.getElementById("crypto-options");
const checkoutBtn = document.getElementById("checkout-btn");
const cryptoPaymentModal = document.getElementById("crypto-payment-modal");
const walletAddress = document.getElementById("wallet-address");
const cryptoAmount = document.getElementById("crypto-amount");
const paymentTimer = document.getElementById("payment-timer");
const cancelPayment = document.getElementById("cancel-payment");
const confirmPayment = document.getElementById("confirm-payment");

// Load products

// Add event listeners using event delegation
document.addEventListener("click", function (e) {
    // Quick view button
    if (e.target.closest(".quick-view-btn")) {
        const btn = e.target.closest(".quick-view-btn");
        const productId = parseInt(btn.getAttribute("data-id"));

        openQuickView(productId);
    }

    // Add to cart button
    if (e.target.closest(".add-to-cart-btn")) {
        const btn = e.target.closest(".add-to-cart-btn");
        const productId = parseInt(btn.getAttribute("data-id"));
        addToCart(productId, 1);
    }
});
// Generate rating stars
function getRatingStars(rating) {
    let stars = "";
    const fullStars = Math.floor(rating);
    const halfStar = rating % 1 >= 0.5;

    for (let i = 0; i < fullStars; i++) {
        stars += '<i class="fas fa-star"></i>';
    }

    if (halfStar) {
        stars += '<i class="fas fa-star-half-alt"></i>';
    }

    const emptyStars = 5 - fullStars - (halfStar ? 1 : 0);
    for (let i = 0; i < emptyStars; i++) {
        stars += '<i class="far fa-star"></i>';
    }

    return stars;
}
function getProductData(productId) {
    const productElement = document.querySelector(
        `.product-card[data-id="${productId}"]`
    );
    if (!productElement) return null;

    return {
        id: parseInt(productId),
        title: productElement.querySelector(".product-title").textContent,
        price: parseFloat(
            productElement
                .querySelector(".product-price")
                .textContent.replace(/[^0-9.]/g, "")
        ),
        btc: parseFloat(
            productElement
                .querySelector(".crypto-price")
                .textContent.match(/[\d.]+/)[0]
        ),
        image: productElement.querySelector(".product-img img").src,
        rating: 4.5, // You can add this as a data attribute if needed
        description: "Premium quality product", // You can add this as a data attribute
    };
}
// Open quick view modal
function openQuickView(productId) {
    const product = getProductData(productId);
    console.log(product);
    if (!product) return;

    currentProduct = product;

    modalProductImg.src = product.image;
    modalProductTitle.textContent = product.title;
    modalProductPrice.textContent = `$${product.price.toFixed(2)}`;
    modalProductDescription.textContent = product.description;

    quickViewModal.classList.add("active");
    overlay.classList.add("active");

    quantityInput.value = "1";
}

// Close quick view modal
function closeQuickView() {
    quickViewModal.classList.remove("active");
    overlay.classList.remove("active");
    currentProduct = null;
}

// Add to cart
function addToCart(productId, quantity) {
    const product = getProductData(productId);
    if (!product) return;

    // Check if product already in cart
    const existingItem = cart.find((item) => item.product.id === productId);

    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({
            product: product,
            quantity: quantity,
        });
    }

    updateCart();

    // Show notification
    alert(`${product.title} added to cart!`);

    // Close modal if open
    if (quickViewModal.classList.contains("active")) {
        closeQuickView();
    }
}

// Update cart
function updateCart() {
    cartItemsContainer.innerHTML = "";

    if (cart.length === 0) {
        cartItemsContainer.innerHTML =
            '<p class="text-center py-4">Your cart is empty.</p>';
        cartBadge.textContent = "0";
        cartSubtotal.textContent = "$0.00";
        cartTotal.textContent = "$0.00";
        return;
    }

    let totalItems = 0;
    let subtotal = 0;

    cart.forEach((item) => {
        const cartItem = document.createElement("div");
        cartItem.className = "cart-item";
        cartItem.innerHTML = `
    <div class="cart-item-img">
        <img src="${item.product.image}" alt="${item.product.title}">
    </div>
    <div class="cart-item-details">
        <h6 class="cart-item-title">${item.product.title}</h6>
        <div class="cart-item-price">$${item.product.price.toFixed(2)}</div>
        <div class="d-flex align-items-center mt-2">
            <span>Qty: ${item.quantity}</span>
        </div>
    </div>
    <div class="cart-item-remove" data-id="${item.product.id}">
        <i class="fas fa-trash-alt"></i>
    </div>
`;
        cartItemsContainer.appendChild(cartItem);

        totalItems += item.quantity;
        subtotal += item.product.price * item.quantity;
    });

    // Add event listeners to remove buttons
    document.querySelectorAll(".cart-item-remove").forEach((btn) => {
        btn.addEventListener("click", function () {
            const productId = parseInt(this.getAttribute("data-id"));
            removeFromCart(productId);
        });
    });

    cartBadge.textContent = totalItems;
    cartSubtotal.textContent = `$${subtotal.toFixed(2)}`;
    cartTotal.textContent = `$${subtotal.toFixed(2)}`;
}

// Remove from cart
function removeFromCart(productId) {
    cart = cart.filter((item) => item.product.id !== productId);
    updateCart();
}

// Toggle cart sidebar
function toggleCart() {
    cartSidebar.classList.toggle("active");
    // overlay.classList.toggle("active");
}

// Start payment timer
function startPaymentTimer() {
    let timeLeft = 15 * 60; // 15 minutes in seconds

    const timerInterval = setInterval(() => {
        timeLeft--;

        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;

        paymentTimer.textContent = `${minutes}:${
            seconds < 10 ? "0" : ""
        }${seconds}`;

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            alert("Payment time expired. Please try again.");
            closeCryptoPayment();
        }
    }, 1000);

    // Store interval ID to clear it when modal is closed
    paymentTimer.dataset.intervalId = timerInterval;
}

// Open crypto payment modal
function openCryptoPayment() {
    // Get selected crypto
    const selectedCrypto = document.querySelector(
        'input[name="crypto"]:checked'
    ).value;

    // Calculate total in crypto
    const total = parseFloat(cartTotal.textContent.replace("$", ""));
    let cryptoValue;

    switch (selectedCrypto) {
        case "bitcoin":
            cryptoValue = total * 0.000028; // Example conversion rate
            cryptoAmount.textContent = `${cryptoValue.toFixed(6)} BTC`;
            break;
        case "ethereum":
            cryptoValue = total * 0.00045; // Example conversion rate
            cryptoAmount.textContent = `${cryptoValue.toFixed(6)} ETH`;
            break;
        case "litecoin":
            cryptoValue = total * 0.0097; // Example conversion rate
            cryptoAmount.textContent = `${cryptoValue.toFixed(6)} LTC`;
            break;
        case "ripple":
            cryptoValue = total * 0.81; // Example conversion rate
            cryptoAmount.textContent = `${cryptoValue.toFixed(2)} XRP`;
            break;
    }

    // Generate random wallet address
    const characters =
        "123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz";
    let address = "";
    for (let i = 0; i < 34; i++) {
        address += characters.charAt(
            Math.floor(Math.random() * characters.length)
        );
    }
    walletAddress.textContent = address;

    // Generate payment URI based on cryptocurrency
    let paymentUri;
    switch (selectedCrypto) {
        case "bitcoin":
            paymentUri = `bitcoin:${address}?amount=${cryptoValue}`;
            break;
        case "ethereum":
            paymentUri = `ethereum:${address}?value=${cryptoValue * 1e18}`;
            break;
        case "litecoin":
            paymentUri = `litecoin:${address}?amount=${cryptoValue}`;
            break;
        case "ripple":
            paymentUri = `ripple:${address}?amount=${cryptoValue}`;
            break;
        default:
            paymentUri = address;
    }

    // Generate QR code
    const canvas = document.getElementById("qr-code-canvas");
    const ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Generate new QR code
    QRCode.toCanvas(
        canvas,
        paymentUri,
        {
            width: 200,
            margin: 2,
            color: {
                dark: "#000000",
                light: "#ffffff",
            },
        },
        function (error) {
            if (error) {
                console.error("QR Code generation error:", error);
                // Fallback: Show the address as text if QR fails
                document.getElementById(
                    "qr-code-container"
                ).textContent = `Send ${cryptoAmount.textContent} to: ${address}`;
            }
        }
    );

    cryptoPaymentModal.classList.add("active");
    overlay.classList.add("active");

    // Start payment timer
    startPaymentTimer();
}

// Close crypto payment modal
function closeCryptoPayment() {
    cryptoPaymentModal.classList.remove("active");
    overlay.classList.remove("active");
    // Clear timer interval
    if (paymentTimer.dataset.intervalId) {
        clearInterval(parseInt(paymentTimer.dataset.intervalId));
    }
}

// Event Listeners
document.addEventListener("DOMContentLoaded", function () {
    cartToggle.addEventListener("click", function (e) {
        e.preventDefault();
        toggleCart();
    });

    closeCart.addEventListener("click", toggleCart);

    overlay.addEventListener("click", function () {
        if (cartSidebar.classList.contains("active")) {
            toggleCart();
        }
        if (quickViewModal.classList.contains("active")) {
            closeQuickView();
        }
        if (cryptoPaymentModal.classList.contains("active")) {
            closeCryptoPayment();
        }
    });

    closeModal.addEventListener("click", closeQuickView);

    addToCartModal.addEventListener("click", function () {
        if (currentProduct) {
            const quantity = parseInt(quantityInput.value);
            addToCart(currentProduct.id, quantity);
        }
    });

    decreaseQuantity.addEventListener("click", function () {
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    });

    increaseQuantity.addEventListener("click", function () {
        let quantity = parseInt(quantityInput.value);
        quantityInput.value = quantity + 1;
    });

    cryptoPaymentRadio.addEventListener("change", function () {
        if (this.checked) {
            cryptoOptions.style.display = "block";
        }
    });

    cardPaymentRadio.addEventListener("change", function () {
        if (this.checked) {
            cryptoOptions.style.display = "none";
        }
    });

    checkoutBtn.addEventListener("click", function () {
        const paymentMethod = document.querySelector(
            'input[name="payment"]:checked'
        ).value;

        if (paymentMethod === "crypto") {
            openCryptoPayment();
        } else {
            alert("Redirecting to card payment gateway...");
            // In a real implementation, you would redirect to your payment processor
        }
    });

    cancelPayment.addEventListener("click", function () {
        closeCryptoPayment();
    });

    confirmPayment.addEventListener("click", function () {
        alert("Thank you for your payment! Your order has been confirmed.");
        closeCryptoPayment();
        cart = [];
        updateCart();
        toggleCart();
    });

    // Size options
    document.querySelectorAll(".size-option").forEach((option) => {
        option.addEventListener("click", function () {
            document.querySelectorAll(".size-option").forEach((opt) => {
                opt.classList.remove("active");
            });
            this.classList.add("active");
        });
    });

    // Color options
    document.querySelectorAll(".color-option").forEach((option) => {
        option.addEventListener("click", function () {
            document.querySelectorAll(".color-option").forEach((opt) => {
                opt.style.transform = "scale(1)";
            });
            this.style.transform = "scale(1.2)";
        });
    });
});
