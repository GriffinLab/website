<?php include 'header.php';?> 

<div class="six columns" id="about">
  <h5>BIFs</h5>
  <p>Basic Image Features (BIFs) are a significant contribution by this group. Computation of BIFs consists in classifying each pixel of an image into one of seven categories depending on local structures and symmetries, creating a primal sketch of the input image. BIFs are computed efficiently based on the responses to a bank of Derivative-of-Gaussian (DtG) filters. They can be used to encode compact representations of images (e.g. 7-bin histograms).

Please refer to <a href="http://link.springer.com/article/10.1007%2Fs11263-009-0315-0"><em>Using Basic Image Features for Texture Classification</em></a> [Crosier and Griffin, 2010] for a detailed description.</p>
  <h5>Implementations</h5>
  <p>Please visit the <a href="https://github.com/GriffinLab/bifs">GitHub repository</a> for implementations and examples of BIFs, oBIFs (oriented BIFs) and oBIF histograms (binned histograms of oBIFs).</p>
</div>
<div class="six columns right" id="group-image">
  <img src="images/obif_handwriting.png" />
</div>

<?php include 'footer.php';?>
