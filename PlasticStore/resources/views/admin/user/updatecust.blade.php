<form action="{{ route('customers.updateAdmCust', $cust->id) }}" method="post" id="form-update">
    @method('POST')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp"
            value="{{ $cust->name }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp"
            value="{{ $cust->email }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1"
            aria-describedby="textHelp" value="{{ $cust->phone_number }}">
        <div id="textHelp" class="form-text">Nomor Telepon minimal 10 dan maksimal 13</div>
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" name="street_address" class="form-control" id="exampleInputEmail1"
            aria-describedby="textHelp" value="{{ $cust->street_address }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">City</label>
        <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp"
            value="{{ $cust->city }}">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Postal Code</label>
        <input type="text" name="postal_code" class="form-control" id="exampleInputEmail1"
            aria-describedby="textHelp" value="{{ $cust->postal_code }}">
    </div>
</form>
