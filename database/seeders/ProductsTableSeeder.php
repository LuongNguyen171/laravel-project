<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('products')->truncate();

        DB::table('products')->insert([
            'productTmName' => 'Nike',
            'styleId' => 1,
            'productName' => 'Nike Air Force 1 07',
            'productImage' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/e6da41fa-1be4-4ce5-b89c-22be4f1f02d4/air-force-1-07-shoes-WrLlWX.png',
            'productStatus' => true,
            'productPrice' => 2929000,
            'productQuantity' => 123,
            'productSoldQt' => 145,
            'productInfor' => 'Giới hạn (1) cặp cho mỗi người tiêu dùng
            Chữ ® có thể xuất hiện một hoặc hai lần trên lưỡi giày và/hoặc lót giày do Nike thực hiện thay đổi. Về mặt này, sản phẩm bạn mua có thể trông khác với sản phẩm được mô tả trên Nike.com hoặc NikeApp.',
            'productIntro' => 'Sự rạng rỡ vẫn tồn tại trong Nike Air Force 1 07, phiên bản bóng rổ nguyên bản mang đến sự thay đổi mới mẻ về những gì bạn biết rõ nhất: lớp phủ được khâu bền, lớp hoàn thiện gọn gàng và lượng đèn flash hoàn hảo giúp bạn tỏa sáng.',
            'productDiscount' => 10,
        ]);

        DB::table('products')->insert([
            'productTmName' => 'Nike',
            'styleId' => 1,
            'productName' => 'LeBron XXI Tahitian',
            'productImage' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/d1afa947-6fd1-492c-90e9-5373c5b5ca1f/lebron-xxi-tahitian-younger-older-basketball-shoes-Q0HDBH.png',
            'productStatus' => true,
            'productPrice' => 4079000,
            'productQuantity' => 125,
            'productSoldQt' => 145,
            'productInfor' => 'Sự khác biệt giữa LeBron này và phiên bản dành cho người lớn? Chúng tôi đã lựa chọn tính linh hoạt cao hơn ở phần bàn chân trước thay vì bổ sung nhiều Air hơn để phù hợp với trẻ em, hoàn hảo cho trò chơi đang phát triển của bạn. Bộ phận Air Zoom được đặt ở phía dưới ở gót chân giúp tăng thêm khả năng giảm chấn khi bạn bước xuống từ việc bám ván, chụp ảnh và chuyển sang cấp độ tiếp theo trong trò chơi của mình.',
            'productIntro' => 'Lần trước, LeBron đã lật ngược kịch bản trận đấu đánh giày của mình mà chỉ có Nhà vua mới có thể làm được. Bản encore thậm chí còn hay hơn. Với các bộ phận Air Zoom và đệm mềm, LeBron XXI (còn được gọi là LeBron 21) mang đến cho bạn sự linh hoạt và sức mạnh mà không cần quá nhiều trọng lượng để làm bạn chậm lại. Lý tưởng cho các cuộc chạy vòng, đột phá nhanh và chạy đua lên xuống sân, chúng giúp bạn tiếp tục chơi ở đỉnh cao của trận đấu cho đến khi tiếng còi cuối cùng vang lên. Bạn đã sẵn sàng chơi chưa?',
            'productDiscount' => 10,
        ]);
        DB::table('products')->insert([
            'productTmName' => 'Nike',
            'styleId' => 2,
            'productName' => 'Jordan 1 Low Alt SE',
            'productImage' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/c20f2863-b035-4e29-adc4-1a27ade828a6/air-jordan-1-low-se-older-shoes-HPgPbg.png',
            'productStatus' => true,
            'productPrice' => 2809000,
            'productQuantity' => 135,
            'productSoldQt' => 147,
            'productInfor' => 'Những lợi ích

            Phần trên bền được làm từ da lộn và dệt.
            Các bộ Nike Air-Sole được đóng gói cung cấp lớp đệm nhẹ.
            Đế ngoài bằng cao su rắn mang lại cho bạn lực kéo hàng ngày.
            
            Thông tin chi tiết sản phẩm
            
            Logo đôi cánh được dập ở gót chân
            Logo Swoosh được khâu xuống
            Thiết kế Jumpman trên lưỡi
            Đế xốp
            Lực kéo cao su
            Màu sắc hiển thị: Nâu/Dây/Cánh Buồm/Nâu
            Phong cách: FB2216-200
            Quốc gia/Khu vực xuất xứ: Indonesia',
            'productIntro' => 'Bạn đã bao giờ nhìn vào một quả trứng cá và nghĩ, "Ồ, tuyệt quá!"? Với những màu sắc được kết hợp từ thiên nhiên, chiếc AJ1 này tôn vinh mọi thứ ở ngoài trời. Tất nhiên, bạn vẫn có được tất cả các đặc điểm thiết kế cổ điển, như phần trên chắc chắn và đế Nike Air. Và nó đi kèm với một túi dây rút có thể tháo rời — đề phòng trường hợp bạn tìm thấy một quả đấu đặc biệt thú vị mà bạn muốn giữ lại.',
            'productDiscount' => 10,
        ]);

        DB::table('products')->insert([
            'productTmName' => 'Nike',
            'styleId' => 1,
            'productName' => 'Nike Gamma Force',
            'productImage' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/da82bd45-5d45-45c9-a066-575684f12515/gamma-force-shoes-CbTnH1.png',
            'productStatus' => true,
            'productPrice' => 2649000,
            'productQuantity' => 135,
            'productSoldQt' => 234,
            'productInfor' => 'Lớp trên lớp phong cách chiều—đó là một lực lượng cần được tính đến. Mang lại sự thoải mái và tính linh hoạt, những cú đá này bắt nguồn từ văn hóa bóng rổ truyền thống. Chất liệu cổ áo thể hiện sự tôn kính đối với môn thể thao cổ điển trong khi nền tảng tinh tế nâng tầm diện mạo của bạn theo đúng nghĩa đen. Gamma Force đang tạo nên di sản của riêng mình: phong cách cung đình có thể đeo cả ngày, dù bạn đi đâu.',
            'productIntro' => 'Lớp trên lớp phong cách chiều—đó là một lực lượng cần được tính đến. Mang lại sự thoải mái và tính linh hoạt, những cú đá này bắt nguồn từ văn hóa bóng rổ truyền thống. Chất liệu cổ áo thể hiện sự tôn kính đối với môn thể thao cổ điển trong khi nền tảng tinh tế nâng tầm diện mạo của bạn theo đúng nghĩa đen. Gamma Force đang tạo nên di sản của riêng mình: phong cách cung đình có thể đeo cả ngày, dù bạn đi đâu.

            Màu sắc hiển thị: Trắng/Xám khói nhạt/Trắng đỉnh/Malachite
            Phong cách: DX9176-106',
            'productDiscount' => 10,
        ]);

        DB::table('products')->insert([
            'productTmName' => 'Nike',
            'styleId' => 2,
            'productName' => 'Air Jordan XXXVIII FIBA',
            'productImage' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/889ef13a-6c68-406c-badd-713ccddc74f7/air-jordan-xxxviii-older-shoes-69P5Hc.png',
            'productStatus' => true,
            'productPrice' => 3959000,
            'productQuantity' => 233,
            'productSoldQt' => 454,
            'productInfor' => 'Court mobility

            You want quicker cuts, speedier sprints and all-over court control. The low-to-the-court Zoom Air Strobel unit helps you get there.
            
            
            Strength + security
            
            The embroidery in the upper is designed to help you feel extra secure while criss-crossing the court. Your skills, plus supportive, lightweight mesh? A winning combo.',
            'productIntro' => 'Khi nói đến môn thể thao vòng, Jordan Brand đã tạo được danh tiếng toàn cầu với tư cách là nhà sáng tạo và cộng tác viên. AJ XXXVIII này vinh danh Liên đoàn Bóng rổ Quốc tế—cơ quan quản lý bóng rổ trên toàn thế giới. Giống như ánh sáng trắng chứa mọi màu sắc có thể, lớp ngoài nổi bật che giấu phần đế được trang trí bằng tất cả các màu sắc của logo FIBA ​​​​sống động. Sự táo bạo, từ trong ra ngoài.',
            'productDiscount' => 10,
        ]);
    }
}
