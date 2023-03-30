<div class="w3-row-padding">

<div class="w3-col s5 form-group w3-margin-right">
<select name="spot">
<option value="">Your Block</option>
<option value="Block A Murada Plaza Suleja">Block A</option>
<option value="Block B Murada Plaza Suleja">Block B</option>
<option value="Block C Murada Plaza Suleja">Block C</option>
<option value="Opposite Block A Murada Plaza Suleja">Opposite Block A</option>
<option value="Opposite Block B Murada Plaza Suleja">Opposite Block B</option>
<option value="Opposite Block C Murada Plaza Suleja">Opposite Block C</option>
<option value="Elsewhere Suleja">Elsewhere</option>
</select>
<?php

if (!empty($blockErr)) {

?>
<span class="w3-small w3-text-red"><?= $blockErr ?></span>
<?php
}
?>
</div>



		<!--<div class="line my-1"></div>
		<h4 class="text-primary">Skills | Specialization</h4>
		<div class="skills">
			<div class="p-1">
				<input type="checkbox" disabled checked /> Android(Softwares)
			</div>

			<div class="p-1">
				<input type="checkbox" disabled checked /> Android(Harwares)
			</div>

			<div class="p-1">
				<input type="checkbox" disabled checked /> iPhones(Hardwares)
			</div>

			<div class="p-1">
				<input type="checkbox" disabled checked /> Network Unlock
			</div>
			<div class="p-1">
				<input type="checkbox" disabled checked /> iCloud Unlock
			</div>
			<div class="p-1">
				<input type="checkbox" disabled checked /> Others
			</div>
		</div>-->
