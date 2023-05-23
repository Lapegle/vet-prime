<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sent_surveys', function (Blueprint $table) {
            $table->id();
            $table->uuid('token');
            $table->foreignId('survey_id');
            $table->morphs('surveyable');
            $table->boolean('is_answered')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_surveys');
    }
};
