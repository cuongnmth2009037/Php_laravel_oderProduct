<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//       DB::statement('SET FOREIGN_KEY_CHECKS = 0');
       DB::table('products')->truncate();
       DB::table('products')->insert([
           [
               'name'=>'Trò Chơi Bắn Bi Pinpall game',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/m/y/mykingdom-yx1108002_3_.jpg',
               'price'=>649000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Đồ chơi lắp ráp dùng năng lượng mặt trời - Xe và Thuyền',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/1/4/1423001071_10_.jpg',
               'price'=>459000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Robot Nắp Chai Raijin Lôi Thần',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/1/7/175810_5_.jpg',
               'price'=>329000,
               'origin'=>'Việt Nam',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'JW Khủng Long Săn Mồi Carnotaurus TORO',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/g/n/gnl07_4_.jpg',
               'price'=>678000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Búp bê Barbie Extra RAINBOW BRAIDS',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/g/r/grn29_grn27_4_.jpg',
               'price'=>839000,
               'origin'=>'Indonesia',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Trò chơi trí tuệ UNO ATTACK - Phiên bản MÁY CHIA THẺ TỰ ĐỘNG',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/s/p/spin_prod_543114201.jpg',
               'price'=>929000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Máy chụp hình chống nước - Vàng cá tính',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/y/t/yt007-yl-1.png',
               'price'=>999000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Máy chụp hình chống nước - Hồng dịu dàng',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/y/t/yt007-pk-1.jpg',
               'price'=>599000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Búp bê thời trang Barbie - Plaid Dress',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/0/6/06_242_1.jpg',
               'price'=>369000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Mô hình xe mô tô 1:12 dòng KTM 1290 Super Duke R',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/1/3/13065_4_.jpg',
               'price'=>279000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Máy ATM mini hồng xinh xắn',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/w/s/ws5376_2_.jpg',
               'price'=>899000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Khủng long bạo chúa T-rex',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/7/1/7127_4_.jpg',
               'price'=>359000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Bộ vòng tay mùa hè náo nhiệt',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/1/3/1317mir_4_.jpg',
               'price'=>219000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Máy tính bảng đầu tiên cho bé',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/0/4/04_232.jpg',
               'price'=>559000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Máy xay sinh tố mini Hồng',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/a/1/a1007-3pk_4_.jpg',
               'price'=>299000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Bộ làm bếp 3 món mini Hồng',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/c/b/cb-01pk_2_.jpg',
               'price'=>799000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Mô hình xe hơi trớn 2020 Chevrolet Corvette Stingray Couple',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/1/9/19108_2_.jpg',
               'price'=>139000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Ba lô Fancy - Boba Dễ Thương',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/b/c/bc1208_2.jpg',
               'price'=>769000,
               'origin'=>'Việt Nam',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Khủng long bay PTERANODON',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/g/j/gjn68_gjn64_2.jpg',
               'price'=>699000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Khủng long ăn cỏ SINOCERATOPS',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/g/m/gmc98_gjn64_2.jpg',
               'price'=>699000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Khủng long săn mồi tốc độ CLAW SLASH',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/h/b/hbx32_gcr54_2.jpg',
               'price'=>499000,
               'origin'=>'Việt Nam',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Combo xe buýt hai tầng- xe jeep',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/c/b/cb-912a-390a_3_.jpg',
               'price'=>399000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ],
           [
               'name'=>'Robot biến hình điều khiển từ xa STRIKE',
               'images'=>'https://u6wdnj9wggobj.vcdn.cloud/media/catalog/product/cache/7c9924b6276ad76a951c1e786fcf2062/v/t/vtk4_3_.jpg',
               'price'=>749000,
               'origin'=>'Trung Quốc',
               'created_at'=> Carbon::now()
           ]
       ]);
    }
}
