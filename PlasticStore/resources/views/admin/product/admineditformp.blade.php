<form id="form-update" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            value="{{ $product->name }}" aria-describedby="textHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
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
                        <label for="exampleInputEmail1" class="form-label">Sub Category</label>
                        <select class="form-select" name="sub_category">
                            @foreach ($subcategory as $sc)
                                @if ($sc->id == $product->sub_categories_id)
                                    <option value="{{ $sc->id }}" selected>
                                        {{ $sc->name }}
                                    </option>
                                @else
                                    <option value="{{ $sc->id }}">
                                        {{ $sc->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Brand</label>
                        <select class="form-select" name="brand">
                            @foreach ($brand as $b)
                                @if ($b->id == $product->brands_id)
                                    <option value="{{ $b->id }}" selected>
                                        {{ $b->name }}
                                    </option>
                                @else
                                    <option value="{{ $b->id }}">
                                        {{ $b->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Sub Process</label>
                        <select class="form-select" name="sub_process">
                            @foreach ($subprocess as $sp)
                                @if ($sp->id == $product->sub_processes_id)
                                    <option value="{{ $sp->id }}" selected>
                                        {{ $sp->name }}
                                    </option>
                                @else
                                    <option value="{{ $sp->id }}">
                                        {{ $sp->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="typeNumber"
                            aria-describedby="emailHelp" value="{{ $product->price }}">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Manufacture</label>
                        <input type="text" name="manufacturer" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ $product->manufacturer }}">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Total Sales</label>
                        <input type="text" name="total_sales" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ $product->total_sales }}">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Image Product</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <img id="product-image" class="card-img-top"
                        src="{{ asset('assets/img/products/' . $product->image) }}">
                </div>
            </div>
        </div>
    </div>

    <button type="button" id="btn-update"class="btn btn-secondary m-1" onclick="update()">Update Product</button>
    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Exit</button>

</form>
