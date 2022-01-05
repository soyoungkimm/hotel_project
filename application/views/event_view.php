<?
    $id=$row->id;
   

	$tmp = $text1 ? "/id/$id/text1/$text1/page/$page" : "/id/$id/page/$page";   
?>

</br>
<div class="alert mycolor1 mymargin5" role="alert">지역</div>

<form name="form1" method="post" action="">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">id</label>
	<?=$row->id;?>
	
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">date</label>
   	<?=$row->writeday;?>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">name</label>
 <?=$row->name;?>

</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">content</label>
 <?=$row->content;?>
  
</div>



<div align="center">

    <a href = "/~team2/event/edit<?=$tmp ?>" class="btn btn-primary">수정</a>
	<a href = "/~team2/event/del<?=$tmp ?>" class="btn btn-primary" onClick="return confirm('삭제할까요 ?');">삭제</a>&nbsp;
    <input  type="button" value="이전화면"  class="btn btn-primary" onClick="history.back();">&nbsp;
</div>
</form>