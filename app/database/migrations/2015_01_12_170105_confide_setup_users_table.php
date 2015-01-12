<?php

use Illuminate\Database\Migrations\Migration;

class ConfideSetupUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function ($table) {

            $table->dropColumn('user_rememberme_token');
            $table->dropColumn('user_failed_logins');
            $table->dropColumn('user_activation_code');
            $table->dropColumn('user_reset_timestamp');
            $table->dropColumn('remember_token');

        });


        Schema::table('users', function ($table) {


            $table->unique('username');
            $table->unique('email');
            $table->string('confirmation_code')->after('lname');;
            $table->string('remember_token')->nullable()->after('confirmation_code');;
            $table->boolean('confirmed')->default(false)->after('remember_token');;

        });

        // Creates password reminders table
        Schema::create('password_reminders', function ($table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
        Schema::table('users', function ($table) {

            $table->String('user_rememberme_token');
            $table->string('user_failed_logins');
            $table->string('user_activation_code');
            $table->string('user_reset_timestamp');
            $table->string('remember_token');

        });
    }
}
