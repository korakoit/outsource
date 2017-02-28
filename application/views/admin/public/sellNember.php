 <form method="post" enctype="multipart/form-data" action="<?=base_url('table_implode/upload')?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td>&nbsp;
      
      </td>
     </tr>
     <tr>
      <td align="left">
       上传资源：
       <input type="hidden" name="site_url" value="<?=base_url()?>">
       <input type="file" name="inputExcel" size="20" />
       <input type="submit" name="sub_up" value="提 交" />
      </td>
     </tr>
    </table>
</form>

