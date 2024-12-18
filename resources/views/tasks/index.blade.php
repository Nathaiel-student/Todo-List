<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <!-- Header with title and dark mode toggle -->
        <header>
            <h1>TodoStream: Keep Your Day on Track</h1>
            <button id="theme-toggle" class="theme-toggle-btn">🌙</button>
        </header>

        <!-- Add Task Form -->
        <section class="task-form">
            <h2>Add New Task</h2>
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf
                <input type="text" name="name" placeholder="Enter task..." required>
                
                <select name="priority" required>
                    <option value="Low">Low Priority</option>
                    <option value="Medium">Medium Priority</option>
                    <option value="High">High Priority</option>
                </select>

                <select name="status" required>
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    
                </select>

               

                <button type="submit">Add Task</button>
            </form>
        </section>

        <!-- Task List -->
        <section class="task-list-container">
            <h2>Tasks</h2>
            <ul id="task-list" class="task-list">
                @foreach ($tasks as $task)
                    <li class="task" data-status="{{ $task->status }}">
                        <div class="task-info">
                            <span class="task-name">{{ $task->name }}</span>
                            <span class="task-priority {{ $task->priority }}">{{ $task->priority }}</span>
                            <span class="task-status">{{ $task->status }}</span>
                        </div>
                        <div class="task-actions">
                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="complete-btn">Complete</button>
                            </form>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</body>
</html>
