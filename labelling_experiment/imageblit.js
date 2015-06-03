var img = new Image();

img.onload = function() {
  setTimeout(drawToCanvas, 10, this);
}

function drawToCanvas(src_img) {
  var dst_canvas = document.getElementById('canvas');

  var src_canvas = document.createElement('canvas');
  src_canvas.width = src_img.width;
  src_canvas.height = src_img.height;

  var src_ctx = src_canvas.getContext('2d');
  src_ctx.drawImage(src_img, 0, 0);
  var src_data = src_ctx.getImageData(0, 0, src_img.width, src_img.height).data;

  var scale = Math.max(1.0, Math.round(dst_canvas.height / src_canvas.height));
  dst_canvas.width = src_img.width * scale;
  dst_canvas.height = src_img.height * scale;

  var dst_ctx = dst_canvas.getContext('2d');

  var dst_imgdata = dst_ctx.createImageData(dst_canvas.width, dst_canvas.height);
  var dst_data = dst_imgdata.data;

  var src_p = 0;
  var dst_p = 0;
  for (var y = 0; y < src_img.height; ++y) {
    for (var i = 0; i < scale; ++i) {
      for (var x = 0; x < src_img.width; ++x) {
        var src_p = 4 * (y * src_img.width + x);
        for (var j = 0; j < scale; ++j) {
          var tmp = src_p;
          var r = src_data[tmp++];
          var g = src_data[tmp++];
          var b = src_data[tmp++];
          var a = src_data[tmp++];
          var gray = (0.299 * r) + (0.587 * g) + (0.114 * b);
          dst_data[dst_p++] = gray;
          dst_data[dst_p++] = gray;
          dst_data[dst_p++] = gray;
          dst_data[dst_p++] = a;
        }
      }
    }
  }

  dst_ctx.putImageData(dst_imgdata, 0, 0);
  document.getElementById('image-holder').height = dst_canvas.height;

};

img.src = document.getElementById('canvas').getAttribute('img_src');
