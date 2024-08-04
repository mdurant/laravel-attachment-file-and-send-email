<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('file_submissions', function (Blueprint $table) {
            $table->boolean('email_sent')->default(false);
            $table->timestamp('email_sent_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('file_submissions', function (Blueprint $table) {
            $table->dropColumn('email_sent');
            $table->dropColumn('email_sent_at');
        });
    }
};
