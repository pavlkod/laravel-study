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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->bigInteger('author_id')->unsigned()->nullable();
            $table->string('title', 100);
            $table->string('excerpt', 200);
            $table->string('image', 100)->nullable();
            $table->text('body');
            $table->timestamps();
            // внешний ключ, ссылается на поле id таблицы users
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();
        });

        //update
        /* Schema::table('users', function (Blueprint $tаblе) {
            $tаblе->string('email')->nullable()->after('last_name');
        });  */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
