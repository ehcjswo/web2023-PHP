<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

     <main id="main" class="container">
     <div class="join__inner">
            <h2>회원 가입</h2>
            <div class="index">
                <ul>
                    <li>1</li>
                    <li class="active">2</li>
                    <li>3</li>
                </ul>
            </div>
            <div class="join__form">
                <form action="joinResult.php" name="joinResult.php" method="post" onsubmit="return joinChecks()">
                    <fieldset>
                        <legend class="blind">회원가입 영역</legend>
                        <div>
                            <label for="youName" class="required">이름</label>
                            <input type="text" id="youName" name="youName" class="inputStyle" maxlength="5" placeholder="이름을 적어주세요!" required>
                            <p class="msg" id="youNameComment"></p>
                        </div>
                        <div class="over">
                            <label for="youEmail" class="required">이메일</label>
                            <input type="email" id="youEmail" name="youEmail" class="inputStyle" placeholder="이메일을 적어주세요!">
                            <a href="#c" class="youCheck" onclick="emailChecking()">이메일 중복검사</a>
                            <p class="msg" id="youEmailComment"><!-- 이메일이 존재합니다. --></p>
                        </div>
                        <div class="over">
                            <label for="youNick" class="required">닉네임</label>
                            <input type="text" id="youNick" name="youNick" class="inputStyle" placeholder="닉네임을 적어주세요!">
                            <a href="#c" class="youCheck">닉네임 중복검사</a>
                            <p class="msg" id="youNickComment"></p>
                        </div>
                        <div>
                            <label for="youPass" class="required">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" class="inputStyle" placeholder="비밀번호 적어주세요!">
                            <p class="msg" id="youPassComment"></p>
                        </div>
                        <div>
                            <label for="youPassC">비밀번호 확인</label>
                            <input type="password" id="youPassC" name="youPassC" class="inputStyle" placeholder="다시 한번 적어주세요!">
                            <p class="msg" id="youPassCComment"></p>
                        </div>
                        <div>
                            <label for="youBirth">생년월일</label>
                            <input type="text" id="youBirth" name="youBirth" class="inputStyle" placeholder="YYYY--mm--DD" maxlength="15">
                            <p class="msg" id="youBirthComment"></p>
                        </div>
                        <div>
                            <label for="youPhone">연락처</label>
                            <input type="text" id="youPhone" name="youPhone" class="inputStyle" placeholder="연락처를 적어주세요!">
                            <p class="msg" id="youBirthComment"></p>
                        </div>
                        <button type="submit" class="btnStyle">회원가입 완료</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- intro__inner -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let isEmailCheck = false;

        function emailChecking(){
            let youEmail = $("#youEmail").val();

            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("* 이메일을 입력해주세요!");
            } else {
                $.ajax({
                    type : "POST",
                    url : "joinCheck.php",
                    data : {"youEmail": youEmail, "type": isEmailCheck},
                    dataType : "json",

                    success : function(data){
                        if(data.result == "good"){
                            $("#youEmailComment").text("사용 가능한 이메일입니다.");
                            isEmailCheck = true;
                        } else {
                            $("#youEmailComment").text("이미 존재하는 이메일입니다.")
                            isEmailCheck = false;
                        }
                    }

                    error : function(request, status, error){
                        console.log("request: " + request);
                        console.log("status: " + status);
                        console.log("error: " + error);
                    }
                })
            }

        }

        function joinChecks(){
            //이름 유효성 검사
            if($("#youName").val() == ''){
                $("#youNameComment").text("* 이름을 입력해주세요!");
                $("#youName").focus();
                return false;
            }
            let getYouName = RegExp(/^[가-힣]+$/);
            if(!getYouName.test($("#youName").val())){
                $("#youNameComment").text("* 이름은 한글만 사용 가능합니다.");
                $("#youName").val('');
                $("#youName").focus();
                return false;
            }

            // 이메일 유효성 검사
            if($("#youEmail").val() == ''){
                $("#youEmailComment").text("* 이메일을 입력해주세요!");
                $("#youEmail").focus();
                return false;
            }
            let getYouEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i);
            if(!getYouEmail.test($("#youEmail").val())){
                $("#youEmailComment").text("* 이메일을 형식에 맞게 입력해주세요!");
                $("#youEmail").val('');
                $("#youEmail").focus();
                return false;
            }
        }
    </script>
</body>
</html>