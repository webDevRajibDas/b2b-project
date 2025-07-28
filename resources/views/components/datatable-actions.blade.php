<a href="{{ route('admin.products.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>
<form method="POST" action="{{ route('admin.products.destroy', $row->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>