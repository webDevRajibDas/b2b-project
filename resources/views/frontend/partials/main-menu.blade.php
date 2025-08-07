<select id="cat" name="cat" class="form-control select2" style="width: 100%;">
    <option value="">All Departments</option>
    @foreach($menuCategories as $category)
        <option value="{{ $category->id }}">{{ $category->title }}</option>
    @endforeach
</select>
