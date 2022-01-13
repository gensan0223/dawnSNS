<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('follow_id');
            $table->unsignedBigInteger('follower_id');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('follow_id')->references('id')->on('users');
            $table->foreign('follower_id')->references('id')->on('users');

            $table->unique(['follow_id', 'follower_id']);
        });
    }

    /**
    $numListA = explode(' ', trim(fgets(STDIN))); * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
