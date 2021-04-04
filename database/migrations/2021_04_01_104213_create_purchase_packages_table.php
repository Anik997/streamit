<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('user_id');
            $table->string('expire_date');
            $table->string('start_date');
            $table->string('payment_name');
            $table->string('trinsaction_number');
            $table->string('payment_from');
            $table->string('package_active')->default('1')->comment('1=not started,2=started');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_packages');
    }
}
