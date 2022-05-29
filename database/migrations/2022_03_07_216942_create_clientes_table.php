<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cliente;
class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            //1ra columna
            $table->id();
            $table->string('dni')->nullable();
            $table->string('nombres');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('zona')->nullable();
            $table->string('tipodocumento')->nullable();          
            $table->string('numdocumento')->nullable();
            $table->timestamp('fechadeventa')->nullable();
            $table->timestamp('fechaderecepcion')->nullable();
            $table->string('estadocivil')->nullable();
            $table->string('pagoadministrativo')->nullable();          
            $table->string('tipoventa')->nullable();
            $table->decimal('montodelacompra',8,2)->nullable();

            //2da columna
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('chasis')->nullable();
            $table->string('motor')->nullable();
            $table->string('color')->nullable();
            $table->string('anio')->nullable();
            $table->string('categoria')->nullable();
            $table->string('dua')->nullable();
            $table->string('item')->nullable();
            $table->string('certificado')->nullable();
            $table->string('pdfcertificado')->nullable();

            //3ra columna
            $table->string('oficinaregistral')->nullable();
            $table->date('fechadeingreso')->nullable();
            $table->string('titulo')->nullable();
            $table->string('codigodeverificacion')->nullable();
            $table->string('recibo')->nullable();           
            $table->decimal('importe',8,2)->nullable();
            $table->string('statussunarp')->nullable();
            $table->string('pdfobservacion')->nullable();
            $table->date('fechadeobservacion')->nullable();

            //4ta columna
            $table->string('pdftarjetadepropiedad')->nullable();
            $table->string('pdfcargodeenvio')->nullable();
            $table->string('numerodeplaca')->nullable();
            $table->date('fechadeenvio')->nullable();
            $table->string('guiaderemision')->nullable();  
            $table->string('statusfinal')->nullable();
            $table->text('observacion')->nullable();  
            //fin de 4ta columna


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           // $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            
            //$table->unsignedBigInteger('zona_id')->nullable(); 
            //$table->enum('tipoventa', [cliente::CONFORME, cliente::NOFIGURAPAGOADMIN])->nullable();
            // $table->enum('estadocivil', [cliente::SOLTERO, cliente::CASADO, cliente::VIUDO, cliente::DIVORCIADO])->nullable();
            //$table->enum('pagoadministrativo', [cliente::CONFORME, cliente::NOFIGURAPAGOADMIN])->nullable();
            // $table->string('fechadeventa'); timestamp('published_at')->nullable();
            //$table->enum('tipodocumento', [cliente::FACTURA, cliente::BOLETA])->default(cliente::BOLETA)->nullable();
            //////$table->timestamp('certificadofecha')->nullable();
            // $table->string('statusinscrito')->nullable();
            // $table->unsignedBigInteger('marca_id');
           //$table->date('fechadepagodeplaca')->nullable();
           //$table->date('fechaderecojodeplaca')->nullable();
           //$table->string('reporteduaitem')->nullable();
           // $table->string('reportecertificadofecha')->nullable();
           //         
            //$table->string('pdf2')->nullable();
            //$table->string('pdf3')->nullable();
            //$table->string('numerodetitulo')->nullable();
            //$table->string('codigoverificacion')->nullable();
            //$table->string('pdfstatus')->nullable();  
            //$table->date('fechadevencimiento')->nullable();
            //$table->date('fechaingresolevantaobservacion')->nullable();
            //$table->date('fecingresolevanta')->nullable();
            //$table->string('statusreingresado')->nullable();
            //$table->string('tipovehiculo')->nullable();

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
        Schema::dropIfExists('clientes');
    }
}
