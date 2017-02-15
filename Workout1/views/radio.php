<style type="text/css">
@import url('http://fonts.googleapis.com/css?family=Lato');

/*
.container ul{
  list-style: none;
  height: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
}*/


.l li{
  color: #AAAAAA;
  display: block;
  position: relative;
  float: left;
  width: 100%;
  height: 45px;
    border-bottom: 1px solid #111111;
}

ul li input[type=radio]{
  position: absolute;
  visibility: hidden;
}

ul li label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 1.35em;
  padding: 10px 25px 25px 60px;
  margin: 0 auto;
  height: 10px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
}

ul li:hover label{
    color: #00082E;
}

ul li .check{
  display: block;
  position: absolute;
  border: 5px solid #AAAAAA;
  border-radius: 100%;
  height: 25px;
  width: 25px;
  top: 15px;
  left: 20px;
    z-index: 5;
    transition: border .25s linear;
    -webkit-transition: border .25s linear;
}

ul li:hover .check {
  border: 5px solid #00082E;
}

ul li .check::before {
  display: block;
  position: absolute;
  content: '';
  border-radius: 100%;
  height: 15px;
  width: 15px;
/*  top: 5px;
    left: 5px;*/
  margin: auto;
    transition: background 0.25s linear;
    -webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 5px solid #00082E;
}

input[type=radio]:checked ~ .check::before{
  background: #00082E;
}

input[type=radio]:checked ~ label{
  color: #0DFF92;
}

</style>
 <div class="courses1-area">
    <div class="container">    
        <h2 class="title-default-left">Workout - Bab</h2> 
    </div>
    <div id="shadow-carousel" class="container">
    <form action="<?= base_url() ?>index.php/workout1/next" method="post">
        <div>
            <ul class=l>
              <?php 
                $i=1;
                foreach ($bab as $row) { ?>
                <li>
                    <input type="radio" id="<?=$i?>-option" name="id_bab" value="<?=$row['id_bab']?>" checked>
                    <label for="<?=$i?>-option"><?php echo $row['judul_bab']; ?></label>
                    
                    <div class="check"></div>
              </li>
              <?php  
                $i++;
                } ?>
          
            </ul>
        </div>
        <div class="news-btn-holder" style="float: right; margin-top: 30px;">
            <input type="submit" name="" value="Next" class="view-all-accent-btn">
        </div>
    </form>
    </div>

</div> 