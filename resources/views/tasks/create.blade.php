<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Task</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #84a0bdff;
            color: #333;
            margin: 40px;
        }

        h2 {
            text-align: center;
            color: #fff;
        }

        form {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #218838;
        }

        a.btn-secondary {
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 10px;
        }

        a.btn-secondary:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>

    <h2>TaskManagement</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control">
        </div>

        <div class="text-center">
            <button type="submit">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

</body>
</html>
