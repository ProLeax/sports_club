<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('group_training_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coach_id')->nullable()->constrained('coaches')->onDelete('set null');
            $table->foreignId('member_id')->constrained('memberships')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->dateTime('date');
            $table->integer('duration');
            $table->integer('max_participants')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('group_training_sessions');
    }
};
