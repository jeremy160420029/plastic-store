<form id="form-update" action="{{ route('brands.update', $brand->id) }}" method="post" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            value="{{ $brand->name }}" aria-describedby="textHelp">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Image brand</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <img id="brand-image" class="card-img-top"
                        src="{{ asset('assets/img/brands/' . $brand->image) }}">
                </div>
            </div>
        </div>
    </div>

    <button type="button" id="btn-update"class="btn btn-secondary m-1" onclick="updateBrand()">Update Brand</button>
    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button>

</form>
