<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$admins = array(
            [
                'name'              => 'admin',
                'username'             => 'admin',
                'email'             => 'tungcan2000@gmail.com',
                'password'          => '123456'
            ]
        );

        foreach ($admins as $value)
        {
            \Illuminate\Support\Facades\DB::table('admins')->insert([
                'name' 			=> $value['name'],
                'username' 		=> $value['username'],
                'email'     	=> $value['email'],
                'password' 		=> bcrypt($value['password']),
            ]);
        }
        DB::table('type_products')->insert([
        	[
			'name'=>'Bánh mặn',
			'description'=>'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.',
			'image'=>'banh-man-thu-vi-nhat-1.jpg',
			],

			[
			'name'=>'Bánh ngọt',
			'description'=>'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..',
			'image'=>'20131108144733.jpg',
			],

			[
			'name'=>'Bánh trái cây',
			'description'=>'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi "lạc" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.',
			'image'=>'banhtraicay.jpg',
			],

			[
			'name'=>'Bánh kem',
			'description'=>'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!',
			'image'=>'banhkem.jpg',
			],

			[
			'name'=>'Bánh crepe',
			'description'=>'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”',
			'image'=>'crepe.jpg',
			],

			[
			'name'=>'Bánh Pizza',
			'description'=>'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.',
			'image'=>'pizza.jpg',
			],

			[
			'name'=>'Bánh su kem',
			'description'=>'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.',
			'image'=>'sukemdau.jpg',
			]
        ]);
        DB::table('slide')->insert([
        	[
			'link'=>'',
			'image'=>'banner1.jpg',
			],

			[
			'link'=>'',
			'image'=>'banner2.jpg',
			],

			[
			'link'=>'',
			'image'=>'banner3.jpg',
			],

			[
			'link'=>'',
			'image'=>'banner4.jpg',
			],
        ]);
        DB::table('products')->insert([
			[
'name'=>'Bánh Crepe Sầu riêng',
'name2'=>'banh crepe sau rieng',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'5',
'unit_price'=>'150000',
'promotion_price'=>'120000',
'image'=>'1430967449-pancake-sau-rieng-6.jpg',
'unit'=>'hộp',
'new'=>'1'
],
[
'name'=>'Bánh Crepe Chocolate',
'name2'=>'banh crepe chocolate',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'180000',
'promotion_price'=>'160000',
'image'=>'crepe-chocolate.jpg',
'unit'=>'hộp',
'new'=>'1'
],
[
'name'=>'Bánh Crepe Sầu riêng - Chuối',
'name2'=>'banh crepe sau rieng - chuoi',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'5',
'unit_price'=>'150000',
'promotion_price'=>'120000',
'image'=>'crepe-chuoi.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Crepe Đào',
'name2'=>'banh crepe dao',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'5',
'unit_price'=>'160000',
'promotion_price'=>'0',
'image'=>'crepe-dao.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Crepe Dâu',
'name2'=>'banh crepe dau',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'5',
'unit_price'=>'160000',
'promotion_price'=>'0',
'image'=>'crepedau.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Crepe Pháp',
'name2'=>'banh crepe phap',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'5',
'unit_price'=>'200000',
'promotion_price'=>'180000',
'image'=>'crepe-phap.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Crepe Táo',
'name2'=>'banh crepe tao',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'5',
'unit_price'=>'160000',
'promotion_price'=>'0',
'image'=>'crepe-tao.jpg',
'unit'=>'hộp',
'new'=>'1'
],
[
'name'=>'Bánh Crepe Trà xanh',
'name2'=>'banh crepe tra xanh',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'5',
'unit_price'=>'160000',
'promotion_price'=>'150000',
'image'=>'crepe-traxanh.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Crepe Sầu riêng và Dứa',
'name2'=>'banh crepe sau rieng va dua',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'5',
'unit_price'=>'160000',
'promotion_price'=>'150000',
'image'=>'saurieng-dua.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Gato Trái cây Việt Quất',
'name2'=>'banh gato trai cay viet quat',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'3',
'unit_price'=>'250000',
'promotion_price'=>'0',
'image'=>'544bc48782741.png',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh sinh nhật rau câu trái cây',
'name2'=>'banh sinh nhat rau cau trai cay',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'3',
'unit_price'=>'200000',
'promotion_price'=>'180000',
'image'=>'210215-banh-sinh-nhat-rau-cau-body- (6).jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh kem Chocolate Dâu',
'name2'=>'banh kem chocolate dau',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'3',
'unit_price'=>'300000',
'promotion_price'=>'280000',
'image'=>'banh kem sinh nhat.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Bánh kem Dâu III',
'name2'=>'banh kem dau iii',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'3',
'unit_price'=>'300000',
'promotion_price'=>'280000',
'image'=>'Banh-kem (6).jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh kem Dâu I',
'name2'=>'banh kem dau i',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'3',
'unit_price'=>'350000',
'promotion_price'=>'320000',
'image'=>'banhkem-dau.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Bánh trái cây II',
'name2'=>'banh trai cay ii',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'3',
'unit_price'=>'150000',
'promotion_price'=>'120000',
'image'=>'banhtraicay.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Apple Cake',
'name2'=>'apple cake',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'3',
'unit_price'=>'250000',
'promotion_price'=>'240000',
'image'=>'Fruit-Cake_7979.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh ngọt nhân cream táo',
'name2'=>'banh ngot nhan cream tao',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'2',
'unit_price'=>'180000',
'promotion_price'=>'0',
'image'=>'20131108144733.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Chocolate Trái cây',
'name2'=>'banh chocolate trai cay',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'2',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'Fruit-Cake_7976.jpg',
'unit'=>'hộp',
'new'=>'1'
],
[
'name'=>'Bánh Chocolate Trái cây II',
'name2'=>'banh chocolate trai cay ii',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'2',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'Fruit-Cake_7981.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Peach Cake',
'name2'=>'peach cake',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'2',
'unit_price'=>'160000',
'promotion_price'=>'150000',
'image'=>'Peach-Cake_3294.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh bông lan trứng muối I',
'name2'=>'banh bong lan trung muoi i',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'1',
'unit_price'=>'160000',
'promotion_price'=>'150000',
'image'=>'banhbonglantrung.jpg',
'unit'=>'hộp',
'new'=>'1'
],
[
'name'=>'Bánh bông lan trứng muối II',
'name2'=>'banh bong lan trung muoi ii',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'1',
'unit_price'=>'180000',
'promotion_price'=>'0',
'image'=>'banhbonglantrungmuoi.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh French',
'name2'=>'banh french',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'1',
'unit_price'=>'180000',
'promotion_price'=>'0',
'image'=>'banh-man-thu-vi-nhat-1.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh mì Australia',
'name2'=>'banh mi australia',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'1',
'unit_price'=>'80000',
'promotion_price'=>'70000',
'image'=>'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh mặn thập cẩm',
'name2'=>'banh man thap cam',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'1',
'unit_price'=>'50000',
'promotion_price'=>'0',
'image'=>'Fruit-Cake.png',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Muffins trứng',
'name2'=>'banh muffins trung',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'1',
'unit_price'=>'100000',
'promotion_price'=>'80000',
'image'=>'maxresdefault.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh Scone Peach Cake',
'name2'=>'banh scone peach cake',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'1',
'unit_price'=>'120000',
'promotion_price'=>'0',
'image'=>'Peach-Cake_3300.jpg',
'unit'=>'hộp',
'new'=>'1'
],
[
'name'=>'Bánh mì Loaf I',
'name2'=>'banh mi loaf i',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'1',
'unit_price'=>'100000',
'promotion_price'=>'0',
'image'=>'sli12.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh kem Chocolate Dâu I',
'name2'=>'banh kem chocolate dau i',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'380000',
'promotion_price'=>'350000',
'image'=>'sli12.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Bánh kem Trái cây I',
'name2'=>'banh kem trai cay i',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'380000',
'promotion_price'=>'350000',
'image'=>'Fruit-Cake.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh kem Trái cây II',
'name2'=>'banh kem trai cay ii',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'380000',
'promotion_price'=>'350000',
'image'=>'Fruit-Cake_7971.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh kem Doraemon',
'name2'=>'banh kem doraemon',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'280000',
'promotion_price'=>'250000',
'image'=>'p1392962167_banh74.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Bánh kem Caramen Pudding',
'name2'=>'banh kem caramen pudding',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'280000',
'promotion_price'=>'0',
'image'=>'Caramen-pudding636099031482099583.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Bánh kem Chocolate Fruit',
'name2'=>'banh kem chocolate fruit',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'320000',
'promotion_price'=>'300000',
'image'=>'chocolate-fruit636098975917921990.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Bánh kem Coffee Chocolate GH6',
'name2'=>'banh kem coffee chocolate gh6',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'320000',
'promotion_price'=>'300000',
'image'=>'COFFE-CHOCOLATE636098977566220885.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh kem Mango Mouse',
'name2'=>'banh kem mango mouse',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'320000',
'promotion_price'=>'300000',
'image'=>'mango-mousse-cake.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Bánh kem Matcha Mouse',
'name2'=>'banh kem matcha mouse',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'350000',
'promotion_price'=>'330000',
'image'=>'MATCHA-MOUSSE.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh kem Flower Fruit',
'name2'=>'banh kem flower fruit',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'350000',
'promotion_price'=>'330000',
'image'=>'flower-fruits636102461981788938.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh kem Strawberry Delight',
'name2'=>'banh kem strawberry delight',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'350000',
'promotion_price'=>'330000',
'image'=>'strawberry-delight636102445035635173.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh kem Raspberry Delight',
'name2'=>'banh kem raspberry delight',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'4',
'unit_price'=>'350000',
'promotion_price'=>'330000',
'image'=>'raspberry.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Beefy Pizza',
'name2'=>'beefy pizza',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'150000',
'promotion_price'=>'130000',
'image'=>'40819_food_pizza.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Hawaii Pizza',
'name2'=>'hawaii pizza',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'120000',
'promotion_price'=>'0',
'image'=>'hawaiian paradise_large-900x900.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Smoke Chicken Pizza',
'name2'=>'smoke chicken pizza',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'120000',
'promotion_price'=>'0',
'image'=>'chicken black pepper_large-900x900.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Sausage Pizza',
'name2'=>'sausage pizza',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'120000',
'promotion_price'=>'0',
'image'=>'pizza-miami.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Ocean Pizza',
'name2'=>'ocean pizza',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'120000',
'promotion_price'=>'0',
'image'=>'seafood curry_large-900x900.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'All Meaty Pizza',
'name2'=>'all meaty pizza',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'140000',
'promotion_price'=>'0',
'image'=>'all1).jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Tuna Pizza',
'name2'=>'tuna pizza',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'140000',
'promotion_price'=>'0',
'image'=>'54eaf93713081_-_07-germany-tuna.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh su kem nhân dừa',
'name2'=>'banh su kem nhan dua',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'120000',
'promotion_price'=>'100000',
'image'=>'maxresdefault.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh su kem sữa tươi',
'name2'=>'banh su kem sua tuoi',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'120000',
'promotion_price'=>'100000',
'image'=>'sukem.jpg',
'unit'=>'cái',
'new'=>'0'
],
[
'name'=>'Bánh su kem sữa tươi chiên giòn',
'name2'=>'banh su kem sua tuoi chien gion',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'1434429117-banh-su-kem-chien-20.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh su kem dâu sữa tươi',
'name2'=>'banh su kem dau sua tuoi',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'sukemdau.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh su kem bơ sữa tươi',
'name2'=>'banh su kem bo sua tuoi',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh su kem nhân trái cây sữa tươi',
'name2'=>'banh su kem nhan trai cay sua tuoi',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'foody-banh-su-que-635930347896369908.jpg',
'unit'=>'hộp',
'new'=>'1'
],
[
'name'=>'Bánh su kem cà phê',
'name2'=>'banh su kem ca phe',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'banh-su-kem-ca-phe-1.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh su kem phô mai',
'name2'=>'banh su kem pho mai',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'50020041-combo-20-banh-su-que-pho-mai-9.jpg',
'unit'=>'hộp',
'new'=>'0'
],
[
'name'=>'Bánh su kem sữa tươi chocolate',
'name2'=>'banh su kem sua tuoi chocolate',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'7',
'unit_price'=>'150000',
'promotion_price'=>'0',
'image'=>'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg',
'unit'=>'hộp',
'new'=>'1'
],
[
'name'=>'Bánh Macaron Pháp',
'name2'=>'banh macaron phap',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'2',
'unit_price'=>'200000',
'promotion_price'=>'180000',
'image'=>'Macaron9.jpg',
'unit'=>'',
'new'=>'0'
],
[
'name'=>'Bánh Tiramisu - Italia',
'name2'=>'banh tiramisu - italia',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'2',
'unit_price'=>'200000',
'promotion_price'=>'0',
'image'=>'234.jpg',
'unit'=>'',
'new'=>'0'
],
[
'name'=>'Bánh Táo - Mỹ',
'name2'=>'banh tao - my',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'2',
'unit_price'=>'200000',
'promotion_price'=>'0',
'image'=>'1234.jpg',
'unit'=>'',
'new'=>'0'
],
[
'name'=>'Bánh Cupcake - Anh Quốc',
'name2'=>'banh cupcake - anh quoc',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'150000',
'promotion_price'=>'120000',
'image'=>'cupcake.jpg',
'unit'=>'cái',
'new'=>'1'
],
[
'name'=>'Bánh Sachertorte',
'name2'=>'banh sachertorte',
'description'=>'Không làm mà đòi có ăn thì chỉ có cà ví mà mua thôi!',
'id_type'=>'6',
'unit_price'=>'250000',
'promotion_price'=>'220000',
'image'=>'111.jpg',
'unit'=>'cái',
'new'=>'0'
],
        ]);
    }
}
