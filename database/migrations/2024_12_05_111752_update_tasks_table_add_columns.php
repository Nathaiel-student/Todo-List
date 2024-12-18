<?php

// database/migrations/YYYY_MM_DD_update_tasks_table_add_columns.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTasksTableAddColumns extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('notes')->nullable(); // Add the notes field (nullable)
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('notes'); // Drop the notes field
        });
    }
}

