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
        Schema::create('mpesa_c2_c_s', function (Blueprint $table) {
            $table->id('MpesaTransactionId');
            $table->string('TransactionType'); // C2C transaction
            $table->string('TransID'); // The unique identifier for each transaction request.
            $table->string('TransTime'); // The timestamp of the transaction.
            $table->decimal('TransAmount', 8, 2); // The transaction amount.                $table->string('SenderMSISDN'); // The phone number sending the transaction.
            $table->string('RecipientMSISDN'); // The phone number receiving the transaction.
            $table->string('SenderFirstName'); // The first name of the sender.
            $table->string('SenderMiddleName')->nullable(); // The middle name of the sender.
            $table->string('SenderLastName'); // The last name of the sender.
            $table->string('RecipientFirstName'); // The first name of the recipient.
            $table->string('RecipientMiddleName')->nullable(); // The middle name of the recipient.
            $table->string('RecipientLastName'); // The last name of the recipient.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_c2_c_s');
    }
};
