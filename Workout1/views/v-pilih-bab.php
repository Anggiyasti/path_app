<style type="text/css">
    @import url('http://fonts.googleapis.com/css?family=Lato');



.containere{
  display: block;
  position: absolute;
  margin: auto;
  height: 450px;
  width: 400px;
  bottom: 0; left:0; right: 0; top:0;
  padding: 0;
}

h2 {
    color: #AAAAAA;
    font-weight: normal;
}

.containere ul{
  list-style: none;
  height: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
}


ul li{
  color: #AAAAAA;
  display: block;
  position: relative;
  float: left;
  width: 100%;
  height: 100px;
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
  padding: 25px 25px 25px 80px;
  margin: 10px auto;
  height: 30px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
}

ul li:hover label{
    color: #FFFFFF;
}

ul li .check{
  display: block;
  position: absolute;
  border: 5px solid #AAAAAA;
  border-radius: 100%;
  height: 25px;
  width: 25px;
  top: 30px;
  left: 20px;
    z-index: 5;
    transition: border .25s linear;
    -webkit-transition: border .25s linear;
}

ul li:hover .check {
  border: 5px solid #FFFFFF;
}

ul li .check::before {
  display: block;
  position: absolute;
    content: '';
  border-radius: 100%;
  height: 15px;
  width: 15px;
  top: 5px;
    left: 5px;
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

.signature {
    position: fixed;
    margin: auto;
    bottom: 0;
    top: auto;
    width: 100%;
}

.signature p{
    text-align: center;
    font-family: Helvetica, Arial, Sans-Serif;
    font-size: 0.85em;
    color: #AAAAAA;
}

.signature .much-heart{
    display: inline-block;
    position: relative;
    margin: 0 4px;
    height: 10px;
    width: 10px;
    background: #AC1D3F;
    border-radius: 4px;
    -ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}

.signature .much-heart::before, 
.signature .much-heart::after {
      display: block;
  content: '';
  position: absolute;
  margin: auto;
  height: 10px;
  width: 10px;
  border-radius: 5px;
  background: #AC1D3F;
  top: -4px;
}

.signature .much-heart::after {
    bottom: 0;
    top: auto;
    left: -4px;
}

.signature a {
    color: #AAAAAA;
    text-decoration: none;
    font-weight: bold;
}

</style>
<!-- <div class="container">
 -->    
    <h2>Tomorrow I want some:</h2>
    
  <ul>
  <li>
    <input type="radio" id="f-option" name="selector">
    <label for="f-option">Pizza</label>
    
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="s-option" name="selector">
    <label for="s-option">Boyfriend</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  
  <li>
    <input type="radio" id="t-option" name="selector">
    <label for="t-option">Cats</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
</ul>
<!-- </div>
 -->
<div class="signature">
    <p>Made with <i class="much-heart"></i> by <a href="http://codepen.io/AngelaVelasquez">Angela Velasquez</a></p>
</div>