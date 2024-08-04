<!-- resources/views/file-submission/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>File Submission Form</title>
</head>
<body>
<h1>File Submission Form</h1>

@if (session()->has('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<form action="{{ route('file-submission.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        @error('name') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="photo">Photo</label>
        <input type="file" id="photo" name="photo" accept=".jpeg,.png,.jpg" required>
        @error('photo') <span>{{ $message }}</span> @enderror
    </div>

    <button type="submit">Submit</button>
</form>
</body>
</html>
