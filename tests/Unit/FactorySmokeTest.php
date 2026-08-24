<?php

namespace Tests\Unit;

use App\Country;
use App\Product;
use App\User;
use Tests\TestCase;

class FactorySmokeTest extends TestCase
{
    public function test_user_factory_can_make_model(): void
    {
        $user = User::factory()->make();

        $this->assertNotEmpty($user->name);
        $this->assertNotEmpty($user->email);
    }

    public function test_country_factory_can_make_model(): void
    {
        $country = Country::factory()->make();

        $this->assertNotEmpty($country->name);
    }

    public function test_product_factory_can_make_model(): void
    {
        $product = Product::factory()->make();

        $this->assertNotEmpty($product->title);
        $this->assertNotEmpty($product->slug);
        $this->assertIsInt($product->price);
    }
}
