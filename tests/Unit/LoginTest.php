<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Address;
use App\Models\CreditCard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_valid_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);
        $response->assertRedirect('/home'); // vagy a főoldal útvonala
        $this->assertAuthenticatedAs($user);

   
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);
        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    /** @test */
    public function user_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');
        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    /** @test */
    public function user_can_add_and_remove_multiple_products_to_cart()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();

        // Termékek hozzáadása a kosárhoz
        $response = $this->post('/cart/add', [
            'product_id' => $product1->id,
            'quantity' => 2,
        ]);
        $response->assertStatus(200);

        $response = $this->post('/cart/add', [
            'product_id' => $product2->id,
            'quantity' => 1,
        ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas('carts', [
            'user_id' => $user->id,
            'product_id' => $product1->id,
            'quantity' => 2,
        ]);
        $this->assertDatabaseHas('carts', [
            'user_id' => $user->id,
            'product_id' => $product2->id,
            'quantity' => 1,
        ]);

        
        $response = $this->post('/cart/remove', [
            'product_id' => $product1->id,
        ]);
        $response->assertStatus(200);

        $this->assertDatabaseMissing('carts', [
            'user_id' => $user->id,
            'product_id' => $product1->id,
        ]);
    }

    /** @test */
    public function user_can_add_address_and_credit_card()
    {
        $user = User::factory()->create();
        $this->actingAs($user);


        $addressData = [
            'country' => 'Hungary',
            'city' => 'Budapest',
            'street' => 'Fő utca 1',
            'postal_code' => '1011',
        ];
        $response = $this->post('/addresses', $addressData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('addresses', array_merge($addressData, ['user_id' => $user->id]));


        $cardData = [
            'card_number' => '4111111111111111',
            'expiry_month' => '12',
            'expiry_year' => '2030',
            'cvv' => '123',
        ];
        $response = $this->post('/credit-cards', $cardData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('credit_cards', array_merge(['user_id' => $user->id], $cardData));
    }
}
