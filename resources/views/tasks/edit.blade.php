<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #90adc9ff;
            color: #333;
            margin: 40px;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
        }

        form {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        button {
            background: #28a745;
            color: #fff;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
        }

        button:hover {
            background: #218838;
        }

        .back-btn {
            background: #6c757d;
        }

        .back-btn:hover {
            background: #5a6268;
        }

        .error {
            color: #dc3545;
            font-size: 13px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Edit Task</h2>

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $task->title) }}">
    @error('title')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Description</label>
    <textarea name="description">{{ old('description', $task->description) }}</textarea>
    @error('description')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Status</label>
    <select name="status">
        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="progress" {{ $task->status == 'progress' ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
    @error('status')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Due Date</label>
    <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}">
    @error('due_date')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Update Task</button>
    <a href="{{ route('tasks.index') }}" class="back-btn">Back</a>
</form>

</body>
</html>
