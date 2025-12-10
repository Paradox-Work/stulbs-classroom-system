<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // First check if columns exist
        if (!Schema::hasColumn('assignment_files', 'grade')) {
            Schema::table('assignment_files', function (Blueprint $table) {
                $table->decimal('grade', 3, 1)->nullable()->after('note');
            });
        }
        
        if (!Schema::hasColumn('assignment_files', 'feedback')) {
            Schema::table('assignment_files', function (Blueprint $table) {
                $table->text('feedback')->nullable()->after('grade');
            });
        }
    }

    public function down(): void
    {
        // Don't drop columns in down() to be safe
        // Schema::table('assignment_files', function (Blueprint $table) {
        //     $table->dropColumn(['grade', 'feedback']);
        // });
    }
};