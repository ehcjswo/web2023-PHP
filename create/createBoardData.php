<?php
    include "../connect/connect.php";

    for($i=1; $i<30; $i++){
        $regTime = time();

        $sql = "INSERT INTO board(memberID, boardTitle, boardContents, boardView, regTime) VALUE(1, '게시판 타이틀${i} 입니다', '게시판 내용물입니다. 게시판 내용물입니다. 게시판 내용물입니다. 게시판 내용물입니다.게시판 내용물입니다.', '1', '$regTime')";
        // echo $sql;
        $connect -> query($sql);
    }
?>