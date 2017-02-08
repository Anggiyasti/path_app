<style type="text/css">
    @import url('http://fonts.googleapis.com/css?family=Lato');


/*.container ul{
  list-style: none;
  height: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden;
}*/




input[type="radio"] {
  display: none;
}

input[type="radio"] + label {
  background-image: url("https://developer.tizen.org/sites/default/files/images/5.3.2.d.png");
  background-position: -169px -31px;
  background-repeat: no-repeat;
  display: block;
  height: 37px;
  width: 37px;
}

input[type="radio"]:checked + label {
  background-position: -44px -31px;
}

label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 1.35em;
  padding: 0px 25px 25px 50px;
  margin: 0 auto;
  height: 10px;
}

.baru {
    float: left; padding-right: 50px;
}


</style>
 <div class="courses1-area">
    <div class="container">    
        <h2 class="title-default-left">Workout - Bab</h2> 
    </div>
    <div id="shadow-carousel" class="container">
    <form action="<?= base_url() ?>index.php/workout1/next" method="post">
    <div class="baru">
              <?php 
                $i=1;
                foreach ($bab as $row) { ?>
                    <input type="radio" id="<?=$i?>-option" name="id_bab" value="<?=$row['id_bab']?>" checked>
                    <label for="<?=$i?>-option"><?php echo $row['judul_bab']; ?></label>
              <?php  
                $i++;
                } ?>
          </div>
          <div style="clear:both"></div>
        <div class="news-btn-holder" style="float: right; margin-top: 30px;">
            <input type="submit" name="" value="Next" class="view-all-accent-btn">
        </div>
    </form>
    </div>

</div> 