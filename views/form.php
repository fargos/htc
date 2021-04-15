<?php if ($_POST['data'] == 'circle'): ?>
<fieldset>
    <label>
        Радиус
		<input name="radius" id="radius" class="num" required type="number" />
    </label>
</fieldset>
<fieldset class="points">
	<label>
		Точка 1
		<input name="x" class="x num" required type="number" />
		<input name="y" class="y num" required type="number" />
	</label>
</fieldset>
<?php endif; ?>
<?php if ($_POST['data'] == 'parallelogram' || $_POST['data'] == 'triangl'): ?>
<fieldset class="points">
    <label>
        Точка 1
		<input name="x1" class="x num" required type="number" />
		<input name="y1" class="y num" required type="number" />
    </label>
</fieldset>
<fieldset class="points">
	<label>
		Точка 2
		<input name="x2" class="x num" required type="number" />
		<input name="y2" class="y num" type="number" />
	</label>
</fieldset>
<fieldset class="points">
	<label>
		Точка 3
		<input name="x3" class="x num" required type="number" />
		<input name="y3" class="y num" required type="number" />
	</label>
</fieldset>
<?php endif; ?>