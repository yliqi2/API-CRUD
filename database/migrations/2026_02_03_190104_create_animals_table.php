<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id('animal_id');
            $table->string('name')->nullable(false);                                    
            $table->enum('species', ['dog', 'cat', 'hamster', 'bunny'])->nullable(false); 
            $table->float('weight');
            $table->text('disease');
            $table->longText('comments');
            $table->foreignId('person_id')->nullable()->constrained('person', 'person_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
