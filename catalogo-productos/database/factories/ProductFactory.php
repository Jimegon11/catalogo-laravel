<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(nb: 3, asText: true);
        $price = $this->faker->randomFloat(2, 10, 500);
        $hasDiscount = $this->faker->boolean(40);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(3),
            'price' => $price,
            'original_price' => $hasDiscount ? round($price * $this->faker->randomFloat(2, 1.1, 1.5), 2) : null,
            'category' => $this->faker->randomElement(['Electronics', 'Clothing', 'Home & Garden', 'Sports', 'Books', 'Toys']),
            'image_url' => null,
            'stock' => $this->faker->numberBetween(0, 100),
            'is_featured' => $this->faker->boolean(20),
            'rating' => $this->faker->randomFloat(1, 1, 5),
        ];
    }

    /**
     * Indicate that the product is featured.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }

    /**
     * Indicate that the product is out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }
}
