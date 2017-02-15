<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="<?= base_url('assets/js/jquery-3.1.0.slim.min.js')?>"></script>
	<script src="<?= base_url('assets/plugins/jquery.barfiller.js')?>"></script>
<style type="text/css">
	.barfiller {
  background-color:#cacaca;
    height:25px;
    border-radius:40px;
    box-shadow:inset 0px 2px 0px 0px rgba(0,0,0,0.1);
    margin-bottom:30px;

}

.barfiller .fill {
  position:absolute;
    margin-top:2px;
    margin-left:2px;
    display:block;
    height:21px;
    width:75%;
    border-radius:40px;
    border:solid 1px rgba(0,0,0,0.1);
    border-bottom:solid 2px rgba(0,0,0,0.2);
}

.barfiller .tipWrap { display: none; }

.barfiller .tip {
  margin-top: -30px;
  padding: 2px 4px;
  font-size: 11px;
  color: #fff;
  left: 0px;
  position: absolute;
  z-index: 2;
  background: #333;
}

.barfiller .tip:after {
  border: solid;
  border-color: rgba(0,0,0,.8) transparent;
  border-width: 6px 6px 0 6px;
  content: "";
  display: block;
  position: absolute;
  left: 9px;
  top: 100%;
  z-index: 9
}
</style>
</head>
<body>
<div id="page-content" class="page-content header-clear bg bg-cover">
    <div id="page-content-scroll">
        
        <div class="mobileui-lockscreen-notifications">
            <div class="mobileui-lockscreen-header animated fadeIn">
                <h1><?=$mapel ?></h1>
            </div>
            <div class="mobileui-lockscreen-notifications">
                    <?php foreach ($bab as $row): ?>
                        <a href="" class="animated fadeIn delay-100">
                        <i></i>
                        <em><strong><h2><?=$row['judul_bab'] ?></h2></strong><div id="bar1" class="barfiller">
                        
  <div class="tipWrap">
  <span class="tip"></span>
  </div>
  <?php foreach ($c as $key) {
    $p = $key['score_grafik'];
  } ?>
  <span class="fill" data-percentage="<?=$p?>"></span>
</div></em>
                    </a>  
                    <?php endforeach ?>
                    <div class="clear"></div>
                </div>
            </div>
            <a href="#" class="mobileui-lockscreen-home animated fadeIn delay-300"><i class="ion-ios-home-outline"></i></a>
        </div>
        
    </div>  
</div>
    


<script type="text/javascript">
	$('#bar1').barfiller();
	$('#bar1').barfiller({

  // color of bar
  barColor: '#16b597',

  // shows a tooltip
  tooltip: true,

  // duration in ms
  duration: 1000,

  // re-animate on resize
  animateOnResize: true
  
});

</script>

</body>
</html>