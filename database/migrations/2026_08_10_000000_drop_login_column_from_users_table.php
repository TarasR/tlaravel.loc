<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropLoginColumnFromUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('login');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('login', 60)->nullable();
        });
    }
}
