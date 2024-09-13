<!-- resources/views/upload.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>File Upload Demo</title>
</head>
<body>
    <h1>File Upload</h1>

    <!-- Show Success Message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- File Upload Form -->
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload File</button>
    </form>

    <!-- List of Uploaded Files -->
    <h2>Uploaded Files</h2>
    <ul>
        @foreach($files as $file)
            <li>
                <a href="{{ Storage::url($file) }}" target="_blank">{{ $file }}</a> 
                | <a href="{{ route('download', basename($file)) }}">Download</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
