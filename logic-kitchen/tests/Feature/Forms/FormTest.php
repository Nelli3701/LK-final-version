<?php

namespace Tests\Feature\Forms;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmission;

class FormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_gift_form_successfully()
    {
        Mail::fake(); // Подменяем отправку почты

        $response = $this->post(route('post_form'), [
            'name' => 'Test User',
            'phone' => '+7(123) 456-78-90',
            'gift' => 'Мойка',
            'form_type' => 'giftform',
        ]);

        // Проверяем, что почта была отправлена
        Mail::assertSent(FormSubmission::class, function ($mail) {
            return $mail->hasTo('logic-kitchen@yandex.ru') &&
                $mail->data['name'] === 'Test User' &&
                $mail->data['phone'] === '+7(123) 456-78-90' &&
                $mail->data['gift'] === 'Мойка';
        });

        $response->assertRedirect(route('thankyou'));
    }

    /** @test */
    public function it_validates_main_form_successfully()
    {
        Mail::fake(); // Подменяем отправку почты

        $response = $this->post(route('post_form'), [
            'name' => 'Test User',
            'phone' => '+7(123) 456-78-90',
            'form_type' => 'mainform',
        ]);

        // Проверяем, что почта была отправлена
        Mail::assertSent(FormSubmission::class, function ($mail) {
            return $mail->hasTo('logic-kitchen@yandex.ru') &&
                $mail->data['name'] === 'Test User' &&
                $mail->data['phone'] === '+7(123) 456-78-90' &&
                !isset($mail->data['gift']); // Проверяем, что gift отсутствует
        });

        $response->assertRedirect(route('thankyou'));
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $response = $this->post(route('post_form'), []);
        $response->assertSessionHasErrors(['name', 'phone', 'form_type']);
    }

    /** @test */
    public function it_validates_phone_format()
    {
        $response = $this->post(route('post_form'), [
            'name' => 'Test User',
            'phone' => 'invalid_phone',
            'form_type' => 'mainform',
        ]);

        $response->assertSessionHasErrors('phone');
    }
}
