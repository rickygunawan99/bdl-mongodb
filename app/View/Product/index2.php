<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- title -->
    <title>Shop</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>

<!--PreLoader-->
<!--<div class="loader">-->
<!--    <div class="loader-inner">-->
<!--        <div class="circle"></div>-->
<!--    </div>-->
<!--</div>-->
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker" style="background: black">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="index.html">
<!--                            <img src="assets/img/logo.png" alt="">-->
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item"><a href="#">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Static Home</a></li>
                                    <li><a href="index_2.html">Slider Home</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="404.html">404 page</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </li>
                            <li><a href="news.html">News</a>
                                <ul class="sub-menu">
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="single-news.html">Single News</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="shop.html">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="mobile-hide search-bar-icon" href="/checkout">Checkout</a>
<!--                                    <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>-->
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input type="text" placeholder="...">
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search arewa -->

<!-- breadcrumb-section -->
<!--<div class="breadcrumb-section breadcrumb-bg">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-8 offset-lg-2 text-center">-->
<!--                <div class="breadcrumb-text">-->
<!--                    <p>Fresh and Organic</p>-->
<!--                    <h1>Shop</h1>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <?php foreach ( $model['categories'] as $category): ?>
                            <li data-filter=".<?=$category?>"><?= $category ?></li>
                        <?php endforeach; ?>
<!--                        <li data-filter=".berry">Berry</li>-->
<!--                        <li data-filter=".lemon">Lemon</li>-->
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            <?php foreach ($model['products'] as $product): ?>
                <div class="col-lg-4 col-md-6 text-center <?= $product['category'] ?>">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
                        </div>
                        <h3><?= $product['name'] ?></h3>
    <!--                    <p class="product-price"><span>Per Kg</span> 85$ </p>-->
                        <p class="price product-price" id="price-<?=$product['id']?>" data-price="<?=$product['price']?>">
                            <?= $product['price'] ?>
                        </p>
                        <p style="font-size: smaller; color: blue"><?=$product['qty']?> tersedia</p>
                        <div class="input-group d-flex justify-content-center">
                            <input type="button" value="-" name="<?=$product['id']?>" class="btnDec btn btn-outline-secondary border border-opacity-10">
                            <input type="text" name="item_id" value=<?= $product['order_qty'] ?? 0 ?>
                            id="qty-<?= $product['id']?>" class="text-center border border-opacity-20" style="width: 2.5em" disabled>
                            <input type="button" value="+"  name="<?=$product['id']?>" class="btnInc btn btn-outline-secondary border border-opacity-10">
                        </div>
    <!--                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>-->
                    </div>
                </div>
            <?php endforeach; ?>`
        </div>

<!--        <nav class="navbar fixed-bottom bg-success border rounded-pill w-25 mx-auto">-->
<!--            <div class="container">-->
<!--                <div class="navbar-brand fw-bold" style="color: white">Checkout</div>-->
<!--                <div class="navbar-brand fw-bold" style="color: white" id="total" data-total="--><?//= $model['total'] ?><!--">-->
<!--                    --><?//= $model['total'] ?>
<!--                </div>-->
<!--            </div>-->
<!--        </nav>-->


<!--        <div class="row">-->
<!--            <div class="col-lg-12 text-center">-->
<!--                <div class="pagination-wrap">-->
<!--                    <ul>-->
<!--                        <li><a href="#">Prev</a></li>-->
<!--                        <li><a href="#">1</a></li>-->
<!--                        <li><a class="active" href="#">2</a></li>-->
<!--                        <li><a href="#">3</a></li>-->
<!--                        <li><a href="#">Next</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>
<!-- end products -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->

<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About us</h2>
                    <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Get in Touch</h2>
                    <ul>
                        <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                        <li>support@fruitkha.com</li>
                        <li>+00 111 222 3333</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Pages</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="services.html">Shop</a></li>
                        <li><a href="news.html">News</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Subscribe</h2>
                    <p>Subscribe to our mailing list to get the latest updates.</p>
                    <form action="index.html">
                        <input type="email" placeholder="Email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
                    Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                </p>
            </div>
            <div class="col-lg-6 text-right col-md-12">
                <div class="social-icons">
                    <ul>
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end copyright -->

<!--script js-->
<script>
    const incButtons = document.querySelectorAll(".input-group .btnInc");

    for (const incButton of incButtons) {
        incButton.onclick = function (){
            const id = incButton.name;
            let qty = Number(document.getElementById(`qty-${id}`).value);
            qty++;
            document.getElementById(`qty-${id}`).value = qty;
            updateItem(Number(id), "inc-prod");
            const elTotal = document.getElementById('total');
            const result = parseInt(elTotal.dataset.total)  + parseInt(document.getElementById('price-'+id).dataset.price);
            document.getElementById('total').dataset.total = result;
            document.getElementById('total').textContent = result;
            document.getElementById(`qty-${id}`).value = qty;
        }
    }

    const decButtons = document.querySelectorAll(".input-group .btnDec");

    for (const decButton of decButtons) {
        decButton.onclick = function (){
            const id = decButton.name;
            let qty = Number(document.getElementById(`qty-${id}`).value);
            let check = 1;

            if(qty - 1 === 0){
                updateItem(id, 'del-prod');
                qty = 0;
            }else if (qty - 1 < 0 ){
                qty = 0
                check = 0;
            }else {
                qty --;
                updateItem(id, 'dec-prod')
            }

            if(check !== 0){
                const elTotal = document.getElementById('total');
                const result = elTotal.dataset.total  - document.getElementById('price-'+id).dataset.price;
                document.getElementById('total').dataset.total = result;
                document.getElementById('total').textContent = result;
                document.getElementById(`qty-${id}`).value = qty;
            }
        }
    }

    function updateItem(id, action)
    {
        $.ajax({
            url: "/order/cart?action="+action,
            type: "get",
            data: {
                "id": id
            },
            success: function (data){}
        });
    }

    /* const buttonsCat = document.getElementsByClassName('btn-cat');

     for (const btnCat of buttonsCat) {
         btnCat.onclick = function (e){
             e.preventDefault();
             const name = btnCat.value;
             const categories = document.querySelectorAll('.category');
             for (const category of categories) {
                 if(!category.classList.contains(name)){
                     category.style.display = "none";
                 }else{
                     category.style.display = "";
                 }
             }
         }
     }*/

</script>

<!-- jquery -->
<script src="assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="assets/js/sticker.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>



</body>
</html>