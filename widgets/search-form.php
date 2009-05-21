<form action="<?= $this->theme_options['listing_template']; ?>" method="get" name="quick_search">
<table width="590" border="0" cellspacing="2">
 <tr>
   <td align="center" valign="top"><label>Beds:
       <select name="beds" id="beds">
         <option value="1" <?php if($_GET['beds'] == 1) echo 'selected'; ?>>1+</option>
         <option value="2" <?php if($_GET['beds'] == 2) echo 'selected'; ?>>2+</option>
         <option value="3" <?php if($_GET['beds'] == 3) echo 'selected'; ?>>3+</option>
         <option value="4" <?php if($_GET['beds'] == 4) echo 'selected'; ?>>4+</option>
         <option value="5" <?php if($_GET['beds'] == 5) echo 'selected'; ?>>5+</option>
         <option value="6" <?php if($_GET['beds'] == 6) echo 'selected'; ?>>6+</option>
       </select>
     </label></td>
   <td align="center" valign="top"><label>Baths:
     <select name="baths" id="baths">
       <option value="1" <?php if($_GET['baths'] == 1) echo 'selected'; ?>>1+</option>
       <option value="2" <?php if($_GET['baths'] == 2) echo 'selected'; ?>>2+</option>
       <option value="3" <?php if($_GET['baths'] == 3) echo 'selected'; ?>>3+</option>
       <option value="4" <?php if($_GET['baths'] == 4) echo 'selected'; ?>>4+</option>
       <option value="5" <?php if($_GET['baths'] == 5) echo 'selected'; ?>>5+</option>
     </select>
   </label></td>
   <td align="center" valign="top"><label>Price low:
     <select name="pricelow" id="pricelow">
       <option value="0">$0</option>
       <option value="100000" <?php if($_GET['pricelow'] == 100000) echo 'selected'; ?>>$100,000</option>
       <option value="200000" <?php if($_GET['pricelow'] == 200000) echo 'selected'; ?>>$200,000</option>
       <option value="300000" <?php if($_GET['pricelow'] == 300000) echo 'selected'; ?>>$300,000</option>
       <option value="400000" <?php if($_GET['pricelow'] == 400000) echo 'selected'; ?>>$400,000</option>
       <option value="500000" <?php if($_GET['pricelow'] == 500000) echo 'selected'; ?>>$500,000</option>
       <option value="600000" <?php if($_GET['pricelow'] == 600000) echo 'selected'; ?>>$600,000</option>
       <option value="700000" <?php if($_GET['pricelow'] == 700000) echo 'selected'; ?>>$700,000</option>
       <option value="800000" <?php if($_GET['pricelow'] == 800000) echo 'selected'; ?>>$800,000</option>
       <option value="900000" <?php if($_GET['pricelow'] == 900000) echo 'selected'; ?>>$900,000</option>
       </select>
     </label></td>
   <td align="center" valign="top"><label>Price high:
     <select name="pricehigh" id="pricehigh">
       <option value="100000">$100,000</option>
       <option value="200000" <?php if($_GET['pricehigh'] == 200000) echo 'selected'; ?>>$200,000</option>
       <option value="300000" <?php if($_GET['pricehigh'] == 300000) echo 'selected'; ?>>$300,000</option>
       <option value="400000" <?php if($_GET['pricehigh'] == 400000) echo 'selected'; ?>>$400,000</option>
       <option value="500000" <?php if($_GET['pricehigh'] == 500000) echo 'selected'; ?>>$500,000</option>
       <option value="600000" <?php if($_GET['pricehigh'] == 600000) echo 'selected'; ?>>$600,000</option>
       <option value="700000" <?php if($_GET['pricehigh'] == 700000) echo 'selected'; ?>>$700,000</option>
       <option value="800000" <?php if($_GET['pricehigh'] == 800000) echo 'selected'; ?>>$800,000</option>
       <option value="900000" <?php if($_GET['pricehigh'] == 900000) echo 'selected'; ?>>$900,000</option>
       <option value="99999999" <?php if($_GET['pricehigh'] == 99999999) echo 'selected'; ?>>$1,000,000+</option>
     </select>
     </label></td>
   <td align="right" valign="top">
     <input type="submit" name="search" id="search" value="Search" />
   </td>
 </tr>
</table>
</form>
