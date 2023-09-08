<form id="form-update" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Kategori</label>
                        <select class="form-select" name="category">
                            @foreach ($category as $c)
                                @if ($c->id == $product->categories_id)
                                    <option value="{{ $c->id }}" selected>
                                        {{ $c->name }}
                                    </option>
                                @else
                                    <option value="{{ $c->id }}">
                                        {{ $c->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Tipe</label>
                        <select class="form-select" name="type">
                            @foreach ($types as $t)
                                @if ($t->id == $product->types_id)
                                    <option value="{{ $t->id }}" selected>
                                        {{ $t->name }}
                                    </option>
                                @else
                                    <option value="{{ $t->id }}">
                                        {{ $t->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            value="{{ $product->name }}" aria-describedby="textHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ $product->brand }}">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="number" name="price" class="form-control" id="typeNumber"
                            aria-describedby="emailHelp" value="{{ $product->price }}">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Dimensi</label>
                        <input type="text" name="dimension" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ $product->dimension }}">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <img id="product-image" class="card-img-top"
                        src="{{ asset('assets/img/products/' . $product->img_url) }}">
                </div>
            </div>
        </div>
    </div>

    <button type="button" id="btn-update"class="btn btn-secondary m-1" onclick="update()">Ubah</button>
    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>

</form>
