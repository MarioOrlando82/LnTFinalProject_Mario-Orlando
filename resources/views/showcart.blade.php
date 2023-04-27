<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT Meksiko</title>
</head>

<style>
    *{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
    }

    nav{
        font-weight: bold
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light text-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">PT. Meksiko</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-
            controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">LIST BARANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/create-barang">ADD BARANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/create-category">ADD CATEGORY</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/login">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/register">REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('showcart')}}">CART [{{$count = 0}}]</a>
                    </li>
                    @can('isAdmin')
                        <p class="nav-link active text-primary">YOU ARE AN ADMINISTRATOR</p>
                    @endcan
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search Barang" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div style="background-color:#F5F5F5">
        <h1 class="text-center" style="font-weight: bold" >FAKTUR</h1>
        <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Invoice: </label>
              <small id="emailHelp" class="form-text text-muted">2023/0001. 2023/INV/0001</small>
            </div><br>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat Pengiriman</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div><br>
            <div class="form-group">
                <label for="exampleInputEmail1">Kode Pos</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </form>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
            </tr>
            </thead>
            <tbody>
            <p style="color:#f5f5f5; font-size: 1px; line-height: 0;">{{$total = 0}};</p>
            @foreach ($cart as $carts)
                <tr>
                    <td>{{$carts->product_title}}</td>
                    <td>{{$carts->quantity}}</td>
                    <td>Rp.{{$carts->price * $carts->quantity}}</td>
                    <p style="color:#f5f5f5; font-size: 1px; line-height: 0;">{{$total = $total + $carts->price}};</p>
                </tr>
            @endforeach
            <td>Total : Rp.{{$total}}</td>
            </tbody>
        </table>
        <button class="btn btn-primary"><a href="/" style="color:white; text-decoration:none">Confirm Order</a></button>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/
