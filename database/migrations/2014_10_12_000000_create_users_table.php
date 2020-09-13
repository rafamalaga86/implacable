<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = User::create([
            'name' => 'Rafa',
            'email' => 'rafamalaga86@gmail.com',
            'password' => '1234',
        ]);
        $user->is_admin = true;
        $user->save();


        $user = User::create([
            'name' => 'Jony',
            'email' => 'jonathanma07@gmail.com',
            'password' => '1234',
        ]);
        $user->is_admin = true;
        $user->save();
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
