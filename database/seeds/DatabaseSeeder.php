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
