<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h3>Ubah Pelanggan</h3>
    <form action="{{ route('customers.update', $users->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                aria-describedby="textHelp">
        </div>
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                aria-describedby="textHelp">
        </div>
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="textHelp">
        </div>
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
            <input type="text" name="fname" class="form-control" id="exampleInputEmail1"
                aria-describedby="textHelp">
        </div>
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
            <input type="text" name="lname" class="form-control" id="exampleInputEmail1"
                aria-describedby="textHelp">
        </div>
        <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
            <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1"
                aria-describedby="textHelp">
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
    @if (session('message'))
        <strong style="font-size: 15px">{{ session('message') }}</strong><br>
    @endif
</body>

</html>
