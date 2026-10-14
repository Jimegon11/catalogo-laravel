<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 15 Pro Max',
                'slug' => 'iphone-15-pro-max',
                'description' => 'El smartphone más avanzado de Apple con chip A17 Pro, cámara de 48 MP con zoom óptico 5x y pantalla Super Retina XDR de 6.7 pulgadas. Titanio de grado aeroespacial para máxima resistencia.',
                'price' => 1199.99,
                'original_price' => 1399.99,
                'category' => 'Electronics',
                'image_url' => '/img/iPhone 15 Pro Max.jpg',
                'stock' => 25,
                'is_featured' => true,
                'rating' => 4.9,
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'slug' => 'sony-wh-1000xm5',
                'description' => 'Auriculares inalámbricos con cancelación de ruido líder en la industria. Hasta 30 horas de batería, conexión multipoint y micrófono de alta calidad para llamadas nítidas.',
                'price' => 279.99,
                'original_price' => 349.99,
                'category' => 'Electronics',
                'image_url' => '/img/Sony WH-1000XM5.jpg',
                'stock' => 50,
                'is_featured' => true,
                'rating' => 4.8,
            ],
            [
                'name' => 'Nike Air Max 270',
                'slug' => 'nike-air-max-270',
                'description' => 'Zapatillas deportivas con la unidad Air más grande de Nike en el talón para máxima amortiguación. Parte superior de malla transpirable y suela resistente para uso diario.',
                'price' => 129.99,
                'original_price' => null,
                'category' => 'Clothing',
                'image_url' => '/img/Nike Air Max 270.jpg',
                'stock' => 80,
                'is_featured' => false,
                'rating' => 4.5,
            ],
            [
                'name' => 'Cafetera Nespresso Vertuo Pop',
                'slug' => 'cafetera-nespresso-vertuo-pop',
                'description' => 'Prepara café de barista en casa con la tecnología Centrifusion. Compatible con todas las cápsulas Vertuo. Calentamiento en 30 segundos y 5 tamaños de taza disponibles.',
                'price' => 89.99,
                'original_price' => 129.99,
                'category' => 'Home & Garden',
                'image_url' => '/img/Cafetera Nespresso Vertuo Pop.jpg',
                'stock' => 35,
                'is_featured' => false,
                'rating' => 4.6,
            ],
            [
                'name' => 'Samsung Galaxy Tab S9',
                'slug' => 'samsung-galaxy-tab-s9',
                'description' => 'Tablet Android premium con pantalla AMOLED de 11 pulgadas, procesador Snapdragon 8 Gen 2 y 256 GB de almacenamiento. Resistente al agua IP68 e incluye S Pen.',
                'price' => 749.99,
                'original_price' => 849.99,
                'category' => 'Electronics',
                'image_url' => '/img/Samsung Galaxy Tab S9.jpg',
                'stock' => 18,
                'is_featured' => true,
                'rating' => 4.7,
            ],
            [
                'name' => 'Yoga Mat Premium Lululemon',
                'slug' => 'yoga-mat-premium-lululemon',
                'description' => 'Esterilla de yoga profesional de 5mm de grosor con superficie antideslizante. Material ecológico y sostenible, lavable a máquina. Ideal para yoga, pilates y meditación.',
                'price' => 78.00,
                'original_price' => null,
                'category' => 'Sports',
                'image_url' => '/img/Yoga Mat Premium Lululemon.jpg',
                'stock' => 60,
                'is_featured' => false,
                'rating' => 4.4,
            ],
            [
                'name' => 'MacBook Air M3 13"',
                'slug' => 'macbook-air-m3-13',
                'description' => 'El portátil más fino y ligero de Apple con chip M3 para un rendimiento excepcional. 18 horas de batería, pantalla Liquid Retina de 13.6 pulgadas y cámara FaceTime 1080p.',
                'price' => 1099.99,
                'original_price' => 1199.99,
                'category' => 'Electronics',
                'image_url' => '/img/MacBook Air M3 13.jpg',
                'stock' => 12,
                'is_featured' => true,
                'rating' => 4.9,
            ],
            [
                'name' => 'Silla Ergonómica Herman Miller Aeron',
                'slug' => 'silla-ergonomica-herman-miller-aeron',
                'description' => 'La silla de oficina más reconocida del mundo. Diseño PostureFit SL para soporte lumbar, ajuste de 8 puntos y malla transpirable. Garantía de 12 años.',
                'price' => 1395.00,
                'original_price' => null,
                'category' => 'Home & Garden',
                'image_url' => '/img/Silla Ergonómica Herman Miller Aeron.jpg',
                'stock' => 8,
                'is_featured' => false,
                'rating' => 4.8,
            ],
            [
                'name' => 'Kindle Paperwhite Signature Edition',
                'slug' => 'kindle-paperwhite-signature-edition',
                'description' => 'El mejor lector de libros electrónicos con pantalla de 6.8 pulgadas sin reflejos, 32 GB de almacenamiento y carga inalámbrica. Resistente al agua para leer en cualquier lugar.',
                'price' => 149.99,
                'original_price' => 189.99,
                'category' => 'Books',
                'image_url' => '/img/Kindle Paperwhite Signature Edition.jpg',
                'stock' => 40,
                'is_featured' => false,
                'rating' => 4.7,
            ],
            [
                'name' => 'LEGO Technic Ferrari Daytona SP3',
                'slug' => 'lego-technic-ferrari-daytona-sp3',
                'description' => 'Set LEGO Technic de 3778 piezas inspirado en el Ferrari Daytona SP3. Incluye motor V12 con pistones móviles, suspensión funcional y detalles auténticos del superdeportivo.',
                'price' => 329.99,
                'original_price' => null,
                'category' => 'Toys',
                'image_url' => '/img/LEGO Technic Ferrari Daytona SP3.jpg',
                'stock' => 15,
                'is_featured' => false,
                'rating' => 4.9,
            ],
            [
                'name' => 'Chaqueta North Face Summit L3',
                'slug' => 'chaqueta-north-face-summit-l3',
                'description' => 'Chaqueta de aislamiento Ventrix para actividad intensa en frío. Tecnología de ventilación activa que se adapta a tu nivel de actividad. Ligera y compresible.',
                'price' => 220.00,
                'original_price' => 280.00,
                'category' => 'Clothing',
                'image_url' => '/img/Chaqueta North Face Summit L3.jpg',
                'stock' => 22,
                'is_featured' => false,
                'rating' => 4.6,
            ],
            [
                'name' => 'Roomba Combo j9+',
                'slug' => 'roomba-combo-j9-plus',
                'description' => 'Robot aspirador y friegasuelos con vaciado automático y lavado del moco. Evitación inteligente de objetos, mapeado de planta completo y control por voz compatible con Alexa.',
                'price' => 899.99,
                'original_price' => 1099.99,
                'category' => 'Home & Garden',
                'image_url' => '/img/Roomba Combo j9+.jpg',
                'stock' => 10,
                'is_featured' => true,
                'rating' => 4.5,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
