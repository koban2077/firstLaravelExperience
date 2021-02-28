<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnProductIdToComments extends Migration
{

    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('product_id')->after('id');
        });
    }

    public function down()
    {
        Schema::dropColumns('comments', ['product_id']);
    }
}
