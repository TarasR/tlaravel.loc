<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->post('/contact', []);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_contact_form_sends_mail_and_redirects_with_flash_message(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'John Tester',
            'email' => 'john@example.com',
            'message' => 'Hello from test',
        ];

        $response = $this->post('/contact', $payload);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('message', 'Your message has been sent!');

        Mail::assertSent(ContactMail::class, function (ContactMail $mail) use ($payload) {
            return $mail->data['name'] === $payload['name']
                && $mail->data['email'] === $payload['email']
                && $mail->data['message'] === $payload['message'];
        });
    }
}
