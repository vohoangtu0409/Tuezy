<?php
const ROOT = __DIR__ . DIRECTORY_SEPARATOR;
require ROOT . 'vendor/autoload.php';

foreach([
            'bootstrap_define.php',
            'bootstrap_configs.php',
            'bootstrap_view.php',
            'bootstrap_eloquent.php',
        ] as $bootstrapFiles){

    include ROOT . 'boostrap/'. $bootstrapFiles;
}

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

$builder = new Builder(database()->getConnection());

$builder->create('users', function (Blueprint $table){
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});

$builder->create('password_resets', function (Blueprint $table){
    $table->string('email')->index();
    $table->string('token');
    $table->timestamp('created_at')->nullable();
});

$builder->create('personal_access_tokens', function (Blueprint $table) {
    $table->id();
    $table->morphs('tokenable');
    $table->string('name');
    $table->string('token', 64)->unique();
    $table->text('abilities')->nullable();
    $table->timestamp('last_used_at')->nullable();
    $table->timestamp('expires_at')->nullable();
    $table->timestamps();
});