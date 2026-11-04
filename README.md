
# TPĐĐ Travel – Website Khám Phá Du Lịch Việt Nam

TPĐĐ Travel là website hỗ trợ người dùng khám phá các địa điểm du lịch tại Việt Nam, tìm kiếm thông tin tỉnh thành, tham khảo các điểm tham quan và xây dựng lịch trình du lịch.

Website tích hợp chatbot AI sử dụng **Google Gemini**, hỗ trợ tư vấn địa điểm, gợi ý lịch trình theo sở thích, ngân sách và thời gian. Chatbot kết hợp khả năng xử lý ngôn ngữ tự nhiên với dữ liệu du lịch được lưu trữ trong MySQL.

## 1. Công nghệ sử dụng

| Công nghệ | Vai trò |
|---|---|
| Laravel 12 | Framework backend PHP |
| PHP 8.2 trở lên | Ngôn ngữ xử lý phía server |
| MySQL | Hệ quản trị cơ sở dữ liệu |
| Blade | Xây dựng giao diện Laravel |
| HTML, CSS, JavaScript | Giao diện và tương tác người dùng |
| Vite | Quản lý tài nguyên frontend |
| Google Gemini API | Xử lý chatbot AI và lịch trình AI |
| Composer | Quản lý thư viện PHP |
| Node.js và npm | Quản lý thư viện frontend |
| Git và GitHub | Quản lý và chia sẻ mã nguồn |

## 2. Các chức năng chính

- Xem danh sách tỉnh thành và địa điểm du lịch Việt Nam.
- Tìm kiếm, lọc và xem thông tin chi tiết địa điểm.
- Đăng ký, đăng nhập và đăng xuất tài khoản.
- Quản lý thông tin cá nhân.
- Lưu địa điểm yêu thích và lịch sử xem.
- Đánh giá, bình luận địa điểm.
- So sánh các địa điểm du lịch.
- Tạo và quản lý lịch trình du lịch.
- Sử dụng chatbot Gemini AI để tư vấn du lịch.
- Xem trước và lưu lịch trình do AI hỗ trợ xây dựng.
- Quản trị dữ liệu website thông qua khu vực quản trị.

Một số chức năng yêu cầu đăng nhập hoặc có dữ liệu mẫu trong MySQL.

---

# HƯỚNG DẪN CÀI ĐẶT VÀ CHẠY DỰ ÁN

## 3. Yêu cầu trước khi cài đặt

Hướng dẫn này dành cho người dùng **Windows 10 hoặc Windows 11**.

Cần cài đặt các phần mềm sau:

| Phần mềm | Link tải |
|---|---|
| Git | https://git-scm.com/downloads/win |
| Visual Studio Code | https://code.visualstudio.com/ |
| XAMPP | https://www.apachefriends.org/ |
| Composer | https://getcomposer.org/download/ |
| Node.js LTS | https://nodejs.org/ |

**Lưu ý quan trọng:**

- Laravel 12 yêu cầu PHP 8.2 trở lên.
- XAMPP cần có phiên bản PHP tương thích.
- Composer phải sử dụng đúng phiên bản PHP.
- Node.js cần được cài cùng npm.
- Máy cần có kết nối Internet để tải thư viện và sử dụng Gemini AI.

Sau khi cài đặt, mở PowerShell hoặc Terminal của VS Code và kiểm tra:

```powershell
git --version
php -v
composer -V
node -v
npm -v
```

Nếu các lệnh hiển thị phiên bản tương ứng thì có thể tiếp tục.

Nếu lệnh `php` không được nhận diện, cần cấu hình biến môi trường PATH trỏ tới thư mục PHP của XAMPP, ví dụ `C:\xampp\php`.

## 4. Clone dự án từ GitHub

Mở PowerShell hoặc Terminal trong VS Code.

Di chuyển đến vị trí muốn lưu dự án, ví dụ ổ D:

```powershell
cd D:\
```

Clone repository:

```powershell
git clone https://github.com/23050155-sketch/vietnam-travel-website.git
```

Di chuyển vào thư mục vừa tải:

```powershell
cd vietnam-travel-website
```

Mở dự án bằng VS Code:

```powershell
code .
```

Hoặc mở VS Code, chọn **File → Open Folder** và chọn thư mục `vietnam-travel-website`.

**Quan trọng:** Các lệnh Laravel bên dưới phải được thực hiện tại thư mục có các file `artisan`, `composer.json` và `package.json`. Nếu các file này nằm trong thư mục con, hãy di chuyển vào đúng thư mục đó trước khi tiếp tục.

## 5. Cài đặt thư viện PHP

Trong Terminal của VS Code, chạy:

```powershell
composer install
```

Composer sẽ đọc file `composer.lock` và cài đặt các thư viện PHP cần thiết vào thư mục `vendor`.

Quá trình này có thể mất vài phút tùy tốc độ Internet.

Nếu Composer báo thiếu PHP extension, hãy kiểm tra file `php.ini` của PHP đang sử dụng và bật extension được thông báo.

## 6. Tạo file cấu hình môi trường

Laravel sử dụng file `.env` để lưu cấu hình ứng dụng, database và các dịch vụ bên ngoài.

Sau khi clone dự án, tạo file `.env` từ file mẫu:

```powershell
Copy-Item .env.example .env
```

Nếu dùng Command Prompt (CMD), có thể sử dụng:

```cmd
copy .env.example .env
```

Tiếp theo, tạo khóa bảo mật ứng dụng:

```powershell
php artisan key:generate
```

Nếu thành công, Terminal sẽ hiển thị thông báo tạo application key.

**Không chia sẻ file `.env` lên GitHub vì file này có thể chứa mật khẩu và API key.**

## 7. Cài đặt và cấu hình MySQL

### 7.1. Khởi động MySQL

Mở **XAMPP Control Panel**.

Nhấn **Start** tại mục MySQL.

Nếu MySQL khởi động thành công, mở trình duyệt và truy cập:

http://localhost/phpmyadmin

### 7.2. Tạo database

Trong phpMyAdmin:

1. Chọn **New**.
2. Nhập tên database: `vietnam_travel`.
3. Chọn **Create**.

Tên database có thể thay đổi, nhưng phải trùng với giá trị `DB_DATABASE` trong file `.env`.

### 7.3. Cấu hình kết nối

Mở file `.env` và kiểm tra hoặc chỉnh sửa các dòng:

```dotenv
APP_NAME="TPDD Travel"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vietnam_travel
DB_USERNAME=root
DB_PASSWORD=
```

Đây là cấu hình tham khảo cho XAMPP mặc định.

Nếu MySQL sử dụng mật khẩu hoặc cổng khác, cần thay đổi `DB_PASSWORD` và `DB_PORT` tương ứng.

`APP_DEBUG=true` chỉ nên sử dụng trong môi trường phát triển.

### 7.4. Tạo các bảng dữ liệu

Trong Terminal, chạy:

```powershell
php artisan migrate
```

Laravel sẽ thực thi các migration để tạo hoặc cập nhật bảng trong MySQL.

Nếu dự án có các seeder dữ liệu mẫu, chạy:

```powershell
php artisan db:seed
```

**Lưu ý:** Seeder chỉ tạo dữ liệu theo nội dung đã được định nghĩa trong dự án. Nếu repository sử dụng file SQL riêng hoặc cần chạy các seeder cụ thể, phải làm theo hướng dẫn dữ liệu tương ứng.

Không chạy `php artisan migrate:fresh` trên database có dữ liệu cần giữ, vì lệnh này xóa và tạo lại các bảng.

## 8. Cài đặt thư viện frontend

Trong Terminal, chạy:

```powershell
npm install
```

Sau khi cài đặt hoàn tất, khởi động Vite:

```powershell
npm run dev
```

Giữ Terminal này đang chạy.

Vite sẽ phục vụ các tài nguyên CSS và JavaScript trong môi trường phát triển.

## 9. Chạy website Laravel

Mở một Terminal mới trong VS Code.

Chạy:

```powershell
php artisan serve
```

Nếu thành công, Laravel sẽ hiển thị địa chỉ tương tự:

```text
INFO Server running on [http://127.0.0.1:8000].
```

Mở trình duyệt và truy cập:

http://127.0.0.1:8000

Website TPĐĐ Travel sẽ được hiển thị nếu cấu hình và database đã sẵn sàng.

### Các chương trình cần chạy

Trong quá trình sử dụng website ở môi trường phát triển, thông thường cần:

- XAMPP MySQL: đang chạy.
- Terminal 1: `npm run dev`.
- Terminal 2: `php artisan serve`.

Không bắt buộc bật Apache của XAMPP nếu website được phục vụ bằng `php artisan serve`.

---

# HƯỚNG DẪN CÀI ĐẶT CHATBOT GEMINI AI

## 10. Giới thiệu chatbot AI

TPĐĐ Travel tích hợp chatbot sử dụng **Google Gemini API**.

Chatbot có thể hỗ trợ:

- Trả lời câu hỏi về du lịch Việt Nam.
- Gợi ý địa điểm theo tỉnh thành.
- Tư vấn địa điểm theo sở thích như biển, núi, văn hóa, thiên nhiên.
- Gợi ý địa điểm theo tháng và ngân sách.
- Tham khảo thông tin địa điểm từ cơ sở dữ liệu MySQL.
- Xây dựng và điều chỉnh lịch trình du lịch.
- Chuẩn bị bản xem trước lịch trình AI để người dùng xác nhận và lưu.

Chatbot sử dụng dữ liệu website khi phù hợp; chất lượng tư vấn phụ thuộc vào dữ liệu MySQL và khả năng phản hồi của Gemini.

## 11. Tạo Gemini API Key

Mỗi người cài đặt dự án cần tự cấu hình Gemini API key hợp lệ.

### Bước 1: Truy cập Google AI Studio

Mở:

https://aistudio.google.com/api-keys

### Bước 2: Đăng nhập

Đăng nhập bằng tài khoản Google.

### Bước 3: Tạo API key

Chọn **Create API key**.

Chọn Google Cloud project phù hợp hoặc tạo project mới nếu được yêu cầu.

### Bước 4: Sao chép API key

Sao chép API key được tạo và lưu tại nơi an toàn.

API key là thông tin bí mật. Không gửi lên GitHub, không đưa vào ảnh chụp màn hình công khai và không chia sẻ với người khác.

**Lưu ý:** Quyền truy cập model, hạn mức miễn phí và chi phí sử dụng phụ thuộc vào chính sách Google và tài khoản đang sử dụng.

## 12. Cấu hình Gemini trong file `.env`

Mở file:

```text
.env
```

Thêm hoặc cập nhật:

```dotenv
GEMINI_API_KEY=API_KEY_CUA_BAN
GEMINI_MODEL=gemini-2.5-flash
```

Thay `API_KEY_CUA_BAN` bằng API key thực tế vừa tạo.

Ví dụ cấu hình minh họa:

```dotenv
GEMINI_API_KEY=YOUR_GOOGLE_GEMINI_API_KEY
GEMINI_MODEL=gemini-2.5-flash
```

Giá trị `YOUR_GOOGLE_GEMINI_API_KEY` chỉ là placeholder, không sử dụng được để gọi API.

Model mặc định trong `ChatbotController.php` là `gemini-2.5-flash`. Nếu model không khả dụng đối với tài khoản, cần kiểm tra model được hỗ trợ và cập nhật cấu hình tương ứng.

## 13. Kiểm tra cấu hình `config/services.php`

Mở file:

```text
config/services.php
```

Bên trong mảng cấu hình `return [...]`, cần có:

```php
'gemini' => [
    'api_key' => env('GEMINI_API_KEY'),
    'model' => env('GEMINI_MODEL', 'gemini-2.5-flash'),
],
```

Nếu cấu hình Gemini đã tồn tại và đúng như trên thì không cần thêm lần nữa.

Trong `ChatbotController.php`, ứng dụng đọc cấu hình bằng:

```php
$apiKey = config('services.gemini.api_key');
$model = config('services.gemini.model', 'gemini-2.5-flash');
```

Do đó, chỉ thêm API key vào `.env` sẽ chưa đủ nếu `config/services.php` không khai báo các giá trị tương ứng.

## 14. Làm mới cấu hình Laravel

Sau khi chỉnh sửa `.env`, chạy:

```powershell
php artisan optimize:clear
```

Nếu Laravel đang chạy, có thể dừng bằng `Ctrl + C` rồi chạy lại:

```powershell
php artisan serve
```

Đảm bảo MySQL vẫn đang hoạt động.

## 15. Kiểm tra chatbot

Mở website tại:

http://127.0.0.1:8000

Nhấn vào biểu tượng chatbot và thử các câu hỏi sau.

**Kiểm tra kết nối AI:**

```text
Xin chào, bạn có thể giúp tôi tư vấn du lịch không?
```

**Kiểm tra tư vấn địa điểm:**

```text
Gợi ý cho tôi những địa điểm du lịch ở Hà Nội.
```

**Kiểm tra tư vấn theo sở thích:**

```text
Tôi thích du lịch biển và muốn tìm địa điểm phù hợp.
```

**Kiểm tra tư vấn theo ngân sách:**

```text
Tôi muốn du lịch tiết kiệm với ngân sách khoảng 2 triệu đồng.
```

**Kiểm tra lập lịch trình:**

```text
Hãy gợi ý lịch trình du lịch Hà Nội 2 ngày 1 đêm.
```

Nếu chatbot trả lời thành công, kết nối Gemini API đã hoạt động.

Để thử chức năng xem trước và lưu lịch trình AI, cần có dữ liệu địa điểm phù hợp trong MySQL và đáp ứng yêu cầu đăng nhập của chức năng.

---

# XỬ LÝ LỖI THƯỜNG GẶP

## 16. Lỗi khi cài đặt Laravel

### Lỗi `php is not recognized`

Nguyên nhân: Windows chưa nhận diện lệnh PHP.

Cách xử lý:

- Kiểm tra PHP đã có trong XAMPP.
- Thêm đường dẫn PHP, ví dụ `C:\xampp\php`, vào biến môi trường PATH.
- Mở lại Terminal.
- Kiểm tra bằng `php -v`.

### Lỗi `composer is not recognized`

Nguyên nhân: Composer chưa được cài hoặc chưa có trong PATH.

Cách xử lý: Cài Composer, mở lại Terminal và chạy:

```powershell
composer -V
```

### Lỗi thiếu thư mục `vendor`

Chạy:

```powershell
composer install
```

### Lỗi `No application encryption key has been specified`

Chạy:

```powershell
php artisan key:generate
```

### Lỗi không kết nối được MySQL

Kiểm tra:

- MySQL đã bật trong XAMPP chưa.
- Database đã được tạo chưa.
- Tên database trong `.env` có đúng không.
- Tài khoản và mật khẩu MySQL có đúng không.
- Cổng MySQL có đúng không.

Sau khi chỉnh sửa `.env`, chạy:

```powershell
php artisan optimize:clear
```

### Lỗi thiếu bảng dữ liệu

Kiểm tra migration và chạy:

```powershell
php artisan migrate
```

Nếu các trang cần dữ liệu địa điểm, cần đảm bảo đã có dữ liệu mẫu phù hợp.

### Lỗi giao diện không tải CSS hoặc JavaScript

Chạy:

```powershell
npm install
npm run dev
```

Đảm bảo Terminal Vite vẫn hoạt động.

## 17. Lỗi khi sử dụng Gemini chatbot

### Chatbot chưa được cấu hình API Key

Nguyên nhân có thể:

- Chưa thêm `GEMINI_API_KEY` vào `.env`.
- API key để trống.
- Thiếu cấu hình Gemini trong `config/services.php`.
- Laravel đang sử dụng cấu hình cache cũ.

Cách xử lý:

1. Kiểm tra `.env`.
2. Kiểm tra `config/services.php`.
3. Chạy `php artisan optimize:clear`.
4. Khởi động lại Laravel.

### Không thể xác thực Gemini API

Nguyên nhân có thể:

- API key không hợp lệ.
- API key bị thu hồi hoặc hạn chế quyền.
- Project hoặc dịch vụ chưa được cấp quyền phù hợp.

Cách xử lý: Kiểm tra API key và quyền truy cập trong Google AI Studio.

### Không thể gọi model Gemini đã cấu hình

Nguyên nhân có thể:

- Tên model sai.
- Model không khả dụng đối với tài khoản hoặc API đang sử dụng.

Cách xử lý: Kiểm tra model được hỗ trợ và cập nhật `GEMINI_MODEL`.

### Gemini đang quá tải hoặc hết hạn mức

Nguyên nhân có thể là lỗi HTTP 429 do vượt hạn mức hoặc quá nhiều yêu cầu.

Cách xử lý:

- Chờ rồi thử lại.
- Kiểm tra quota của tài khoản.
- Kiểm tra giới hạn sử dụng và thanh toán nếu có.

### Không thể kết nối Gemini

Kiểm tra kết nối Internet, khả năng truy cập dịch vụ Google và cấu hình mạng trên máy.

### Chatbot không tìm được địa điểm

Chatbot TPĐĐ Travel sử dụng dữ liệu địa điểm từ MySQL để hỗ trợ tư vấn.

Nếu database chưa có dữ liệu tỉnh thành hoặc địa điểm, một số câu hỏi sẽ không có kết quả phù hợp.

Hãy kiểm tra dữ liệu trong các bảng liên quan và đảm bảo các địa điểm cần hiển thị có trạng thái hoạt động.

## 18. Xem log để kiểm tra lỗi

Nếu website hoặc chatbot gặp lỗi hệ thống, kiểm tra:

```text
storage/logs/laravel.log
```

Có thể xem nội dung log bằng VS Code.

Không chia sẻ công khai log chứa thông tin nhạy cảm.

---

# LƯU Ý KHI SỬ DỤNG VÀ ĐÓNG GÓP

## 19. Bảo mật

- Không commit file `.env`.
- Không đưa Gemini API key thật vào GitHub.
- Không chia sẻ mật khẩu MySQL.
- Mỗi người clone dự án nên dùng API key riêng.
- Không bật `APP_DEBUG=true` trên website triển khai công khai.
- Không chạy các lệnh xóa database khi chưa sao lưu.

## 20. Các file và thư mục quan trọng

| Đường dẫn | Chức năng |
|---|---|
| `app/Http/Controllers/` | Các controller xử lý yêu cầu |
| `app/Http/Controllers/ChatbotController.php` | Xử lý chatbot Gemini và lịch trình AI |
| `app/Models/` | Các model Eloquent |
| `app/Support/` | Các lớp hỗ trợ tìm kiếm, xử lý dữ liệu du lịch |
| `resources/views/` | Giao diện Blade |
| `routes/web.php` | Khai báo các tuyến đường web |
| `database/migrations/` | Cấu trúc bảng MySQL |
| `database/seeders/` | Dữ liệu mẫu |
| `config/services.php` | Cấu hình dịch vụ bên ngoài |
| `.env` | Cấu hình riêng trên từng máy |
| `.env.example` | File mẫu cấu hình môi trường |

## 21. Cập nhật mã nguồn từ GitHub

Đối với người đã clone dự án và muốn tải các thay đổi mới nhất từ nhánh `main`, trước tiên cần lưu hoặc commit những thay đổi đang làm trên máy.

Sau đó chạy:

```powershell
git pull origin main
```

Nếu Git báo xung đột, cần kiểm tra và xử lý trước khi tiếp tục.

## 22. Repository GitHub

**Tên dự án:** TPĐĐ Travel – Website Khám Phá Du Lịch Việt Nam

**Repository:**

https://github.com/23050155-sketch/vietnam-travel-website

---

## 23. Tóm tắt các lệnh cài đặt

Sau khi đã cài Git, PHP, Composer, Node.js và XAMPP, có thể thực hiện lần lượt:

```powershell
# Clone dự án
git clone https://github.com/23050155-sketch/vietnam-travel-website.git

# Vào thư mục dự án
cd vietnam-travel-website

# Cài thư viện PHP
composer install

# Tạo file cấu hình
Copy-Item .env.example .env

# Tạo khóa Laravel
php artisan key:generate

# Chỉnh sửa .env để cấu hình MySQL và Gemini API Key
# Tạo database trong phpMyAdmin trước khi chạy migrate

# Tạo bảng dữ liệu
php artisan migrate

# Thêm dữ liệu mẫu nếu seeder đã được cấu hình
php artisan db:seed

# Cài thư viện frontend
npm install

# Làm mới cấu hình
php artisan optimize:clear

# Chạy frontend
npm run dev
```

Mở Terminal thứ hai:

```powershell
php artisan serve
```

Truy cập:

http://127.0.0.1:8000

**Chúc bạn cài đặt và trải nghiệm TPĐĐ Travel thành công!**