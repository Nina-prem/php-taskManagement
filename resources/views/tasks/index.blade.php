<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #90adc9ff;
            color: #333;
            margin: 40px;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        a {
            text-decoration: none;
            color: #fff;
            background: #007bff;
            padding: 8px 14px;
            border-radius: 5px;
            font-size: 14px;
        }

        a:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-top: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions a {
            background: #ffc107;
            color: #000;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 13px;
        }

        .actions a:hover {
            background: #e0a800;
        }

        .actions form {
            display: inline;
        }

        .actions button {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
        }

        .actions button:hover {
            background: #b02a37;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
        }

        .no-tasks {
            text-align: center;
            color: #777;
            padding: 20px;
        }
    </style>
</head>
<body>

    <h1>TaskManagement</h1>

    <div class="add-btn">
        <a href="{{ route('tasks.create') }}">+ Add Task</a>
    </div>

    <table>
        <tr>
            <th>Title</th>
            <th>description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
        @forelse($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>

            <td>{{$task->description}}</td>
            <td>
                @if($task->status == 'pending')
                    <span style="color: #ffc107; font-weight: bold;">Pending</span>
                @elseif($task->status == 'progress')
                    <span style="color: #17a2b8; font-weight: bold;">In Progress</span>
                @else
                    <span style="color: #28a745; font-weight: bold;">Completed</span>
                @endif
            </td>
            <td>{{ $task->due_date }}</td>
            <td class="actions">
                <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="no-tasks">No tasks found.</td>
        </tr>
        @endforelse
    </table>

</body>
</html>
