<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddIsEmailVerifiedColumnToUsersTable
 */
class AddIsEmailVerifiedColumnToUsersTable extends Migration {

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down() {

        Schema::table($this->getUsersTableName(), function (Blueprint $table) {

            $table->dropColumn('is_email_verified');
        });
    }

    /**
     * Determine the users table name.
     * @return string
     */
    public function getUsersTableName() {

        $userModel = config('auth.providers.users.model', App\User::class);

        return (new $userModel)->getTable();
    }

    /**
     * Run the migrations.
     * @return void
     */
    public function up() {

        Schema::table($this->getUsersTableName(), function (Blueprint $table) {

            $table->boolean('is_email_verified')->default(false);
        });
    }
}
