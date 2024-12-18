<?php

// database/migrations/YYYY_MM_DD_update_tasks_table_remove_notes_add_other.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTasksTableRemoveNotesAddOther extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('notes'); // Remove the 'notes' field
            $table->text('other')->nullable(); // Add 'other' field
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('notes')->nullable(); // Re-add 'notes' field if needed
            $table->dropColumn('other'); // Drop the 'other' field
        });
    }
}

