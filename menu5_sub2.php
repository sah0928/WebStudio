<?php
	require_once("dbconfig.php");
?>
<!DOCTYPE html>
<html lang="ko-KR">
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="The Overflowing church website's main page" />
  <meta name="author" content="unikys@gmail.com" />
  <link rel="stylesheet" type="text/css" href="css/main.css" title="style" />
  <link rel="stylesheet" type="text/css" href="css/menu1_sub.css" title="style" />
  <link rel="stylesheet" type="text/css" href="css/menu2_sub.css" title="style" />
  <title>전주신상교회</title>
</head>
<body class="fullpage">
<div class="wrap">
  <div class="header">
    <div class="top">
      <div class="content">
        <div class="util_menu">
          <a href="sign_in.html" class="btn_login">로그인</a>
          <a class="btn_sidebar">|</a>
          <a href="sign_up.html" class="btn_signup">회원가입</a>
        </div>
      </div>
    </div>
    <nav class="topMenu" >
      <div class="content">
        <a href="main.html">
          <img class="logo" src="img/title.png"/>
        </a>
        <ul class="gnb">
          <li class="topMenuLi">
            <a class="menuLink" href="menu1_sub1.html">교회소개</a>
            <ul class="submenu">
              <li><a class="submenuLink" href="menu1_sub1.html">인사말</a></li>
              <li><a class="submenuLink" href="menu1_sub2.html">연혁</a></li>
              <li><a class="submenuLink" href="menu1_sub3.html">섬기는분들</a></li>
              <li><a class="submenuLink" href="menu1_sub4.html">예배안내</a></li>
              <li><a class="submenuLink" href="menu1_sub5.html">오시는길</a></li>
            </ul>
          </li>
          <li class="topMenuLi">
            <a class="menuLink" href="menu2_sub1.html">예배</a>
            <ul class="submenu">
              <li><a class="submenuLink" href="menu2_sub1.html">신상TV</a></li>
              <li><a class="submenuLink" href="menu2_sub2.html">찬양대</a></li>
            </ul>
          </li>
          <li class="topMenuLi">
            <a class="menuLink" href="menu3_sub1.html">선교</a>
            <ul class="submenu">
              <li><a class="submenuLink" href="menu3_sub1.html">해외선교</a></li>
              <li><a class="submenuLink" href="menu3_sub2.html">국내선교</a></li>
            </ul>
          </li>
          <li class="topMenuLi">
            <a class="menuLink" href="menu4_sub1.html">다음세대</a>
            <ul class="submenu">
              <li><a class="submenuLink" href="menu4_sub1.html">유치부</a></li>
              <li><a class="submenuLink" href="menu4_sub2.html">어린이부</a></li>
              <li><a class="submenuLink" href="menu4_sub3.html">중고등부</a></li>
              <li><a class="submenuLink" href="menu4_sub4.html">아름회</a></li>
            </ul>
          </li>
          <li class="topMenuLi">
            <a class="menuLink" href="menu5_sub1.html">커뮤니티</a>
            <ul class="submenu">
              <li><a class="submenuLink" href="menu5_sub1.html">공지사항</a></li>
              <li><a class="submenuLink" href="menu5_sub2.html">자유게시판</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </div> <!--header end-->

  <div class="sub-wrap">
    <div class="snb">
      <h2>커뮤니티</h2>
      <ul class="snb-list">
        <li><a href="menu5_sub1.html">공지사항</a></li>
        <li><a href="menu5_sub2.html">자유게시판</a></li>
      </ul>
    </div>
    <div class="sub-content">
      <table>
  			<caption class="readHide">자유게시판</caption>
  			<thead>
  				<tr>
  					<th scope="col" class="no">번호</th>
  					<th scope="col" class="title">제목</th>
  					<th scope="col" class="author">작성자</th>  //작성자 id말고 이름으로 나타내주셈
  					<th scope="col" class="date">날짜</th>
  					<th scope="col" class="hit">조회</th>
  				</tr>
  			</thead>
  			<tbody>
  					<?php
  						$sql = 'select * from board_free order by b_no desc';
  						$result = $db->query($sql);
  						while($row = $result->fetch_assoc())
  						{
  							$datetime = explode(' ', $row['b_date']);
  							$date = $datetime[0];
  							$time = $datetime[1];
  							if($date == Date('Y-m-d'))
  								$row['b_date'] = $time;
  							else
  								$row['b_date'] = $date;
  					?>
  				<tr>
  					<td class="no"><?php echo $row['b_no']?></td>
  					<td class="title"><?php echo $row['b_title']?></td>
  					<td class="author"><?php echo $row['b_id']?></td>
  					<td class="date"><?php echo $row['b_date']?></td>
  					<td class="hit"><?php echo $row['b_hit']?></td>
  				</tr>
  					<?php
          }
  					?>
  			</tbody>
  		</table>
      <form action="write.html">
			     <input type="submit" value="글쓰기">
		  </form>
    </div>
    <div>  <!-- 밑에 1,2,3....페이지-->
	    <tr>
			<?php
                        // 전체 페이지 수
			$total_page = ceil($total_record / $record_per_page);
                        // 전체 블럭 수
			$total_block = ceil($total_page / $page_per_block);

                        // 현재 블럭이 1보다 클 경우
			if(1 < $now_block ) {
			  $pre_page = ($now_block - 1) * $page_per_block;
			  echo '<a href="list.php?page='.$pre_page.'">이전</a>';

			}

			$start_page = ($now_block - 1) * $page_per_block + 1;
			$end_page = $now_block * $page_per_block;

                        // 총 페이지와 마지막 페이지를 같게 하기, 즉 글이 있는 페이지까지만 설정
			if($end_page > $total_page) {
			  $end_page = $total_page;
			}

			?>

			<?php for($i = $start_page; $i <= $end_page; $i++) {?>
			    <td><a href="list.php?page=<?= $i ?>"><?= $i ?></a></td>
			<?php }?>

			<?php
                        // 현재 블럭이 총 블럭 수 보다 작을 경우
			if($now_block < $total_block) {
			  $post_page = $now_block * $page_per_block + 1;
			  echo '<a href="list.php?page='.$post_page.'">다음</a>';
			}

			?>
		</tr>
	</div><!-- 밑에 1,2,3....페이지-->

  </div> <!--sub-wrap end-->
</div> <!--wrap end-->
</body>
</html>
