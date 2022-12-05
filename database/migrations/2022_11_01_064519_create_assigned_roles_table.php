<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('assigned_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('role_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assigned_roles');
    }
};
