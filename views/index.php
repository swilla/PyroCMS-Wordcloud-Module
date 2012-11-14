<script type="text/javascript">
      var word_list = new Array(
        <?php foreach($words['entries'] as $words):?>
            <?php if($words['last'] != 1):?>
                { text: "<?php echo $entry['text'];?>", weight: <?php echo $entry['weight'];?>, link: "<?php echo $entry['link'];?>" },
            <?php else: ?>
                { text: "<?php echo $entry['text'];?>", weight: <?php echo $entry['weight'];?>, link: "<?php echo $entry['link'];?>" }
            <?php endif; ?>
        <?php endforeach; ?>
      );
      $(document).ready(function() {
        $("#wordcloud").jQCloud(word_list);
      });
    </script>
<div id="wordcloud"></div>