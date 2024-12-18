<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Since the created_at column already exists, no need to add it again.
        // Remove the line that adds created_at.
        // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
    }

    public function down()
    {
        // Drop the created_at column if rolling back the migration
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('created_at');  
        });
    }
};
