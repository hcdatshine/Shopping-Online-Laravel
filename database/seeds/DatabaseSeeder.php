<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TypeProductsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(SlideSeeder::class);
    }
}

class UserSeeder extends Seeder {
    public function run(){
        DB::table('user')->insert([
        ['name' => 'Đạt Shine','email' =>'datvuquocbk@gmail.com','phone' => '0949686103','remember_token' =>'adfasdfakjlkzxczc','address' => 'nhà 12 Tô Vĩnh Diện','password' => bcrypt('123456'),'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Đạt Vũ','email' =>'hc.datshine@gmail.com','phone' => '0949686103','remember_token' =>'adfasdfakjlkzxczc','address' => 'nhà 12 Tô Vĩnh Diện','password' => bcrypt('123456'),'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Hà Chi','email' =>'hachi9225@gmail.com','phone' => '0949686103','remember_token' =>'adfasdfakjlkzxczc','address' => 'nhà 12 Tô Vĩnh Diện','password' => bcrypt('123456'),'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Đoàn Phi','email' =>'phivandoanbk@gmail.com','phone' => '0949686103','remember_token' =>'adfasdfazxcvkjlk','address' => 'nhà 12 460/44 Khương Đình','password' => bcrypt('123456'),'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Minh Công','email' =>'minhcongdoanbk@gmail.com','phone' => '0949686103','remember_token' =>'adfasdfakzxcvzxjlk','address' => 'nhà 12 Hoàng Văn Thái','password' => bcrypt('123456'),'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['name' => 'Admin','email' =>'admin@gmail.com','phone' => '0949686103','remember_token' =>'adfasdfakjlzxcvzxcvzk','address' => 'nhà 40 Thái Hà','password' => bcrypt('123456'),'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);
    }
}

class NewsSeeder extends Seeder {
    public function run(){
        DB::table('news')->insert([
            ['title'=>'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam','content'=>'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ','image'=>'sample1.jpg','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['title'=>'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát','content'=>'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất.','image'=>'sample2.jpg','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['title'=>'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng','content'=>'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc.','image'=>'sample3.jpg','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['title'=>'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.','content'=>'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu','image'=>'sample4.jpg','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['title'=>'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình','content'=>'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ','image'=>'sample5.jpg','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
class SlideSeeder extends Seeder {
    public function run(){
        DB::table('slide')->insert([
            ['image'=>'banner1.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['image'=>'banner2.jpg','created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['image'=>'banner3.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['image'=>'banner4.jpg','created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
class TypeProductsSeeder extends Seeder {
    public function run(){
        DB::table('type_products')->insert([
            ['name'=>'Bánh mặn', 'description'=>'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.', 'image'=>'banh-man-thu-vi-nhat-1.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Bánh ngọt', 'description'=> 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. ', 'image'=>'20131108144733.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Bánh trái cây', 'description'=>'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', 'image'=>'banhtraicay.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Bánh kem', 'description'=>'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', 'image'=>'banhkem.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Bánh crepe', 'description'=> 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'image'=>'crepe.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Bánh Pizza', 'description'=>'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.', 'image'=>'pizza.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Bánh su kem', 'description'=>'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.', 'image'=>'sukemdau.jpg', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}

class ProductsSeeder extends Seeder {
    public function run(){
        DB::table('product')->insert([
            ['name'=> 'Bánh Crepe Sầu riêng', 'id_type'=>5, 'description'=>'Bánh crepe sầu riêng nhà làm', 'unit_price'=>150000, 'image'=>'1430967449-pancake-sau-rieng-6.jpg', 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Crepe Chocolate', 'id_type'=>6, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=>'crepe-chocolate.jpg', 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Crepe Đào', 'id_type'=>5, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=>'crepe-dao.jpg', 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Crepe Dâu', 'id_type'=>5, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=>'crepedau.jpg', 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Crepe Pháp', 'id_type'=>5, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=>'crepe-phap.jpg', 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Crepe Táo', 'id_type'=>5, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=>'crepe-tao.jpg', 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Crepe Trà xanh', 'id_type'=>5, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=>'crepe-traxanh.jpg', 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Crepe Sầu riêng và Dứa', 'id_type'=>5, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=> 'saurieng-dua.jpg', 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Gato Trái cây Việt Quất', 'id_type'=>5, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=>'544bc48782741.png', 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh sinh nhật rau câu trái cây', 'id_type'=>5, 'description'=>'Bánh crepe nhà làm', 'unit_price'=>150000, 'image'=>'210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Chocolate Dâu','image'=>'banh kem sinh nhat.jpg', 'id_type'=>3, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Dâu III','image'=>'Banh-kem (6).jpg', 'id_type'=>3, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Dâu I','image'=>'banhkem-dau.jpg', 'id_type'=>3, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh trái cây II','image'=>'banhtraicay.jpg', 'id_type'=>3, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Apple Cake','image'=>'Fruit-Cake_7979.jpg', 'id_type'=>3, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh ngọt nhân cream táo','image'=>'20131108144733.jpg', 'id_type'=>2, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Chocolate Trái cây','image'=>'Fruit-Cake_7976.jpg', 'id_type'=>2, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Chocolate Trái cây II','image'=>'Fruit-Cake_7981.jpg', 'id_type'=>2, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Peach Cake','image'=>'Peach-Cake_3294.jpg', 'id_type'=>2, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh bông lan trứng muối I','image'=>'banhbonglantrung.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh bông lan trứng muối II','image'=>'banhbonglantrungmuoi.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh French','image'=>'banh-man-thu-vi-nhat-1.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh mì Australia','image'=> 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh mặn thập cẩm','image'=>'Fruit-Cake.png', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Muffins trứng','image'=>'maxresdefault.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Scone Peach Cake','image'=>'Peach-Cake_3300.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh mì Loaf I','image'=> 'sli12.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Chocolate Dâu I','image'=>'sli12.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Trái cây I','image'=>'Fruit-Cake.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Trái cây II','image'=>'Fruit-Cake_7971.jpg', 'id_type'=>1, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Doraemon','image'=> 'p1392962167_banh74.jpg', 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Caramen Pudding','image'=> 'Caramen-pudding636099031482099583.jpg' , 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Chocolate Fruit','image'=>'chocolate-fruit636098975917921990.jpg' , 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Coffee Chocolate GH6','image'=>  'COFFE-CHOCOLATE636098977566220885.jpg', 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Mango Mouse','image'=> 'mango-mousse-cake.jpg' , 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Matcha Mouse','image'=> 'MATCHA-MOUSSE.jpg' , 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Flower Fruit','image'=> 'flower-fruits636102461981788938.jpg', 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Strawberry Delight','image'=> 'strawberry-delight636102445035635173.jpg' , 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh kem Raspberry Delight','image'=>'raspberry.jpg', 'id_type'=>4, 'description'=>'Bánh crepe nhà làm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Beefy Pizza','image'=> '40819_food_pizza.jpg', 'id_type'=>6 , 'description'=>'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Hawaii Pizza','image'=> 'hawaiian paradise_large-900x900.jpg', 'id_type'=>6 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Smoke Chicken Pizza','image'=> 'chicken black pepper_large-900x900.jpg', 'id_type'=>6 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Sausage Pizza','image'=> 'pizza-miami.jpg', 'id_type'=>6 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Ocean Pizza','image'=> 'seafood curry_large-900x900.jpg', 'id_type'=>6 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'All Meaty Pizza','image'=>  'all1).jpg', 'id_type'=>6 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Tuna Pizza','image'=> '54eaf93713081_-_07-germany-tuna.jpg', 'id_type'=>6 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem nhân dừa','image'=> 'maxresdefault.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem sữa tươi','image'=> 'sukem.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem sữa tươi chiên giòn','image'=> '1434429117-banh-su-kem-chien-20.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem dâu sữa tươi','image'=> 'sukemdau.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem bơ sữa tươi','image'=> 'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem nhân trái cây sữa tươi','image'=> 'foody-banh-su-que-635930347896369908.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem cà phê','image'=> 'banh-su-kem-ca-phe-1.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem phô mai','image'=> '50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh su kem sữa tươi chocolate','image'=>'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'id_type'=>7 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Macaron Pháp','image'=>  'Macaron9.jpg', 'id_type'=>2 , 'description'=>'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Tiramisu - Italia','image'=> '234.jpg', 'id_type'=>2 , 'description'=>'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Táo - Mỹ','image'=> '1234.jpg', 'id_type'=>2 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Cupcake - Anh Quốc','image'=> 'cupcake.jpg', 'id_type'=>6 , 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=> 'Bánh Sachertorte','image'=>'111.jpg', 'id_type'=>6 , 'description'=>'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. Sachertorte có vị ngọt nhẹ, gồm nhiều lớp bánh được làm từ ruột bánh mì và bánh sữa chocholate, xen lẫn giữa các lớp bánh là mứt mơ. Món bánh chocholate này nổi tiếng tới mức thành phố Vienna của Áo đã ấn định&nbsp;tổ chức một ngày Sachertorte quốc gia, vào 5/12 hằng năm',  'unit_price'=>150000, 'new'=>0, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]
        ]);
    }
}