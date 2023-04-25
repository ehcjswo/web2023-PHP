<?php
    include "../connect/connect.php";
    include "../connect/session.php";

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <?php include "../include/head.php" ?>
</head>
<body  class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
            <div class="intro__inner bmStyle center">
                <picture class="intro__images small">
                    <source srcset="../assets/img/joinEnd01.png, ../assets/img/joinEnd01@2x.png 2x, ../assets/img/joinEnd01@3x.png 3x"/>
                    <img src="../assets/img/joinEnd01.png" alt="게시판이미지">
                </picture>
                <h2>게시판</h2>
                <p class="intro__text">
                    웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 개시판입니다.
                    관련된 사항은 여기서 확인하세요!
                </p>
            </div>
            <!-- intro__inner -->

        <div class="board__inner">
                <div class="board__search">
                    <div class="left">
                        * 총 <em>1111</em>건의 게시물이 등록되어 있습니다.
                    </div>
                    <div class="right">
                        <form action="#" name="" method="post">
                            <fieldset>
                                <legend class="blind">게시판 검색 영역</legend>
                                <input type="search" placeholder="검색어를 입력하세요!">
                                <select name="#" id="#">
                                    <option value="title">제목</option>
                                    <option value="content">내용</option>
                                    <option value="neme">등록자</option>
                                </select>
                                <button type="submit" class="btnStyle3 white">검색</button>
                                <a href="boardWrite.php" class="btnStyle3">글쓰기</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="board__table">
                    <table>
                        <colgroup>
                            <col style="width: 5%">
                            <col>
                            <col style="width: 10%">
                            <col style="width: 15%">
                            <col style="width: 7%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>등록자</th>
                                <th>등록일</th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>1</td>
                                <td><a href="boardView.html">게시판 제목</a></td>
                                <td>이름</td>
                                <td>2022-02-02</td>
                                <td>100</td>
                            </tr> -->
<?php
    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) ORDER BY boardID DESC LIMIT 100";
    
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i = 0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);

                echo "<tr>";
                echo "<td>".$info['boardID']."</td>";
                echo "<td><a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youName']."</td>";
                echo "<td>".date('Y/m/d', $info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            }
        }
    }
?>
                        </tbody>
                    </table>
                </div>
                <div class="board__pages">
                    <ul>
                        <li><a href="#">처음으로</a></li>
                        <li><a href="#">이전</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">다음</a></li>
                        <li><a href="#">마지막으로</a></li>
                    </ul>
                </div>
            </div>
    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>