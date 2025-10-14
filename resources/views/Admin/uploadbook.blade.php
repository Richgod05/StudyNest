<!-- resources/views/admin/index.blade.php -->
<form method="POST" action="{{ route('admin.storeBook') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Book Name" required>
    <input type="text" name="title" placeholder="Optional Title">
    <input type="text" name="author" placeholder="Author">
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <textarea name="description" rows="5" placeholder="Full description..." required></textarea>
    <input type="text" name="tags" placeholder="Tags (comma-separated)">
    <input type="file" name="file" required>
    <button type="submit">Upload Book</button>
</form>