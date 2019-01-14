<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomieObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homie_objects', function (Blueprint $table) {

            $table->increments('id');

            // internal generated code
            $table->string('propertyCode')->default('')->nullable();
            $table->string('propertyName' , 255)->default('')->nullable();

            $table->string('residentType')->default('unknown')->nullable();  // unknown , land , house + land , houses + land , apartment,  condominium , rooms , office , building

            $table->string('realEstateName', 50)->default('')->nullable();


            // shared structured, like rooms within the same building
            $table->string('sharedStructureCode' , 30)->default('')->nullable();
            $table->string('sharedStructureName' , 100)->default('')->nullable();



            $table->boolean('isForSale')->default(false)->nullable();
            $table->decimal('saleAmount' ,15 , 2)->nullable();
            $table->boolean('isForRent')->default(false)->nullable();            
            $table->decimal('rentRate' ,15 , 2)->nullable();



            $table->longText('description')->nullable();

            $table->string('district' , 30)->nullable();
            $table->string('province' , 30)->nullable();
            $table->string('postCode' , 5 )->nullable();

            $table->longText('notes')->nullable();


            
            // calculable fields
            $table->decimal('latLong' , 9 , 6)->nullable();

            $table->decimal('ratings')->nullable();
            $table->decimal('raters')->nullable();

            $table->decimal('views')->nullable();
            $table->decimal('wishlisted')->nullable();
            


            //staff  owner fields 
            $table->string('homieGroupOwner' , 30)->nullable();
            $table->string('homiePrimaryOwner' , 30)->nullable();

            // applying custom template?
            $table->string('customTemplate' , 50)->nullable();


            // about displaying stuff

            $table->string('pubishedStatus' , 30)->default('inactive'); // active , inactive ?
            $table->datetime('autoPublishedFrom')->nullable();
            $table->datetime('autoPublishedTo')->nullable();
            $table->datetime('publishedOn')->nullable();
            $table->string('publishedBy' , 30)->nullable();
            

            // system fields 
            $table->datetime('createdOn')->nullable();
            $table->string('createdBy' , 30)->default('');
            $table->datetime('updatedOn')->nullable();
            $table->string('updatedBy' , 30)->default('');
            $table->softDeletes('deletedOn')->nullable();
            $table->string('deletedBy' , 30)->default('');            
            $table->longText('comments')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homie_objects');
    }
}
