!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $model['title'] ?? ''?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


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

    <style>
        .judul
        {
            background: #DEB6AB;
            padding: 10px;
            text-align: center;
        }
        body
        {
            font-family:"Times New Roman";
            font-size: 18px;
            background-color:#ffffff ;
            background-repeat: repeat-x;
        }
        h3
        {
            text-align: center;
            margin-bottom: 12px;
        }
        table
        {
            border-collapse: collapse;
            position: relative;
            margin: auto;
            color: black;
        }
        table th,table td
        {
            border: 1px solid black;
            padding: 7px 17px;
        }
        table thead th
        {
            background-color: #F8ECD1;
            color: black;
            border-color: black;
            text-transform: uppercase;
        }
        table tbody tr:hover td
        {
            background-color: #E6BA95;
            border-color: #CEAB93;
            transition: all .2s;
        }
    </style>
</head>
<body>
<div class="text-center h3 fw-bold mt-3 text-primary">
    Daftar customer
</div>
<div class="container mt-3 pb-4">
    <table>
        <thead>
        <tr>
            <th>customer_name</th>
            <th>customer_phone</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ( $model['data'] ?? '' as $customer) : ?>
        <tr>
            <td><?= $customer['customer_name'] ?></td>
            <td><?= $customer['customer_phone'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>