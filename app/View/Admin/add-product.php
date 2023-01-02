<!doctype html>
<html lang="en">
<head>
    <title>Add product</title>
    <style>
        body {
            margin:  0;
        }
        .page-content {
            width: 100%;
            margin:  0 auto;
            background: #ffffff;
            display: flex;
            display: -webkit-flex;
            justify-content: center;
            -o-justify-content: center;
            -ms-justify-content: center;
            -moz-justify-content: center;
            -webkit-justify-content: center;
            align-items: center;
            -o-align-items: center;
            -ms-align-items: center;
            -moz-align-items: center;
            -webkit-align-items: center;
        }
        .form-v5-content  {
            background: #fff;
            width: 670px;
            border-radius: 8px;
            -o-border-radius: 8px;
            -ms-border-radius: 8px;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            margin: 50px 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
            font-weight: 400;
            position: relative;
            font-size: 18px;
        }
        .form-v5-content .form-detail {
            padding: 10px 45px 30px 45px;
            position: relative;
        }
        .form-detail h2 {
            font-weight: 700;
            font-size: 25px;
            text-align: center;
            position: relative;
            padding: 3px 0 20px;
            margin-bottom: 40px;
        }
        .form-detail h2::after {
            background: #3786bd;
            width: 50px;
            height: 2px;
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            -o-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
        }
        .form-detail .form-row {
            position: relative;
        }
        .form-detail .form-row-last {
            text-align: center;
        }
        .form-detail label {
            display: block;
            font-size: 18px;
            padding-bottom: 10px;
        }
        .form-detail .input-text {
            margin-bottom: 26px;
        }
        .form-detail input {
            width: 94.5%;
            padding: 10.5px 15px;
            border: 1px solid #e5e5e5;
            appearance: unset;
            -moz-appearance: unset;
            -webkit-appearance: unset;
            -o-appearance: unset;
            -ms-appearance: unset;
            outline: none;
            -moz-outline: none;
            -webkit-outline: none;
            -o-outline: none;
            -ms-outline: none;
            border-radius: 4px;
            -o-border-radius: 4px;
            -ms-border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 18px;
        }
        .form-detail input:focus {
            border: 1px solid #b3b3b3;
        }
        .form-detail .register {
            font-size: 18px;
            color: #fff;
            background: #3786bd;
            border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            width: 180px;
            box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            -o-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            -ms-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            border: none;
            margin: 19px 0 40px;
            cursor: pointer;
        }
        .form-detail .register:hover {
            background: #2f73a3;
        }
        .form-detail .form-row-last input {
            padding: 14px;
        }
        .form-detail i {
            font-size: 14px;
            color: #999;
            right: 15px;
            top: 50%;
            transform: translateX(-50%);
            position: absolute;
        }
        input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #999;
            font-size: 16px;
        }
        input::-moz-placeholder { /* Firefox 19+ */
            color: #999;
            font-size: 16px;
        }
        input:-ms-input-placeholder { /* IE 10+ */
            color: #999;
            font-size: 16px;
        }
        input:-moz-placeholder { /* Firefox 18- */
            color: #999;
            font-size: 16px;
        }

        /* Responsive */
        @media screen and (max-width: 767px) {
            .form-v5-content {
                margin: 175px 20px;
            }
        }

    </style>
</head>
<body class="form-v5">
<nav class="navbar navbar-light bg-primary">
    <div class="container px-4">
        <a class="navbar-brand fs-4" href="/admin">Home</a>
    </div>
</nav>

<?php if(isset($model['error'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show text-center w-50 mx-auto" role="alert">
        <strong> <?= $model['error'] ?? '' ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<?php if(isset($model['success'])) { ?>
    <div class="alert alert-success alert-dismissible fade show text-center w-50 mx-auto" role="alert">
        <strong> <?= $model['success'] ?? '' ?> <a href="/admin" class="text-primary"> Klik untuk kembali</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<div class="page-content">
    <div class="form-v5-content border">
        <form class="form-detail" action="" method="post">
            <h2>Tambah Produk baru</h2>
            <div class="form-row">
                <label for="proName">Nama Produk</label>
                <input type="text" name="proName" id="proName" class="input-text" placeholder="Nama product" autocomplete="off" required>
            </div>

            <div class="form-row">
                <label for="catName">Nama Kategori</label>
                <input type="text" name="catName" id="catName" class="input-text" placeholder="Nama kategori" autocomplete="off" required>
            </div>

            <div class="form-row">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="input-text" placeholder="Harga" required>
            </div>
            <div class="form-row">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="input-text" placeholder="stock" required>
            </div>
            <div class="d-flex justify-content-evenly">
                <a class="btn btn-primary btn-lg" href="/admin" role="button">Back</a>
                <button class="btn btn-success btn-lg" type="submit" name="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>


