<div class="w3-main" style="margin-left:0px"> 
  
  <footer class="w3-theme w3-teal " style="margin-top:75px;padding-right:38px"> 
    <p class="w3-center">Powered by <a href="https://codeigniter.com/" title ="CodeIgniter 4" target="_blank">W3.CSS</a> 
    </p>
  
  <!--display the number of visitor hits to the home page-->
  <?php if(isset($counter)) : ?>
  <?php foreach ($counter as $count) : ?>
  
  <div class="w3-center w3-mobile"><?=$count['counter'].' '.'Visits';?></div>
  
  <?php endforeach ?>
  <?php endif;?>
  </footer>
</div>

<script>
// Script to open and close the sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>
