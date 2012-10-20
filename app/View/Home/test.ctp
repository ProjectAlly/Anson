<?php 
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
<input type="text" name="date" id="date" />

<script type="text/javascript">

    jQuery(document).ready(function($){

        $('#date').datepicker();

    });

</script>
