<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
            rel="stylesheet"
    />
</head>
<body>

<div class="container" style="font-family: 'Arial'">
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin">Dashboard Admin</a>
            <div class="d-flex">
                <a class="btn bg-white text-black me-2" type="button" href="#">
                    <i class="bi bi-person-fill"></i>
                    <?= $model['user']->username ?? ''?>
                </a>
                <a class="btn bg-danger text-white" type="button" href="/logout">Logout</a>
            </div>
        </div>
    </nav>

    <?php if(\BasisData\Mongo\App\Session::Get('success')) : ?>
        <div class="alert alert-success w-50 mx-auto" role="alert">
            <?= \BasisData\Mongo\App\Session::Flush('success') ?>
        </div>
    <?php endif ?>

    <?php if(\BasisData\Mongo\App\Session::Get('err')) : ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <?= \BasisData\Mongo\App\Session::Flush('err') ?>
        </div>
    <?php endif ?>

    <div class="container d-flex justify-content-end py-2">
        <a href="/admin/add-product" class="btn bg-primary text-white" type="button" role="button">New product</a>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="trans-tab" data-bs-toggle="tab" data-bs-target="#transaksi" type="button" role="tab" aria-controls="home" aria-selected="true">Transaksi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#produk" type="button" role="tab" aria-controls="profile" aria-selected="false">Products</button>
        </li>

    </ul>

    <div class="tab-content border" id="myTabContent">
        <div class="tab-pane fade show active" id="transaksi" role="tabpanel" aria-labelledby="transaksi-tab">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search id" aria-label="Search" autocomplete="off" name="s_tr_id">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <form action="" method="post">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Total</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(isset($model['order']) && $model['order'] !== []) { ?>
                        <?php foreach ($model['order'] as $row) { ?>
                            <tr>
                                <th scope="col"> <?=$row['session_id'] ?? ''?> </th>
                                <td class="text-sm-start text-wrap"> <?= date("d-m-Y", strtotime($row['order_date']))?> </td>

                                <!-- status : 0(belum diproses), 1(sudah diproses) !-->
                                <?php if($row['status'] == 0) {?>
                                    <td class="text-sm-start text-wrap"> <?= "Menunggu konfirmasi" ?> </td>
                                <?php } ?>

                                <td>
                                    <a class="btn btn-primary btn-sm" type="button" href="/admin/detail-transaction/<?=$row['session_id'] ?? '0'?>">Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php }?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="tab-pane fade" id="produk" role="tabpanel" aria-labelledby="products-tab">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search Product Name" aria-label="Search" autocomplete="off" name="s_product">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <form action="" method="post">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(isset($model['product']) && $model['product'] != []) : ?>
                        <?php foreach ($model['product'] as $row) : ?>
                            <tr>
                                <td class="text-sm-start text-wrap"> <?=$row['name']?> </td>
                                <td class="text-sm-start text-wrap"> <?=$row['qty']?> </td>
                                <td class="text-sm-start text-wrap"> <?=$row['category']?> </td>
                                <td class="text-sm-start text-wrap"> <?=$row['price']?> </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btnEdit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?=$row['_id']?>"
                                        data-name="<?=$row['name']?>" data-qty="<?=$row['qty']?>" data-ctgr="<?=$row['category']?>" data-price="<?=$row['price']?>">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="temp">
                                                    <div class="mb-3">
                                                        <label for="nameEdit" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="nameEdit" name="nameEdit">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="stockEdit" class="form-label">Stock</label>
                                                        <input type="number" class="form-control" id="stockEdit" name="stockEdit">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ctgrEdit" class="form-label">Category</label>
                                                        <input type="text" class="form-control" id="ctgrEdit" name="ctgrEdit">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="priceEdit" class="form-label">Price</label>
                                                        <input type="text" class="form-control" id="priceEdit" name="priceEdit">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="save">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?=$row['_id'] ?>" name="_id">
                                        <button class="btn btn-danger btn-sm" type="submit" name="delete">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                                <td>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                    </tbody>
                </table>
            </form>
        </div>

    </div>
</div>

<script>
    const editButtons = document.querySelectorAll('.btnEdit');

    let newProdVal;

    for (let editButton of editButtons) {
        editButton.onclick = function (){
            newProdVal = {
                'id': this.dataset.id,
                'name': this.dataset.name,
                'qty': this.dataset.qty,
                'ctgr': this.dataset.ctgr,
                'price': this.dataset.price
            }
            setFieldValue(newProdVal)
        }
    }

    function setFieldValue(newProdVal)
    {
        document.getElementById('temp').value = newProdVal.id;
        document.getElementById('nameEdit').value = newProdVal.name;
        document.getElementById('stockEdit').value = newProdVal.qty;
        document.getElementById('ctgrEdit').value = newProdVal.ctgr;
        document.getElementById('priceEdit').value = newProdVal.price ;
    }

    const save = document.getElementById('save');
    save.onclick = function (){
        editItem();
    }

    function editItem()
    {
        $.ajax({
            url: "/admin/edit-product",
            type: "get",
            data: {
                '_id': document.getElementById('temp').value,
                'name': document.getElementById('nameEdit').value,
                'qty': document.getElementById('stockEdit').value,
                'ctgr': document.getElementById('ctgrEdit').value,
                'price': document.getElementById('priceEdit').value
            },
            success: function (value){
                alert(value);
                window.location.href = "/admin";
            }
        });
    }

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>