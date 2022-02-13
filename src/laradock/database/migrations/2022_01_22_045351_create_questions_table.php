<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('character')->comment('キャラクター名');
            $table->string('line')->comment('セリフ');
            //$table->integer('chapter_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign('chapter_id')->references('id')->on('chapters');
            $table->foreignId('chapter_id')->constrained('chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('questions');
        // カラムの削除
        $table->dropColumn('chapter_id');
        // 外部キー制約の削除
        $table->dropForeign(['chapter_id']);
    }
}