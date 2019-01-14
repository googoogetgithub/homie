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
            $table->string('propertyCode');
            $table->string('propertyName' , 255);

            $table->string('residentType');  // land , house + land , houses + land , apartment,  condominium , rooms , office , building

            $table->string('realEstateName', 50);


            // shared structured, like rooms within the same building
            $table->string('sharedStructureCode' , 30);
            $table->string('sharedStructureName' , 100);



            $table->boolean('isForSale');
            $table->decimal('saleAmount' ,15 , 2);
            $table->boolean('isForRent');            
            $table->decimal('rentRate' ,15 , 2);



            $table->longText('description');

            $table->string('district' , 30);
            $table->string('province' , 30);
            $table->string('postCode' , 5 );

            $table->longText('notes');


            
            // calculable fields
            $table->decimal('latLong' , 9 , 6);

            $table->decimal('ratings');
            $table->decimal('raters');

            $table->decimal('views');
            $table->decimal('wishlisted');
            


            //staff  owner fields 
            $table->string('homieGroupOwner' , 30);
            $table->string('homiePrimaryOwner' , 30);

            // applying custom template?
            $table->string('customTemplate' , 50);


            // about displaying stuff

            $table->string('pubishedStatus' , 30); // active , inactive ?
            $table->datetime('autoPublishedFrom');
            $table->datetime('autoPublishedTo');
            $table->datetime('publishedOn');
            $table->string('publishedBy' , 30);
            

            // system fields 
            $table->timestamps('createdOn');
            $table->string('createdBy' , 30);
            $table->timestamps('updatedOn');
            $table->string('updatedBy' , 30);
            $table->softDeletes('deletedOn');
            $table->string('deletedBy' , 30);            
            $table->longText('comments');

            
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
