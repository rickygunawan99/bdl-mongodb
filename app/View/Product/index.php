<style>
    body
    {
        background-color:#f2f2f2;
        font-family: 'RobotoDraft', 'Roboto', sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    *
    {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    h5
    {
        margin:0px;
        font-size:1.4em;
        font-weight:700;
    }

    p
    {
        font-size:12px;
    }

    .center
    {
        height:100vh;
        width:100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    /* End Non-Essential  */

    .property-card
    {
        margin: 2em;
        height:18em;
        width:14em;
        display:-webkit-box;
        display:-ms-flexbox;
        display:flex;
        -webkit-box-orient:vertical;
        -webkit-box-direction:normal;
        -ms-flex-direction:column;
        flex-direction:column;
        position:relative;
        -webkit-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        -o-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        border-radius:16px;
        overflow:hidden;
        -webkit-box-shadow:  15px 15px 27px #e1e1e3, -15px -15px 27px #ffffff;
        box-shadow:  15px 15px 27px #e1e1e3, -15px -15px 27px #ffffff;
    }
    /* ^-- The margin bottom is necessary for the drop shadow otherwise it gets clipped in certain cases. */

    /* Top Half of card, image. */

    .property-image
    {
        height:8em;
        width:14em;
        padding:1em 2em;
        position:Absolute;
        background-image:url('https://source.unsplash.com/random/420×380/?products');
        -webkit-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        -o-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        background-size:cover;
        background-repeat:no-repeat;
    }

    /* Bottom Card Section */

    .property-description
    {
        background-color: #FAFAFC;
        height:10em;
        width:14em;
        position:absolute;
        bottom:0em;
        -webkit-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        -o-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        padding: 1em 1em;
        text-align:center;
    }

    .property-price{
        font-size: 15px;
        position: absolute;
        bottom: 3%;
        right: 12%;
        font-family: Cambria;
        color: orange;
    }

    /* Social Icons */

    .property-social-icons
    {
        width:1em;
        height:1em;
        background-color:black;
        position:absolute;
        bottom:1em;
        left:1em;
        -webkit-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        -o-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    /* Property Cards Hover States */

    .property-card:hover{
        transform: scale(1.1);
        cursor: pointer;
    }

    /*.property-card:hover .property-description*/
    /*{*/
    /*    height:0em;*/
    /*    padding:0px 1em;*/
    /*}*/
    /*.property-card:hover .property-image*/
    /*{*/
    /*    height:18em;*/
    /*}*/

    /*.property-card:hover .property-social-icons*/
    /*{*/
    /*    background-color:white;*/
    /*}*/

    /*.property-card:hover .property-social-icons:hover*/
    /*{*/
    /*    background-color:blue;*/
    /*    cursor:pointer;*/
    /*}*/

</style>
</head>
<body>
<nav class="navbar bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Home</a>
    </div>
</nav>
<div class="center">
    <?php foreach ($model['data'] as $cursor) : ?>
        <div class="property-card">
            <a href="#">
                <div class="property-image">
                    <div class="property-image-title">

                    </div>
                </div></a>
            <div class="property-description">
                <h5><?= $cursor['product_description'] ?></h5>
                <p>Stock : <?= $cursor['product_stock'] ?></p>
            </div>
            <!-- <a href="#">
                <div class="property-social-icons">
                    I would usually put multipe divs inside here set to flex. Some people might use Ul li. Multiple Solutions
                </div>
            </a> -->

            <div class="property-price fw-bold">
                Rp. <?= $cursor['product_price'] ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>