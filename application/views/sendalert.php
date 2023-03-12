<table>
    <tr><td>id</td></tr>
        <?php
          foreach($customers as $c){
        ?>
          <tr><td><?php echo $c['cust_id']?></td></tr> 
        <?php
          }
        ?>
      
</table>   