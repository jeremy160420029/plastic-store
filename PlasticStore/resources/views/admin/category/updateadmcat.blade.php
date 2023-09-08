<form action="{{ route('categories.update', $categories->id) }}" method="post" id="form-update">
    @method('PUT')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label" >Nama</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" value="{{ $categories->name }}">
    </div>
</form>
