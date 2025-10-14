
<h2>Add New Category</h2>
<form method="POST" action="{{ route('admin.storeCategory') }}">
    @csrf
    <input type="text" name="name" placeholder="Category name" required>
    <button type="submit">Add Category</button>
</form>
