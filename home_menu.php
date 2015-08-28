<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0" onmouseover="TabbedPanels1.showPanel(this)">Software</li>
        <li class="TabbedPanelsTab" tabindex="0" onmouseover="TabbedPanels1.showPanel(this)">About Us</li>
        <li class="TabbedPanelsTab" tabindex="0" onmouseover="TabbedPanels1.showPanel(this)">Login</li>
        
      </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent"> S/w Info</div>
        <div class="TabbedPanelsContent"> About us</div>
        <div class="TabbedPanelsContent"> <?php include("login.php");?> </div>
        </div>
    </div></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:2});
//-->
</script>
