<form action="{{ route('sub_processes.update', $subprocess->id) }}" method="post" id="form-update">
    @method('PUT')
    @csrf
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label" >Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" value="{{ $subprocess->name }}">
    </div>
</form>
