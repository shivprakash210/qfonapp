<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('mobile');
            $table->string('profile');
            $table->boolean('status')->default(1);
            $table->string('email')->unique();
            $table->foreignId('company_id')
                    ->constrained('companies')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->enum('gender',["Male","Female","Other"]);
            $table->string('employee_code')->unique();
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->string('pincode');

            $table->double('amount', 10, 2)->default(0);
            $table->double('earning', 10, 2)->default(0);
            $table->bigInteger('parent');

            $table->string('affiliate_code')->nullable();

            $table->string('password');
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
