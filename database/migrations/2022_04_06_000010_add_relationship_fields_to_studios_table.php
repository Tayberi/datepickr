<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudiosTable extends Migration
{
    public function up()
    {
        Schema::table('studios', function (Blueprint $table) {
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->foreign('resource_id', 'resource_fk_6376072')->references('id')->on('resources');
        });
    }
}
