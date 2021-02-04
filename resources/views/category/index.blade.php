<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Page Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>Your content here!</h1>
<ul>
    @forelse($categories as $category)
    <li>{{ $category->title }} </li>
    @empty
        <li> No categories</li>
    @endforelse
</ul>
<script src="script.js"></script>
</body>
</html>
