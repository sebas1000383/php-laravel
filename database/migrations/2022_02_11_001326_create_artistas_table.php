<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disqueras', function (Blueprint $table) {
            $table->bigIncrements('idDisquera');
            $table->string('nitDisquera','20')->unique();            
            $table->string('nombreDisquera','100');
            $table->string('telefonoDisquera','15');
            $table->string('direccionDisquera','100');
            $table->string('estadoDisquera','10');
            $table->timestamps();
        });
        {
            Schema::create('generos', function (Blueprint $table) {
                $table->bigIncrements('idGenero');           
                $table->string('nombreGenero','30');            
                $table->string('estadoGenero','10');
                $table->timestamps();
            });
        }
        {
            Schema::create('artistas', function (Blueprint $table) {
                $table->bigIncrements('idArtista');
                $table->string('noDocumento','20')->unique();
                $table->string('tipoDocumento','20');
                $table->string('nombreArtista','50');
                $table->string('apellidoArtista','50')->nullable;
                $table->string('nombreArtistico','50')->nullable;            
                $table->date('feNacimArtista');
                $table->string('emailArtista','50');
                $table->unsignedBigInteger('idDisqueraFK');
                $table->foreign('idDisqueraFK')->references('idDisquera')->on('disqueras');
                $table->string('estadoArtista','10');
                $table->timestamps();
            });
        }
    {
        Schema::create('albumes', function (Blueprint $table) {
            $table->bigIncrements('idAlbum');            
            $table->string('nombreAlbum','70');
            $table->year('anioPublicacion');
            $table->unsignedBigInteger('idArtistaFK');            
            $table->foreign('idArtistaFK')->references('idArtista')->on('artistas');
            $table->unsignedBigInteger('idGeneroFK');
            $table->foreign('idGeneroFK')->references('idGenero')->on('generos');
            $table->string('estadoAlbum','10');
            $table->timestamps();
        });
    }
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->bigIncrements('idCancion');
            $table->string('nombreCancion','50');
            $table->date('fechaGrabacion');
            $table->string('DuracionCancion','5');
            $table->unsignedBigInteger('idAlbumFK');
            $table->foreign('idAlbumFK')->references('idAlbum')->on('albumes');
            $table->string('estadoCancion','10');
            $table->timestamps();
        });
    }    
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artistas');
        Schema::dropIfExists('disqueras');
        Schema::dropIfExists('generos');
        Schema::dropIfExists('canciones');
        Schema::dropIfExists('albumes');
    }
   

    
    
};
