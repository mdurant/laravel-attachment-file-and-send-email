<!-- resources/views/emails/file-submission.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>File Submission Received</title>
</head>
<body>
<h1>Estimado {{ $name }}</h1>
<p>Su archivo {{ $fileName }} ha sido recepcionado por el equipo el dia: {{ $submissionDate }}</p>
</body>
</html>
