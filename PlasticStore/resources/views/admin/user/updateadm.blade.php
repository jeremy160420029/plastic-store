<form action="{{ route('admin.updateAdmStaff', $admin->id) }}" method="post" id="form-update">
    @method('POST')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp"
            value="{{ $admin->name }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp"
            value="{{ $admin->email }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputPassword" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword"
            aria-describedby="passwordHelp" minlength="8" required>
        <div id="passwordHelp" class="form-text">Password harus memiliki setidaknya 8 karakter.</div>
        <div id="passwordHelp" class="form-text text-danger">
        </div>
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1"
            aria-describedby="textHelp" value="{{ $admin->phone_number }}">
        <div id="textHelp" class="form-text">Nomor Telepon minimal 10 dan maksimal 12</div>
    </div>
</form>
