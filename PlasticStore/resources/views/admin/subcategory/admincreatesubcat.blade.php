<form action="{{ route('sub_categories.store') }}"id="formInsert" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Category</label>
        <select class="form-select" name="categories_id">
            @foreach ($category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
</form>
