<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 회원가입 페이지</title>

    <?php include "../include/head.php" ?>
</head>
<body  class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="intro__inner center bmStyle">
            <picture class="intro__images">
                <source srcset="../assets/img/join01.png, ../assets/img/join01@2x.png 2x, ../assets/img/join01@3x.png 3x">
                <img src="../assets/img/join01.png" alt="회원가입 이미지">
            </picture>
            <p class="intro__text">
                회원가입을 해주시면 다양한 정보를 자유롭게 볼 수 있습니다.
            </p>
        </div>
        <!-- join__inner  -->
        <div class="join__inner">
            <h2>이용약관</h2>
            <div class="index">
                <ul>
                    <li class="active">1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
            <div class="join__agree">
                <div class="agree__box">
                    <span>제1조 (목적)<br>
                        본 약관은 [회사명] (이하 "회사"라 함)가 제공하는 서비스의 이용조건 및 절차, 회원과 회사간의 권리와 의무 및 책임사항 등 기본적인 사항을 규정하는 것을 목적으로 합니다.<br><br>
                        제2조 (용어의 정의)<br>
                        본 약관에서 사용하는 용어의 정의는 다음과 같습니다.<br>
                        "서비스"라 함은 회사가 제공하는 모든 서비스를 의미합니다.<br>
                        "회원"이라 함은 본 약관에 동의하고 회사가 제공하는 서비스를 이용하는 자를 말합니다.<br>
                        "아이디(ID)"라 함은 회원의 식별과 회원의 서비스 이용을 위하여 회원이 설정하고 회사가 승인하는 문자 또는 숫자의 조합을 말합니다.<br>
                        "비밀번호"라 함은 회원이 부여 받은 아이디와 일치되는 회원임을 확인하고 회원의 비밀보호를 위해 회원 자신이 설정한 문자 또는 숫자의 조합을 말합니다.
                    </span>                    
                </div>
                <div class="agree__check">
                    <input type="checkbox" class="agreecheck"> <p>약관 동의 하시겠습니까?</p>
                </div>
                <div class="agree__box">
                    <span>제3조 (약관의 효력과 변경)<br>
                        본 약관은 회사가 제공하는 서비스와 관련하여 회원과 회사 간의 권리와 의무 등을 규정하는 것으로서, 이에 동의하는 회원은 회사가 제공하는 서비스를 이용할 수 있습니다.<br>
                        회사는 필요하다고 인정되는 경우 본 약관을 변경할 수 있으며, 변경된 약관은 회사가 운영하는 웹사이트에서 공지합니다. 회원은 변경된 약관에 대해 동의 여부를 묻는 공지가 있은 날로부터 15일 이내에 회사에 의사표시를 하지 않으면 동의한 것으로 간주됩니다.<br><br>
                        제4조 (회원가입)<br>
                        회원이 되고자 하는 자는 회사가 제공하는 회원가입 양식에 따라 회원정보를 입력하여 회원가입을 신청합니다.<br>
                        회사는 회원가입신청자의 개인정보 보호를 위해 관련 법령에 따라 개인정보취급방침을 시행합니다.
                    </span>
                </div>
                <div class="agree__check">
                    <input type="checkbox" class="agreecheck"> <p>약관 동의 하시겠습니까?</p>
                </div>
                <p class="agreeMsg"></p>
            </div>
            <a href="joinSave.php"><button class="btnStyle agreeBtn">동의</button></a>
        </div> 
    </main>
    <!-- main -->
    <?php include "../include/footer.php" ?>
    <!-- //footer -->
    
    <script>
        // 체크 표시 검사
        const agreeBtn = document.querySelector(".agreeBtn");
        const agreeCheck = document.querySelectorAll(".agreecheck");
        const agreeMsg = document.querySelector(".agreeMsg");

        agreeBtn.addEventListener("click", (e) => {
            
            agreeCheck.forEach((check) => {
                if(check.checked == false){
                    agreeMsg.innerText = "체크박스를 다시 한번 확인해주세요";

                    e.preventDefault();
                }
            })
        })
    </script>
</body>
</html>