<div class="modal-header no-bor">
<button class="close" type="button" data-dismiss="modal"></button>
</div>
<div class="modal-body" >
 <form method="post" enctype="multipart/form-data" action="/table_explode/reload">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td>&nbsp;
       </td>
     </tr>
     <tr>
      <td align="left">
                导入资源：
       <input type="file" name="inputExcel" size="20" />
       <input type="hidden" name="table" value="<?=$table?>">
       <br><input type="submit" name="sub_up" value="提 交" />
      </td>
     </tr>
    </table>
</form>
</div>


