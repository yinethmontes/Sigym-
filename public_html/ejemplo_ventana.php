<script type="text/javascript">
	$(function() {
		$("#dialog").dialog();
	});
	</script>



<div class="demo">

<div id="dialog" title="Basic dialog">
	<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>

<!-- Sample page content to illustrate the layering of the dialog -->
<div class="hiddenInViewSource" style="padding: 20px;">
<p>Sed vel diam id libero <a href="http://example.com">rutrum convallis</a>. Donec aliquet leo vel magna. Phasellus rhoncus faucibus ante. Etiam bibendum, enim faucibus aliquet rhoncus, arcu felis ultricies neque, sit amet auctor elit eros a lectus.</p>
<form>
	<input value="text input"><br>
	<input type="checkbox">checkbox<br>
	<input type="radio">radio<br>
	<select>
		<option>select</option>
	</select><br><br>
	<textarea>textarea</textarea><br>
</form>
</div><!-- End sample page content -->

</div><!-- End demo -->

<div style="display: none;" class="demo-description">

<p>The basic dialog window is an overlay positioned within the viewport and is protected from page content (like select elements) shining through with an iframe.  It has a title bar and a content area, and can be moved, resized and closed with the 'x' icon by default.</p>

</div><!-- End demo-description -->