<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->string('companyName');
            $table->date('founded');
            $table->string('website')->nullable();
            $table->integer('teamSize');
            $table->text('founderInfo');
            $table->text('productDescription');
            $table->text('targetMarket');
            $table->string('fundingStage');
            $table->text('fundingNeeds');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('startups');
    }
};
