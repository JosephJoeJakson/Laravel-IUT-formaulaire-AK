<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('user_team_notification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('added_by_user_id')->constrained('users');
            $table->timestamp('added_at');
        });
    }
};

