<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body{
            margin-top:1.5em;
            background:#f1f2f7;
            position: relative;
        }

        /*panel*/
        .panel {
            border: none;
            box-shadow: none;
        }

        .panel-heading {
            border-color:#eff2f7 ;
            font-size: 16px;
            font-weight: 300;
        }

        .panel-title {
            color: #2A3542;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 0;
            margin-top: 0;
            font-family: 'Open Sans', sans-serif;
        }


        /*product list*/

        .prod-cat li a{
            border-bottom: #d9d9d9;
        }

        .prod-cat li a {

        }

        .prod-cat li ul {
            margin-left: 30px;
        }

        .prod-cat li ul li a{
            border-bottom:none;
        }
        .prod-cat li ul li a:hover,.prod-cat li ul li a:focus, .prod-cat li ul li.active a , .prod-cat li a:hover,.prod-cat li a:focus, .prod-cat li a.active{
            background: none;
            color: #ff7261;
        }

        .pro-lab{
            margin-right: 20px;
            font-weight: normal;
        }

        .pro-sort {
            padding-right: 20px;
            float: left;
        }

        .pro-page-list {
            margin: 5px 0 0 0;
        }

        .product-list img{
            width: 100%;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
        }

        .product-list .pro-img-box {
            position: relative;
        }

        .adtocart i{
            color: #fff;
            font-size: 25px;
            line-height: 42px;
        }

        .pro-title {
            color: #5A5A5A;
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
        }

        .product-list .price {
            color:#fc5959 ;
            font-size: 15px;
        }

        .pro-img-details {
            margin-left: -15px;
        }

        .pro-img-details img {
            width: 100%;
        }

        .pro-d-title {
            font-size: 16px;
            margin-top: 0;
        }

        .product_meta {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            margin: 15px 0;
        }

        .product_meta span {
            display: block;
            margin-bottom: 10px;
        }
        .product_meta a, .pro-price{
            color:#fc5959 ;
        }

        .pro-price, .amount-old {
            font-size: 18px;
            padding: 0 10px;
        }

        .amount-old {
            text-decoration: line-through;
        }

        .quantity {
            width: 120px;
        }

        .pro-img-list {
            margin: 10px 0 0 -15px;
            width: 100%;
            display: inline-block;
        }

        .pro-img-list a {
            float: left;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .pro-d-head {
            font-size: 18px;
            font-weight: 300;
        }

        .input-group{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1em;
        }

        .input-group input[type=button]{
            border-radius: 20px;
            border: none;
            font-size: 16px;
            padding: 0.4rem 1.2rem;
        }

        .input-group input[type=text]{
            border: none;
            margin: 1em 0.3em;
        }

       .sticky-bottom{
            position: sticky;
            border: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <input type="text" placeholder="Keyword Search" class="form-control" />
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Category
            </header>
            <div class="panel-body">
                <ul class="nav prod-cat" style="display: inline">
                    <?php foreach($model['categories'] as $category) : ?>
                        <li>
                            <button class="btn btn-sm btn-outline-dark m-1 bg-white btn-cat" type="submit"
                            name="c" value="<?= $category ?>"><?= $category ?>
                            </button>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </section>
        <!--
        <section class="panel">
            <header class="panel-heading">
                Filter
            </header>
            <div class="panel-body">
                <form role="form product-form">
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>Wallmart</option>
                            <option>Catseye</option>
                            <option>Moonsoon</option>
                            <option>Textmart</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">Wallmart</span></span>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>White</option>
                            <option>Black</option>
                            <option>Red</option>
                            <option>Green</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">White</span></span>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>Extra Large</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">Small</span></span>
                    </div>
                    <button class="btn btn-primary" type="submit">Filter</button>
                </form>
            </div>
        </section>
        -->
    </div>
    <div class="col-md-9">
        <nav aria-label="...">
            <ul class="pagination pagination-md d-flex justify-content-end">
                <li class="page-item active" aria-current="page">
                    <span class="page-link">1</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>

        <div class="row product-list">
            <?php foreach($model['products'] as $product) : ?>
                <div class="col-md-4">
                    <section class="panel category <?= $product['category'] ?>">
                        <div class="pro-img-box">
                            <img src="https://source.unsplash.com/220x150/?foundation" alt="" />
                        </div>
                        <div class="panel-body text-center" style="padding: 0">
                            <h6>
                                <a href="#" class="pro-title">
                                    <?= $product['name'] ?>
                                </a>
                            </h6>
                            <p class="price" id="price-<?=$product['id']?>" data-price="<?=$product['price']?>">
                                    <?= $product['price'] ?>
                            </p>
                            <p style="font-size: smaller; color: blue"><?=$product['qty']?> tersedia</p>
                        </div>
                        <div class="input-group">
                            <input type="button" value="-" name="<?=$product['id']?>" class="btnDec">
                            <input type="text" name="item_id" value=<?= $product['order_qty'] ?? 0 ?>
                            id="qty-<?= $product['id']?>" class="text-center" style="width: 2.5em" disabled>
                            <input type="button" value="+"  name="<?=$product['id']?>" class="btnInc">
                        </div>
                    </section>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="#">
        <nav class="navbar sticky-bottom bg-success border rounded-pill w-50 mx-auto">
            <div class="container">
                <div class="navbar-brand fw-bold" style="color: white">Checkout</div>
                <div class="navbar-brand fw-bold" style="color: white" id="total" data-total="<?= $model['total'] ?>">
                    <?= $model['total'] ?>
                </div>
            </div>
        </nav>
        </a>
    </div>
</div>
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
</body>
</html>