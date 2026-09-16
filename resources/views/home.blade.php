<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Khám phá du lịch Việt Nam</title>

    <style>


        /* Section dưới hero*/
        .featured-section {
            padding: 90px 30px;
            background: #f8fafc;
        }

        .section-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-heading {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 45px;
        }

        .section-heading span {
            display: inline-block;

            color: #0d9488;

            font-size: 14px;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 2px;

            margin-bottom: 10px;
        }

        .section-heading h2 {
            font-size: 38px;
            margin-bottom: 14px;
            color: #1f2937;
        }

        .section-heading p {
            font-size: 17px;
            line-height: 1.7;
            color: #64748b;
        }

        .destination-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 25px;
        }

        .destination-card {
            position: relative;

            height: 330px;

            border-radius: 20px;

            overflow: hidden;

            text-decoration: none;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);

            transition: 0.3s;
        }

        .destination-card img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: 0.4s;
        }

        .destination-card:hover {
            transform: translateY(-7px);

            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.18);
        }

        .destination-card:hover img {
            transform: scale(1.07);
        }

        .card-overlay {
            position: absolute;

            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            background:
                linear-gradient(
                    to top,
                    rgba(0, 0, 0, 0.75),
                    rgba(0, 0, 0, 0.05)
                );
        }

        .card-content {
            position: absolute;

            left: 25px;
            bottom: 25px;

            color: white;

            z-index: 2;
        }

        .card-content span {
            display: inline-block;

            font-size: 13px;

            padding: 6px 11px;

            background: rgba(13, 148, 136, 0.9);

            border-radius: 20px;

            margin-bottom: 10px;
        }

        .card-content h3 {
            font-size: 28px;

            margin-bottom: 7px;
        }

        .card-content p {
            font-size: 15px;

            color: #f1f5f9;
        }


        


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f5f7fa;
            color: #222;
        }

        .hero {
            min-height: 100vh;
            background:
                linear-gradient(
                    rgba(0, 0, 0, 0.45),
                    rgba(0, 0, 0, 0.45)
                ),
                url('../images/home-banner.jpg');
            background-size: cover;
            background-position: center;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }

        .hero-content {
            width: 100%;
            max-width: 900px;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 52px;
            margin-bottom: 15px;
            font-weight: bold;
            text-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
        }

        .hero-content p {
            font-size: 20px;
            margin-bottom: 35px;
            color: #f1f1f1;
        }

        .search-box {
            background: white;
            padding: 12px;
            border-radius: 18px;

            display: flex;
            gap: 10px;

            max-width: 720px;
            margin: 0 auto;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .search-box input {
            flex: 1;

            border: none;
            outline: none;

            padding: 16px 18px;

            font-size: 17px;

            border-radius: 12px;

            background: #f4f6f8;
        }

        .search-box button {
            border: none;

            padding: 0 28px;

            border-radius: 12px;

            background: #0d9488;
            color: white;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.25s;
        }

        .search-box button:hover {
            background: #0f766e;
            transform: translateY(-1px);
        }

        .error-message {
            max-width: 720px;
            margin: 15px auto 0;

            background: rgba(255, 255, 255, 0.95);
            color: #dc2626;

            padding: 12px 18px;

            border-radius: 10px;
        }

        .suggestions {
            margin-top: 25px;
        }

        .suggestions span {
            display: inline-block;

            margin: 5px;

            padding: 9px 15px;

            border-radius: 20px;

            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.4);

            font-size: 14px;

            cursor: pointer;

            transition: 0.25s;
        }

        .suggestions span:hover {
            background: white;
            color: #0f766e;
        }

        @media (max-width: 768px) {

            .featured-section {
                padding: 60px 20px;
            }

            .section-heading h2 {
                font-size: 30px;
            }

            .destination-grid {
                grid-template-columns: 1fr;
            }

            .destination-card {
                height: 280px;
            }

            .hero-content h1 {
                font-size: 36px;
            }

            .hero-content p {
                font-size: 17px;
            }

            .search-box {
                flex-direction: column;
            }

            .search-box button {
                padding: 15px;
            }
        }
    </style>
</head>

<body>


<x-navbar />



<section class="hero">

    <div class="hero-content">

        <h1>Khám phá Việt Nam</h1>

        <p>
            Tìm kiếm những địa điểm du lịch nổi tiếng
            trên khắp 34 tỉnh thành Việt Nam
        </p>


        <form
            action="{{ route('province.search') }}"
            method="POST"
            class="search-box"
        >

            @csrf

            <input
                id="province-input"
                list="province-list"
                name="province"
                placeholder="Bạn muốn đi đâu? Ví dụ: Đà Nẵng"
                autocomplete="off"
                required
            >

            <datalist id="province-list">

                @foreach($provinces as $province)

                    <option value="{{ $province->name }}">

                @endforeach

            </datalist>

            <button type="submit">
                Tìm kiếm
            </button>

        </form>


        @if(session('error'))

            <div class="error-message">
                {{ session('error') }}
            </div>

        @endif


        <div class="suggestions">

            <span onclick="selectProvince('Đà Nẵng')">
                Đà Nẵng
            </span>

            <span onclick="selectProvince('Hà Nội')">
                Hà Nội
            </span>

            <span onclick="selectProvince('Huế')">
                Huế
            </span>

            <span onclick="selectProvince('Khánh Hòa')">
                Khánh Hòa
            </span>

            <span onclick="selectProvince('Thành phố Hồ Chí Minh')">
                TP. Hồ Chí Minh
            </span>

        </div>

    </div>

</section>


<section class="featured-section">

    <div class="section-container">

        <div class="section-heading">
            <span>Gợi ý cho bạn</span>

            <h2>Điểm đến nổi bật</h2>

            <p>
                Khám phá những tỉnh thành được nhiều du khách yêu thích
                trên khắp Việt Nam.
            </p>
        </div>


        <div class="destination-grid">

            <a href="/provinces/tay-ninh" class="destination-card">

                <img
                    src="../images/province/TayNinh/ToaThanh.png"
                    alt="Tây Ninh"
                >

                <div class="card-overlay"></div>

                <div class="card-content">
                    <span>Tỉnh</span>
                    <h3>Tây Ninh</h3>
                    <p>Chùa Tòa Thánh - Núi Bà Đen - Hồ Dầu Tiếng</p>
                </div>

            </a>


            <a href="/provinces/ha-noi" class="destination-card">

                <img
                    src="../images/province/HaNoi/HoGuom.png"
                    alt="Hà Nội"
                >

                <div class="card-overlay"></div>

                <div class="card-content">
                    <span>Thủ đô</span>
                    <h3>Hà Nội</h3>
                    <p>Hồ Gươm • Phố cổ • Văn Miếu</p>
                </div>

            </a>


            <a href="/provinces/hue" class="destination-card">

                <img
                    src="../images/province/Hue/Hue.png"
                    alt="Huế"
                >

                <div class="card-overlay"></div>

                <div class="card-content">
                    <span>Thành phố</span>
                    <h3>Huế</h3>
                    <p>Đại Nội • Chùa Thiên Mụ • Sông Hương</p>
                </div>

            </a>


            <a href="/provinces/khanh-hoa" class="destination-card">

                <img
                    src="../images/province/KhanhHoa/KhanhHoa.png"
                    alt="Khánh Hòa"
                >

                <div class="card-overlay"></div>

                <div class="card-content">
                    <span>Tỉnh</span>
                    <h3>Khánh Hòa</h3>
                    <p>Nha Trang • Hòn Mun • Vịnh Ninh Vân</p>
                </div>

            </a>

        </div>

    </div>

</section>


<script>

    function selectProvince(provinceName) {

        document.getElementById('province-input').value = provinceName;

    }

</script>

</body>
</html>