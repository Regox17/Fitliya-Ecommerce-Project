<?php
include "header.php";
?>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .desktop {
            background-color: #ffffff;
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
        }

        .desktop .div {
            background-color: #ffffff;
            width: 1433px;
            height: 2939px;
            position: relative;
        }

        .desktop .overlap {
            position: absolute;
            width: 1433px;
            height: 685px;
            top: 0;
            left: 0;
            background-image: url(img/about.jpg);
            background-size: 100% 100%;
        }

        .desktop .rectangle {
            width: 1433px;
            height: 685px;
            background: linear-gradient(180deg,
                    rgba(11.92, 23.05, 36.12, 0.35) 0%,
                    rgba(11.92, 23.05, 36.12, 0.35) 0.01%,
                    rgba(0, 0, 0, 0.35) 100%);
            position: absolute;
            top: 0;
            left: 0;
        }

        .desktop .group {
            position: absolute;
            width: 1221px;
            height: 297px;
            top: 132px;
            left: 137px;
        }

        .desktop .text-wrapper {
            position: absolute;
            width: 1185px;
            top: 267px;
            left: 22px;
            font-family: "Krona One-Regular", Helvetica;
            font-weight: 400;
            color: #ffffff;
            font-size: 33px;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .text-wrapper-2 {
            position: absolute;
            width: 1217px;
            top: 0;
            left: 0;
            font-family: "Krona One-Regular", Helvetica;
            font-weight: 400;
            color: #ffffff;
            font-size: 250px;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .m-reagan {
            position: absolute;
            width: 244px;
            height: 341px;
            top: 2176px;
            left: 141px;
        }

        .desktop .img {
            position: absolute;
            width: 242px;
            height: 303px;
            top: 0;
            left: 0;
            object-fit: cover;
        }

        .desktop .text-wrapper-3 {
            position: absolute;
            width: 166px;
            top: 307px;
            left: 52px;
            font-family: "Abhaya Libre ExtraBold-Regular", Helvetica;
            font-weight: 400;
            color: #000000;
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .abhishek-talwar {
            position: absolute;
            width: 244px;
            height: 341px;
            top: 2176px;
            left: 439px;
        }

        .desktop .text-wrapper-4 {
            position: absolute;
            width: 233px;
            top: 307px;
            left: 5px;
            font-family: "Abhaya Libre ExtraBold-Regular", Helvetica;
            font-weight: 400;
            color: #000000;
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .aryan-purohit {
            position: absolute;
            width: 235px;
            height: 341px;
            top: 2176px;
            left: 749px;
        }

        .desktop .rectangle-2 {
            width: 233px;
            height: 304px;
            position: absolute;
            top: 0;
            left: 0;
        }

        .desktop .text-wrapper-5 {
            position: absolute;
            width: 198px;
            top: 307px;
            left: 12px;
            font-family: "Abhaya Libre ExtraBold-Regular", Helvetica;
            font-weight: 400;
            color: #000000;
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .sandhya-koribilli {
            position: absolute;
            width: 246px;
            height: 341px;
            top: 2176px;
            left: 1035px;
        }

        .desktop .text-wrapper-6 {
            position: absolute;
            width: 239px;
            top: 307px;
            left: 5px;
            font-family: "Abhaya Libre ExtraBold-Regular", Helvetica;
            font-weight: 400;
            color: #000000;
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .eston-gonsalves {
            position: absolute;
            width: 244px;
            height: 346px;
            top: 2565px;
            left: 141px;
        }

        .desktop .text-wrapper-7 {
            position: absolute;
            width: 221px;
            top: 312px;
            left: 11px;
            font-family: "Abhaya Libre ExtraBold-Regular", Helvetica;
            font-weight: 400;
            color: #000000;
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .siddharth-MV {
            position: absolute;
            width: 245px;
            height: 346px;
            top: 2565px;
            left: 439px;
        }

        .desktop .rectangle-3 {
            width: 243px;
            height: 303px;
            position: absolute;
            top: 0;
            left: 0;
        }

        .desktop .text-wrapper-8 {
            position: absolute;
            width: 221px;
            top: 312px;
            left: 21px;
            font-family: "Abhaya Libre ExtraBold-Regular", Helvetica;
            font-weight: 400;
            color: #000000;
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .alex-soares {
            position: absolute;
            width: 244px;
            height: 346px;
            top: 2565px;
            left: 739px;
        }

        .desktop .a {
            position: absolute;
            width: 160px;
            top: 312px;
            left: 41px;
            font-family: "Abhaya Libre ExtraBold-Regular", Helvetica;
            font-weight: 400;
            color: #000000;
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .desktop .zuriel-ribeiro {
            position: absolute;
            width: 244px;
            height: 346px;
            top: 2565px;
            left: 1038px;
        }

        .desktop .overlap-group-wrapper {
            position: absolute;
            width: 1128px;
            height: 275px;
            top: 761px;
            left: 154px;
        }

        .desktop .overlap-group {
            position: relative;
            width: 1124px;
            height: 275px;
        }

        .desktop .text-wrapper-9 {
            width: 344px;
            top: 0;
            left: 367px;
            position: absolute;
            font-family: "Krona One-Regular", Helvetica;
            font-weight: 400;
            color: #4e4a4a;
            font-size: 40px;
            text-align: center;
            letter-spacing: 0;
            line-height: normal;
        }

        .desktop .p {
            position: absolute;
            width: 1124px;
            top: 61px;
            left: 0;
            font-family: "ABSALOM-Regular", Helvetica;
            font-weight: 400;
            color: #979292;
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
        }

        .desktop .group-2 {
            position: absolute;
            width: 1136px;
            height: 289px;
            top: 1083px;
            left: 154px;
        }

        .desktop .at-fitliya-we {
            position: absolute;
            width: 1132px;
            top: 79px;
            left: 0;
            font-family: "ABSALOM-Regular", Helvetica;
            font-weight: 400;
            color: var(--text);
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
        }

        .desktop .text-wrapper-10 {
            position: absolute;
            top: 0;
            left: 367px;
            font-family: "Krona One-Regular", Helvetica;
            font-weight: 400;
            color: var(--title);
            font-size: 40px;
            text-align: center;
            letter-spacing: 0;
            line-height: normal;
        }

        .desktop .group-3 {
            position: absolute;
            width: 775px;
            height: 303px;
            top: 1404px;
            left: 364px;
        }

        .desktop .text-wrapper-11 {
            position: absolute;
            width: 536px;
            top: 0;
            left: 88px;
            font-family: "Krona One-Regular", Helvetica;
            font-weight: 400;
            color: var(--title);
            font-size: 40px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
        }

        .desktop .reliable-and {
            position: absolute;
            width: 771px;
            top: 86px;
            left: 0;
            font-family: "ABSALOM-Regular", Helvetica;
            font-weight: 400;
            color: var(--text);
            font-size: 40px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
        }

        .desktop .group-4 {
            position: absolute;
            width: 1121px;
            height: 258px;
            top: 1734px;
            left: 154px;
        }

        .desktop .if-you-have-any {
            position: absolute;
            width: 1117px;
            top: 90px;
            left: 0;
            font-family: "ABSALOM-Regular", Helvetica;
            font-weight: 400;
            color: var(--text);
            font-size: 32px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
        }

        .desktop .text-wrapper-12 {
            position: absolute;
            top: 0;
            left: 409px;
            font-family: "Krona One-Regular", Helvetica;
            font-weight: 400;
            color: var(--title);
            font-size: 40px;
            text-align: justify;
            letter-spacing: 0;
            line-height: normal;
        }

        .desktop .text-wrapper-13 {
            width: 415px;
            top: 2040px;
            left: 499px;
            position: absolute;
            font-family: "Krona One-Regular", Helvetica;
            font-weight: 400;
            color: #4e4a4a;
            font-size: 40px;
            text-align: center;
            letter-spacing: 0;
            line-height: normal;
        }
    </style>
</head>
<br>

<body>
    <div class="desktop">
        <div class="div">
            <div class="overlap">
                <div class="rectangle"></div>
                <div class="group">
                    <p class="text-wrapper">An E-commerce Website for Fitness Based Products</p>
                    <div class="text-wrapper-2">FITLIYA</div>
                </div>
            </div>
            <div class="m-reagan">
                <img class="img" src="img/M. Reagan.jpg" />
                <div class="text-wrapper-3">M. Reagan</div>
            </div>
            <div class="abhishek-talwar">
                <img class="img" src="img/Abhishek.jpg" />
                <div class="text-wrapper-4">Abhishek Talwar</div>
            </div>
            <div class="aryan-purohit">
                <img class="rectangle-2" src="img/Aryan.jpg" />
                <div class="text-wrapper-5">Aryan Purohit</div>
            </div>
            <div class="sandhya-koribilli">
                <img class="img" src="img/Sandhya.jpg" />
                <div class="text-wrapper-6">Sandhya Koribilli</div>
            </div>
            <div class="eston-gonsalves">
                <img class="img" src="img/Eston.jpg" />
                <div class="text-wrapper-7">Eston Gonsalves</div>
            </div>
            <div class="siddharth-MV">
                <img class="rectangle-3" src="img/Siddharth.jpg" />
                <div class="text-wrapper-8">Siddharth MV</div>
            </div>
            <div class="alex-soares">
                <img class="img" src="img/Alex.jpg" />
                <div class="a">Alex Soares</div>
            </div>
            <div class="zuriel-ribeiro">
                <img class="img" src="img/Zuriel.jpg" />
                <div class="text-wrapper-8">Zuriel Ribeiro</div>
            </div>
            <div class="overlap-group-wrapper">
                <div class="overlap-group">
                    <div class="text-wrapper-9">Our Products</div>
                    <p class="p">
                        Our mission at Fitliya is to provide our customers with access to the best fitness products on the market,
                        curated to meet their specific needs and goals. We strive to offer a diverse range of high-quality
                        supplements, equipment, and clothing that cater to fitness enthusiasts of all levels, from beginners to
                        seasoned athletes.
                    </p>
                </div>
            </div>
            <div class="group-2">
                <div class="text-wrapper-10"></div>
                <p class="p">
                    At Fitliya, we carefully select each product in our inventory to ensure that it meets our strict standards
                    of quality, performance, and effectiveness. Whether you&#39;re looking for protein supplements to fuel your
                    workouts, durable gym equipment to enhance your training sessions, or stylish activewear to keep you
                    comfortable and motivated, we&#39;ve got you covered.
                </p>

            </div>
            <div class="group-3">
                <div class="text-wrapper-11">Why Choose Fitliya?</div>
                <p class="p">
                    Reliable and effective products<br />Diverse range of products<br />Commitment to customer satisfaction<br />Transparent
                    and honest service
                </p>
            </div>
            <div class="group-4">
                <div class="text-wrapper-12">Contact Us</div>
                <p class="p">
                    If you have any questions, comments, or feedback, please don&#39;t hesitate to get in touch with us. You can
                    reach our friendly customer support team by email at support@fitliya.com or by phone at 9588628035.
                    We&#39;re here to help you on your fitness journey every step of the way!
                </p>

            </div>
            <div class="text-wrapper-13">Our Members</div>
        </div>
    </div>
</body>

</html>

<?php

include "footer.php";
?>