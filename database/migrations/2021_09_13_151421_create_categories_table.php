<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->timestamps();
        });
        $categories=['libri','Musica,film Tv','Videogiochi e console','elettronica e informatica','casa,giardino,Fai da te e Animali','Alimentari e Cura della casa','Bellezza e salute','Giochi e Prima Infanzia','Vestiti,Scarpe,gioielli e accessori','Sport e Tempo Libero','Auto e Moto','Commercio,Industria e Scienza'];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->category = $category;
            $newCategory->save();};

    
        # code...
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
