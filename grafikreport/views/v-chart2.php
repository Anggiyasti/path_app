<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery Skills Bar Plugin Demo</title>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?= base_url('assets/plugins/skill.bars.jquery.js')?>"></script>

<script>

$(document).ready(function(){
	
	$('.skillbar').skillBars({
		from: 0,
		speed: 4000, 
		interval: 100,
		decimals: 0,
	});
	
});

</script>
<style type="text/css">
	@charset "utf-8";

/* CSS Document */


* {
  padding: 0;
  margin: 0;
}

body {background-color: #61B2A0}
h1 {
  width: 100%;
  display: inline-block;
  text-align: center;
  margin: 50px 0
}

.wrapper {
  max-width: 1200px;
  width: 90%;
  margin: 150px auto;
}

/* Skills bar effects */


.skillbar {
  position: relative;
  display: inline-block;
  margin: 15px 0;
  width: 100%;
  background: #cacaca;
  height: 35px;
  border-radius: 40px;
  width: 100%;
}

.skillbar-title {
  position: absolute;
  top: 0;
  left: 0;
  width: 110px;
  font-weight: bold;
  font-size: 13px;
  color: #ffffff;
  background: #6adcfa;
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
  background: rgba(0, 0, 0, 0.1);
  padding: 0 20px;
  height: 35px;
  line-height: 35px;
}

.skillbar-bar {
  height: 35px;
  width: 0px;
  background: #6adcfa;
  border-radius: 40px;
  display: inline-block;
}

.skill-bar-percent {
  position: absolute;
  right: 10px;
  top: 0;
  font-size: 11px;
  height: 35px;
  line-height: 35px;
  color: #ffffff;
  color: rgba(0, 0, 0, 0.4);
}

</style>



</head>

<body>
<div id="jquery-script-menu">
<div class="jquery-script-center">
<div class="jquery-script-clear"></div>
</div>
</div>
<div class="wrapper">
    <h1>jQuery Skills Bar Plugin Demo</h1>
   
    <?php foreach ($c as $key) : 
     $p = $key['score_grafik'];
    ?>

    <div class="skillbar" data-percent="<?=$p?>">
      <span class="skillbar-title" style="background: #d35400;"><?=$key['judul_bab'];?></span>
      <p class="skillbar-bar" style="background: #e67e22;"></p>
      <span class="skill-bar-percent"></span>
    </div>
    <!-- End Skill Bar -->
    <?php endforeach ?>
    <div class="skillbar" data-percent="13">
      <span class="skillbar-title" style="background: #d35400;">HTML5</span>
      <p class="skillbar-bar" style="background: #e67e22;"></p>
      <span class="skill-bar-percent"></span>
    </div>
    <!-- End Skill Bar -->
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
