<form action="{{ route('products.store') }}"id="form-store" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Kategori</label>
        <select class="form-select" name="category">
            @foreach ($category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Tipe</label>
        <select class="form-select" name="type">
            @foreach ($types as $t)
                <option value="{{ $t->id }}">{{ $t->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Brand</label>
        <input type="text" name="brand" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Harga</label>
        <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Dimensi</label>
        <input type="text" name="dimension" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    {{-- <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">image_url</label>
        <input type="text" name="img_url" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
      </div> --}}
    <div class="mb-2">
        <label class="form-label">Gambar</label>
        <input type="file" class="form-control" id="img" name="img">
    </div>

    <button type="submit" onclick="store()" class="btn btn-primary">Tambah Produk</button>
    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
</form>
