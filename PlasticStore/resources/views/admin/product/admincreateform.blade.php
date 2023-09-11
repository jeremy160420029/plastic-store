<form action="{{ route('products.store') }}"id="form-store" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Category</label>
        <select class="form-select" name="category">
            @foreach ($category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Sub Category</label>
        <select class="form-select" name="sub_category">
            @foreach ($subcategory as $sc)
                <option value="{{ $sc->id }}">{{ $sc->name }}</option>
            @endforeach
            {{-- @foreach ($category as $c)
                @if (isset($subcategory[$c->id]))
                    @foreach ($subcategory[$c->id] as $sc)
                        <option value="{{ $sc->id }}">{{ $sc->name }}</option>
                    @endforeach
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Brand</label>
        <select class="form-select" name="brand">
            @foreach ($brand as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Sub Process</label>
        <select class="form-select" name="sub_process">
            @foreach ($subprocess as $sp)
                <option value="{{ $sp->id }}">{{ $sp->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Manufacture</label>
        <input type="text" name="manufacturer" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    {{-- <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">image_url</label>
        <input type="text" name="img_url" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
      </div> --}}
    <div class="mb-2">
        <label class="form-label">Image Product</label>
        <input type="file" class="form-control" id="img" name="img">
    </div>

    <button type="submit" onclick="store()" class="btn btn-primary">Add Product</button>
    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button>
</form>
