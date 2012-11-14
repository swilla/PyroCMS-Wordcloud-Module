<script type="text/javascript">
      var word_list = new Array(
        <?php foreach($entries['entries'] as $words):?>
            <?php if($words['last'] != 1):?>
                { text: "<?php echo $words['text'];?>", weight: <?php echo $words['weight'];?>, link: "<?php echo $words['link'];?>" },
            <?php else: ?>
                { text: "<?php echo $words['text'];?>", weight: <?php echo $words['weight'];?>, link: "<?php echo $words['link'];?>" }
            <?php endif; ?>
        <?php endforeach; ?>
      );
      $(document).ready(function() {
        $("#wordcloud").jQCloud(word_list);
      });
</script>

<div id="wordcloud"></div>