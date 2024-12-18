<?php

// routes/web.php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Display all tasks
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Create a new task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Mark a task as completed
Route::post('/tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

// Delete a task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Update the task status (including "In Progress")
Route::post('/tasks/{id}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

