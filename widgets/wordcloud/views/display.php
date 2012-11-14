<script type="text/javascript">
var word_array = [
<?php foreach($entries['entries'] as $entry):?>
	{ text: "<?php echo $entry['text'];?>", weight: <?php echo $entry['weight'];?>, link: "<?php echo $entry['link'];?>"},
<?php endforeach; ?>
];

	$(function() {
        $("#wordcloud").jQCloud(word_array);
	});
</script>

<div id="wordcloud"></div>