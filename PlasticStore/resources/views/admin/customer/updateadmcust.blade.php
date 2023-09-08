<form action="{{ route('customers.updateAdmCust', $users->id) }}" method="post" id="form-update">
    @method('POST')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" value="{{ $users->username }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" value="{{ $users->email }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
        <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" value="{{ $users->fname }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
        <input type="text" name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" value="{{ $users->lname }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
        <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1"
            aria-describedby="textHelp" value="{{ $users->phone_number }}">
    </div>
</form>
