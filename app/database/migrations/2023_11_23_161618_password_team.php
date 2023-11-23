<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team-password', function (Blueprint $table) {
            $table->id();
            $table->foreignId('password_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->timestamps();
        });
    }
};
