<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        DB::table("pages")->insert(
            [
                [
                    'id' => 1,
                    'title' => 'Home Page',
                    'content' => ''
                ],
                [
                    'id' => 2,
                    'title' => 'About Page',
                    'content' => ''
                ],
                [
                    'id' => 3,
                    'title' => 'Services Page',
                    'content' => ''
                ],
                [
                    'id' => 4,
                    'title' => 'Contact Us Page',
                    'content' => ''
                ],
               
                [
                    'id' => 5,
                    'title' => 'Privacy Policy',
                    'content' => ''
                ],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
