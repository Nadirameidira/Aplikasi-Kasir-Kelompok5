<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Customer;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        //isi produk
        $masterProduk = [
            'Minuman' => [
                'Aqua Air Mineral Botol 330ml', 'Aqua Air Mineral Botol 600ml', 'Aqua Air Mineral Botol 1500ml', 'Le Minerale Botol 600ml', 'Le Minerale Botol 1500ml',
                'Vit Air Mineral 600ml', 'Pristine 8.6+ Air Mineral 400ml', 'Ades Air Mineral 600ml', 'Nestle Pure Life 600ml', 'Amidis Air Mineral 600ml',
                'Teh Pucuk Harum Jasmine 350ml', 'Teh Botol Sosro Kotak 330ml', 'Teh Botol Sosro Botol 450ml', 'Teh Kotak Sosro Jasmine 300ml', 'Frestea Green Tea Honey 500ml',
                'Nu Green Tea Honey 450ml', 'Coca Cola Carbonated Can 330ml', 'Coca Cola Botol 390ml', 'Coca Cola Botol Besar 1.5L', 'Sprite Carbonated Can 330ml',
                'Sprite Botol 390ml', 'Sprite Botol Besar 1.5L', 'Fanta Strawberry Can 330ml', 'Fanta Strawberry Botol 390ml', 'Pocari Sweat Isotonik Botol 500ml',
                'Pocari Sweat Isotonik Kaleng 330ml', 'Mizone Lychee Isotonik 500ml', 'Hydro Coco Original 250ml', 'Bear Brand Susu Steril Kaleng 189ml', 'Ultra Milk Full Cream 250ml',
                'Ultra Milk Rasa Cokelat 250ml', 'Ultra Milk Rasa Strawberry 200ml', 'Ultra Milk Full Cream Kotak 1L', 'Ultra Milk Rasa Cokelat Kotak 1L', 'Indomilk Susu Cokelat Botol 190ml',
                'Frisian Flag UHT Swiss Chocolate 225ml', 'Cimory Yogurt Drink Strawberry 250ml', 'Cimory Yogurt Drink Blueberry 250ml', 'Yakult Susu Fermentasi Pack (5 pcs)', 'Buavita Jus Jambu Kotak 250ml',
                'Buavita Jus Mangga Kotak 250ml', 'ABC Juice Apple Kotak 250ml', 'Floridina Orange Juice Botol 350ml', 'Minute Maid Pulpy Orange Botol 300ml', 'Nescafe Original Kopi Kaleng 240ml',
                'Nescafe Latte Kopi Kaleng 240ml', 'Kopiko 78°C Coffee Drink Botol 240ml', 'Good Day Botol Avocado Mocacino 250ml', 'Luwak White Koffie Original Botol 220ml', 'Mogu Mogu Nata de Coco Drink 320ml'
            ],
            'Makanan & Bahan Pokok' => [
                'Indomie Goreng Spesial Sachet', 'Indomie Kuah Rasa Ayam Bawang', 'Indomie Kuah Rasa Soto Mie', 'Indomie Goreng Rasa Rendang', 'Indomie Goreng Rasa Mie Aceh',
                'Mie Sedaap Goreng Sachet', 'Mie Sedaap Kuah Rasa Soto', 'Pop Mie Instan Rasa Baso Cup', 'Pop Mie Instan Rasa Ayam Cup', 'Samyang Hot Chicken Ramen Original',
                'Beras Sentra Ramos Super 5kg', 'Beras Rojo Lele Premium 5kg', 'Beras Sania Premium 5kg', 'Minyak Goreng Bimoli Pouch 1L', 'Minyak Goreng Bimoli Pouch 2L',
                'Minyak Goreng Sania Pouch 2L', 'Minyak Goreng Filma Pouch 2L', 'Gula Pasir Putih Gulaku Premium 1kg', 'Gula Pasir Lokal Kebon Agung 1kg', 'Garam Dapur Beriodium Refina 500g',
                'Kecap Manis Bango Pouch 550ml', 'Kecap Manis Bango Botol 135ml', 'Kecap Manis ABC Pouch 520ml', 'Saus Sambal ABC Extra Pedas Botol 335ml', 'Saus Tomat ABC Botol 335ml',
                'Saus Sambal Indofood Pedas Dahsyat', 'Blue Band Serbaguna Margarin 200g', 'Mentega Simas Palmia 200g', 'Minyak Wijen ABC Botol 195ml', 'Saus Tiram Saori Botol 133ml',
                'Tepung Terigu Segitiga Biru 1kg', 'Tepung Terigu Cakra Kembar Premium 1kg', 'Tepung Sasa Bumbu Serbaguna 200g', 'Sasa Santan Kelapa Cair 65ml', 'Kara Santan Kelapa Alami 65ml',
                'Masako Penyedap Rasa Ayam Kaldu 250g', 'Royco Penyedap Rasa Sapi Kaldu 250g', 'Ladaku Merica Bubuk Sachet Pack', 'AJI-NO-MOTO Penyedap Rasa 100g', 'BonCabe Sambal Tabur Level 15 Botol',
                'Sarden ABC Saus Tomat Kaleng 425g', 'Sarden Botan Saus Tomat Kaleng Besar', 'Kornet Sapi Pronas Kaleng 340g', 'Tuna Kaleng Sun Bell Original', 'Makaroni La Fonte Pasta Box 450g',
                'Spageti La Fonte Pasta Box 450g', 'Kraft Cheddar Cheese Blok 160g', 'Prochiz Cheddar Cheese Blok 160g', 'Meiji Slices Cheese Pack 5 Slices', 'Susu Kental Manis Frisian Flag Putih 370g'
            ],
            'Snack & Jajanan' => [
                'Chitato Keripik Kentang Sapi Panggang 68g', 'Chitato Keripik Kentang Ayam Bumbu 68g', 'Lays Keripik Kentang Rumput Laut 68g', 'Pringles Potato Crisps Original 107g', 'Pringles Sour Cream & Onion 107g',
                'Qtela Keripik Singkong Original 60g', 'Qtela Keripik Singkong Barbeque 60g', 'Taro Net Snack Rumput Laut 36g', 'Taro Net Potato Barbeque Snack 36g', 'Twistko Jagung Bakar Snack Snack 70g',
                'Piattos Keripik Kentang Sapi Panggang 75g', 'Kusuka Keripik Singkong Saus Balado 180g', 'Silverqueen Milk Chocolate Cashew 58g', 'Silverqueen Chocolate Almond 58g', 'Cadbury Dairy Milk Chocolate 62g',
                'Beng Beng Cokelat Wafer Individual 20g', 'Beng Beng Share It Pouch Pack', 'KitKat Chocolate 4 Fingers 35g', 'Top Cokelat Crispy Bar Wafer', 'Chocolatos Wafer Roll Chocolate Box',
                'Oreo Sandwich Biscuits Vanilla 133g', 'Oreo Sandwich Biscuits Chocolate 133g', 'Nextar Brownies Choco Delight Box', 'Biskuat Biskuit Original Energi 133g', 'Roma Kelapa Biskuit Klasik 300g',
                'Roma Malkist Crackers Original', 'Roma Malkist Crackers Rasa Abon', 'Nabati Wafer Richoco Keju 145g', 'Nabati Wafer Richoco Cokelat 145g', 'Tango Wafer Renyah Vanilla 130g',
                'Tango Wafer Renyah Cokelat 130g', 'Gery Saluut Malkist Cokelat Pack', 'Khong Guan Assorted Biscuit Kaleng Merah', 'Good Time Choco Chip Cookies 72g', 'Ritz Sandwich Crackers Cheese 118g',
                'Kinder Joy Boys Surprise Egg 20g', 'Kinder Joy Girls Surprise Egg 20g', 'Chuba Keripik Singkong Rasa Balado', 'JetZ Choco Arm Crunchy Snack', 'Cheetos Puff Jagung Bakar Snack',
                'Kusuka Keripik Singkong Original 180g', 'Chiki Balls Keju Snack Jadul', 'French Fries 2000 Snack Colek Saus', 'Tic Tac Pilus Sapi Panggang 90g', 'Pilus Garuda Rasa Original Pack',
                'Kacang Mayasi Pedas Manis Snack', 'Kacang Garuda Rosta Bawang 70g', 'Popcorn Oishi Caramel Snack', 'Marshmallow Yupi Gummy Candy', 'Yupi Gummy Fangs Permen Jeli'
            ],
            'Perawatan Pribadi' => [
                'Sabun Mandi Lifebuoy Red Bar 85g', 'Sabun Mandi Lifebuoy Blue Bar 85g', 'Sabun Nuvo Cair Anti Bakteri Refill 450ml', 'Sabun Biore Body Foam Pure Mild 450ml', 'Sabun Dettol Original Anti Bakteri 100g',
                'Shampoo Pantene Anti Dandruff Pro-V 150ml', 'Shampoo Clear Men Cool Sport Menthol 160ml', 'Shampoo Sunsilk Black Shine Activ-Infusion 160ml', 'Shampoo Head & Shoulders Cool Menthol 160ml', 'Conditioner Pantene Miracle Hair 150ml',
                'Pasta Gigi Pepsodent Pencegah Gigi Berlubang 190g', 'Pasta Gigi CloseUp Fresh Blast 160g', 'Pasta Gigi Sensodyne Fresh Mint Anti Ngilu', 'Sikat Gigi Oral-B Classic Soft Pack', 'Sikat Gigi Pepsodent Double Care Sensitive',
                'Sabun Muka Biore Men Facial Foam 100g', 'Sabun Muka Garnier Bright Complete Facial Wash', 'Sabun Muka Pond\'s Pure White Beauty 100g', 'Nivea Body Lotion Moisture Care 200ml', 'Vaseline Healthy White UV Lightening 200ml',
                'Citra Body Lotion Glowing White Sakura 200ml', 'Deodorant Rexona Men Ice Cool Roll On', 'Deodorant Rexona Women Free Spirit Roll On', 'Axe Body Spray Spray Black Parfum 150ml', 'Casablanca Spray Cologne Glass Blue 100ml',
                'Gatsby Styling Pomade Perfect Rise 75g', 'Makarizo Hair Energy Scentsations 100ml', 'Tissue Basah Mitu Baby Wipes Ganti Popok', 'Tissue Basah Paseo Anti Bakteri Pack', 'Kapas Kecantikan Sariayu Pengangkat Kotoran',
                'Pembersih Wajah Oval Face Toner Lemon 150ml', 'Micellar Water Garnier Cleansing Rose Water', 'Sunscreen Wardah UV Shield SPF 30 Gel', 'Lip Balm Wardah Everyday Moisture', 'Bedak Marcks Original Powder Classic 40g',
                'Bedak Pigeon Compact Powder Teenagers', 'Hand Sanitizer Dettol Gel Saku 50ml', 'Sabun Cuci Tangan Lifebuoy Handwash Total 10', 'Listerine Cool Mint Mouthwash Antiseptik 250ml', 'Betadine Antiseptic Ointment Salep Luka',
                'Softex Daun Sirih Pembalut Wing 23cm', 'Laurier Active Fit Pantyliner Non-Perfume', 'Charm Body Fit Extra Maxi Wing Super', 'Popok Bayi MamyPoko Pants Standar M', 'Popok Bayi Merries Pants Good Skin L', 'Hansaplast Kain Elastis Plester Luka Box', 'Minyak Kayu Putih Cap Lang Asli 60ml', 'Minyak Telon Konicare Alami Plus 60ml', 'Salonpas Koyo Pereda Nyeri Hijau Pack', 'Fresh Care Citrus Aromatherapy Minyak Angin Roll'
            ],
            'Kebutuhan Rumah Tangga' => [
                'Deterjen Rinso Anti Noda Bubuk 700g', 'Deterjen Rinso Cair Konsentrat Pouch 750ml', 'Deterjen Attack Sensor Matic Cair Botol', 'Deterjen So Klin Antisep Bubuk Proteksi', 'Pelembut Pakaian Downy Mystique Pouch',
                'Pewangi Molto Sekali Bilas All-in-One', 'So Klin Pembersih Lantai Citrus Pouch 780ml', 'Super Pell Pembersih Lantai Lemon 780ml', 'Wipol Karbol Wangi Cemara Pouch 750ml', 'Harpic Penghancur Kerak WC Botol Kuat',
                'Sabun Cuci Piring Mama Lemon Jeruk Nipis', 'Sabun Cuci Piring Sunlight Lime Pouch 750ml', 'Mama Pencuci Buah dan Sayur Botol Alami', 'Tissue Paseo Facial Ultra Soft 250 Sheets', 'Tissue Nice Facial Ekonomis Pack 250s',
                'Stella Pengharum Ruangan Spray Lemon 400ml', 'Glade Automatic Refill Ocean Escape 225ml', 'Baygon Aerosol Citrus Obat Nyamuk Spray 600ml', 'Hit Aerosol Lily Blossom Obat Nyamuk Spray', 'Vaporizer Elektrik Hit Anti Nyamuk Alat',
                'Kamper Bagus Anti Ngengat Warna Warni', 'Swallow Kamper Toilet Blok Pewangi Kamar Mandi', 'Spons Cuci Piring Scotch-Brite Anti Gores', 'Sabut Stainless Amway Pengikis Kerak Wajan', 'Kain Lap Microfiber Serbaguna Pembersih',
                'Sapu Lantai Nilon Awet Lion Star', 'Pengki Plastik Lion Star Penampung Sampah', 'Sikat Baju Bahan Kayu Bulu Kuat', 'Ember Plastik Tebal 3 Galon Serbaguna', 'Pompa Air Galon Elektrik Recharger USB',
                'Lakban Bening Nachi Tape Isolasi Besar', 'Gunting Kantor Tajam Joyko Stainless Steel', 'Stepler Staples Kantor Max HD-10 Jepang', 'Baterai ABC Alkaline Ukuran AA isi 4', 'Baterai ABC Alkaline Ukuran AAA isi 4',
                'Baterai Panasonic Coin Lithium Remote Mobil', 'Lilin Mati Lampu Putih Pack isi 10', 'Korek Api Gas Tokai Original Standar', 'Tusuk Gigi Steril Bahan Kayu Higienis Tub', 'Sedotan Plastik Steril Bungkus Kertas Pack',
                'Plastik Sampah Hitam Besar Ukuran HD', 'Aluminium Foil Roll Pembungkus Makanan', 'Cling Wrap Roll Plastik Pembungkus Buah', 'Sarung Tangan Plastik Steril Sekali Pakai', 'Masker Sensi 3-Ply Earloop Box isi 50',
                'Pemutih Pakaian Bayclin Lemon Botol 500ml', 'Vanish Cair Penghilang Noda Pakaian Pouch', 'Penghilang Lembab Lemari Bagus Kotak Serap', 'Pewangi Lemari Dahlia Gantung Wangi', 'Sabun Colek Ekonomi Hijau Pembersih Gila'
            ]
        ];

        $skuCounter = 1;

        //ngeloop buat masukin data produk ke database
        foreach ($masterProduk as $kategori => $daftarBarang) {
            foreach ($daftarBarang as $nama) {
                // Skema harga bervariasi sesuai kategori biar logis
                if ($kategori == 'Minuman') $harga = rand(4, 40) * 500; // Rp 2.000 - Rp 20.000
                elseif ($kategori == 'Makanan & Bahan Pokok') $harga = rand(6, 120) * 500; // Rp 3.000 - Rp 60.000
                elseif ($kategori == 'Snack & Jajanan') $harga = rand(4, 30) * 500; // Rp 2.000 - Rp 15.000
                else $harga = rand(10, 160) * 500; // Rp 5.000 - Rp 80.000

                $stok = rand(20, 150);
                $sku = 'SKU-' . str_pad($skuCounter++, 4, '0', STR_PAD_LEFT);

                Product::create([
                    'name' => $nama,
                    'sku' => $sku,
                    'price' => $harga,
                    'stock' => $stok,
                    'category' => $kategori
                ]);
            }
        }

        //seeder pelanggan
        $pelanggan = [
            ['name' => 'Budi Santoso', 'email' => 'budi@mail.com', 'phone' => '0812345678', 'address' => 'Jakarta'],
            ['name' => 'Siti Aminah', 'email' => 'siti@mail.com', 'phone' => '0898765432', 'address' => 'Tangerang'],
            ['name' => 'Andi Wijaya', 'email' => 'andi@mail.com', 'phone' => '0856123456', 'address' => 'Bekasi'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@mail.com', 'phone' => '0877112233', 'address' => 'Depok'],
            ['name' => 'Rian Hidayat', 'email' => 'rian@mail.com', 'phone' => '0813998877', 'address' => 'Bogor']
        ];

        foreach ($pelanggan as $p) {
            Customer::create($p);
        }
    }
}