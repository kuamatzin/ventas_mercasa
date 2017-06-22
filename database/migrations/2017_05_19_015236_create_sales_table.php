<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->unsigned();
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');

            $table->string('client_name');
            $table->string('client_nss')->nullable();
            $table->string('client_id')->nullable();
            $table->date('client_birthdate')->nullable();
            $table->integer('water_contract')->nullable();
            $table->double('credit')->nullable();
            $table->text('new_pregrade')->nullable();
            $table->integer('advance')->nullable();
            $table->integer('saving')->nullable();
            $table->string('contract_number')->nullable();
            //Morado
            $table->text('commission')->nullable();
            //Naranja
            $table->integer('case_file')->nullable();
            $table->integer('appraisal_value')->nullable();
            $table->string('pdf_backup')->nullable();
            $table->integer('sic_format')->nullable();
            //Amarillo (Status)

            $table->integer('status')->nullable();


            $table->date('letter_commitment_subsidy_date')->nullable();
            $table->date('credit_record_date')->nullable();
            $table->date('judgment_date')->nullable();
            $table->date('freedom_tax_date')->nullable();
            $table->date('sign_date')->nullable();
            $table->date('deliver_date')->nullable();

            //Contrato Compra Venta
            $table->string('numero_escritura')->nullable();
            $table->date('fecha_escritura')->nullable();
            $table->string('numero_folio_mercantil')->nullable();
            $table->string('fecha_folio_mercantil')->nullable();
            $table->string('domicilio_fiscal')->nullable();
            $table->string('rfc_vendedor')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('rfc_cliente')->nullable();
            $table->string('esquema')->nullable();
            $table->double('precio_total_operacion')->nullable();
            $table->string('direccion_vendedor')->nullable();
            $table->string('direccion_comprador')->nullable();
            $table->string('estado_firma')->nullable();
            $table->date('fecha_firma_contrato')->nullable();

            //Contrato Compra Venta sin Enganche
            $table->string('documento_identificacion')->nullable();

            //Poliza de garantía
            $table->string('lugar_recepcion')->nullable();
            $table->date('fecha_recepcion')->nullable();

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
        Schema::dropIfExists('sales');
    }
}
