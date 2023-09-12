<form action="{{ route('sub_category.update', $subCategory->id) }}" method="post" id="form-update">
    @method('POST')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
            value="{{ $subCategory->name }}" aria-describedby="textHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Category</label>
        <select class="form-select" name="categories_id">
            @foreach ($category as $c)
                @if ($c->id == $subCategory->categories_id)
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
</form>
