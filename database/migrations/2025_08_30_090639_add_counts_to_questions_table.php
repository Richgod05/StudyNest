<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            if (!Schema::hasColumn('questions', 'likes_count')) {
                $table->unsignedBigInteger('likes_count')->default(0)->after('body');
            }
            if (!Schema::hasColumn('questions', 'replies_count')) {
                $table->unsignedBigInteger('replies_count')->default(0)->after('likes_count');
            }
            if (!Schema::hasColumn('questions', 'views_count')) {
                $table->unsignedBigInteger('views_count')->default(0)->after('replies_count');
    }
});
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn(['likes_count', 'replies_count', 'views_count']);
        });
    }
};



