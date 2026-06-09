<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public Customer $customer;
    public string $verificationUrl;

    public function __construct(Customer $customer, string $verificationUrl)
    {
        $this->customer = $customer;
        $this->verificationUrl = $verificationUrl;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirme seu cadastro - Ative sua conta',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            view: 'emails.verify-customer',
        );
    }
}