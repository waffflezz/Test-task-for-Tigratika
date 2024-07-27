<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainProducts = [];
        for ($i = 1; $i <= 5; $i++) {
            $mainProducts[] = [
                'name' => 'Product ' . $i,
                'count' => $i * 2,
                'source' => 'Source ' . $i,
                'laser' => $i === 2 ? null : $i + 4,
                'welding' => $i === 2 ? null : $i + 2,
                'assembling' => $i,
                'electro' => $i === 3 ? null : $i + 3,
                'position' => $i,
                'display' => true,
                'product_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($mainProducts);

        $mainProductsIds = DB::table('products')
            ->whereIn('name', array_column($mainProducts, 'name'))
            ->pluck('id')
            ->toArray();

        $childProducts = [];
        foreach ([$mainProductsIds[0], $mainProductsIds[1]] as $index => $parentId) {
            $childCount = $index === 0 ? 2 : 3;
            for ($j = 1; $j <= $childCount; $j++) {
                $childProducts[] = [
                    'name' => 'Child Product ' . ($index + 1) . '.' . $j,
                    'count' => 5,
                    'source' => 'Source ' . ($index + 1) . '.' . $j,
                    'laser' => 1,
                    'welding' => 1,
                    'assembling' => 1,
                    'electro' => 1,
                    'position' => $j,
                    'display' => false,
                    'product_id' => $parentId,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        DB::table('products')->insert($childProducts);

        $innerAndOuterProduct = [
            'name' => 'test',
            'count' => 50,
            'source' => 'Test Source',
            'laser' => null,
            'welding' => null,
            'assembling' => null,
            'electro' => null,
            'position' => 6,
            'display' => true,
            'product_id' => $mainProductsIds[2],
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('products')->insert($innerAndOuterProduct);
    }
}
