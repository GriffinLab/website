<?php include 'header.php';?> 

<div class="columns" id="about">
  <h5>Basic Image Features</h5>
<p>Basic Image Features (BIFs) are a significant contribution by this group. Computation of BIFs consists in classifying each pixel of an image into one of seven categories depending on local structures and symmetries, creating a primal sketch of the input image. BIFs are computed efficiently based on the responses to a bank of Derivative-of-Gaussian (DtG) filters. </p>

<p>The computation of BIFs is controlled by a scale parameter (<i><b>&sigma;</b></i>, the standard deviation of the DtG filters) and a threshold parameter (<i><b>&epsilon;</b></i>) dictating the fraction of an image that should be considered as 'flat' (i.e. without a particular structure).</p>

<p><img src="images/BIFs.png" /></p>

<p>BIFs can be used to encode compact representations of images (e.g. 7-bin histograms). The seven categories can be extended to 23 by quantization of the non-rotationally symetric features. Those 23 features are termed oriented Basic Image Features, or oBIFs.</p>

<h5>Implementations</h5>  
<p>Please visit the <a href="https://github.com/GriffinLab/bifs">GitHub repository</a> for implementations and examples of BIFs, oBIFs (oriented BIFs) and oBIF histograms (binned histograms of oBIFs).</p>

<h5>References</h5>
<p>BIFs and oBIFs have been employed for a wide variety of applications. Here you will find links to relevant papers ordered by the type of applications.</p>
<h6>Background</h6>
<p>
Griffin, L. D., & Lillholm, M. (2010). <i>Symmetry sensitivities of derivative-of-Gaussian filters</i>. IEEE Transactions on Pattern Analysis and Machine Intelligence, 32(6), 1072-1083 [<a href="http://ieeexplore.ieee.org/xpls/abs_all.jsp?arnumber=4906999&tag=1">LINK</a>]
<br>
Griffin, L. D., Lillholm, M., Crosier, M., & van Sande, J. (2009). <i>Basic Image Features (BIFs) arising from local symmetry type</i>. 2009 Scale Space and Variational Methods in Computer Vision LNCS vol. 5567:343-355. [<a href="http://link.springer.com/chapter/10.1007%2F978-3-642-02256-2_29#page-1">LINK</a>]
<br>
Griffin, L. D. (2007). <i>The 2nd-order local-image-structure solid</i>. IEEE Transaction on Pattern Analysis and Machine Intelligence 29(8), 1355-1366 [<a href="https://www.google.co.uk/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0CCMQFjAA&url=http%3A%2F%2Fieeexplore.ieee.org%2Fiel5%2F34%2F4250455%2F04250462.pdf%3Farnumber%3D4250462&ei=88IRVODEEpPkas2ZgOgO&usg=AFQjCNEeL1mnAgKWgRmmvG-M-mqMiXvB1A&sig2=Es9XDONEVjMKWTnX1Oaa6w&bvm=bv.74894050,d.d2s">LINK</a>]
</p>
<h6>Texture classification</h6>
<p>
Newell, A. J., Morgan, R. M., Griffin, L. D., Bull, P. A., Marshall, J. R., & Graham, G. (2012). <i>Automated texture recognition of quartz sand grains for forensic applications</i>. Journal of Forensic Sciences, 57(5), 1285-9 [<a href='http://onlinelibrary.wiley.com/doi/10.1111/j.1556-4029.2012.02126.x/abstract'>LINK</a>]
<br>
Crosier, M., & Griffin, L. D. (2010). <i>Using Basic Image Features for Texture Classification</i>. International Journal of Computer Vision, 88(3), 447-460 [<a href='http://link.springer.com/article/10.1007%2Fs11263-009-0315-0'>LINK</a>]
</p>
<h6>Appearance learning and object detection </h6>
<p>
Jaccard, N., Rogers, T.W., & Griffin L.D. (2014). <i>Automated detection of cars in transmission X-ray images of freight containers</i>. 11th IEEE International Conference on Advanced Video and Signal-based Surveillance, 2nd Workshop on Vehicle Retrieval in Surveillance
<br>
Griffin, L. D., Wahab, M. H., & Newell, A. J. (2013). <i>Distributional learning of appearance. PloS One, 8(2), e58074</i> [<a href="http://www.plosone.org/article/info%3Adoi%2F10.1371%2Fjournal.pone.0058074">LINK</a>]
</p>
<h6>Character recognition and handwritting analysis</h6>
<p>
Newell, A. J., & Griffin, L. D. (2014). <i>Writer identification using oriented Basic Image Features and the Delta encoding</i>. Pattern Recognition, 47(6), 2255 2265 [<a href="http://www.sciencedirect.com/science/article/pii/S0031320313005153">LINK</a>]
<br>
Newell, A. J., & Griffin, L. D. (2011). <i>Natural Image Character Recognition Using Oriented Basic Image Features</i>. 2011 International Conference on Digital Image Computing: Techniques and Applications, 191-196 [<a href="http://ieeexplore.ieee.org/xpl/articleDetails.jsp?arnumber=6128681">LINK</a>]
</p>
<h6>Microscopy image segmentation and analysis</h6>
<p>
Jaccard, N., Szita, N., & Griffin, L. D. (2014). <i>Trainable segmentation of phase contrast microscopy images based on local Basic Image Features histograms</i>. In Medical Image Understanding and Analysis (pp. 47-52). British Machine Vision Association. [<a href="http://www.city.ac.uk/__data/assets/pdf_file/0014/225050/Paper23.pdf">LINK</a>]
<br>
Jaccard, N., Macown, R. J., Super, A., Griffin, L. D., Veraitch, F. S., & Szita, N. (2014). <i>Automated and Online Characterization of Adherent Cell Culture Growth in a Microfabricated Bioreactor</i>. Journal of Laboratory Automation (In press) [<a href="http://jla.sagepub.com/content/early/2014/03/31/2211068214529288.abstract">LINK</a>]
<br>
Jaccard, N., Griffin, L. D., Keser, A., Macown, R. J., Super, A., Veraitch, F. S., & Szita, N. (2014). <i>Automated method for the rapid and precise estimation of adherent cell culture characteristics from phase contrast microscopy images</i>. Biotechnology and Bioengineering, 111(3), 504-17 [<a href="http://onlinelibrary.wiley.com/doi/10.1002/bit.25115/abstract">LINK</a>]
<br>
Reichen, M., Macown, R. J., Jaccard, N., Super, A., Ruban, L., Griffin, L. D., Veraitch, F.S., & Szita, N. (2012). <i>Microfabricated Modular Scale-Down Device for Regenerative Medicine Process Development</i>. PLoS ONE, 7(12), e52246 [<a href="http://www.plosone.org/article/info%3Adoi%2F10.1371%2Fjournal.pone.0052246">LINK</a>]
</p>
</div>

<?php include 'footer.php';?>
