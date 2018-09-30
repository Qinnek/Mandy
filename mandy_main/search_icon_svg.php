<<?php echo "?" ?>xml version="1.0" standalone="no"<?php echo "?" ?>><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1537710659565" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="767" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25"><defs><style type="text/css"></style></defs><path d="M966.72 906.357333l-240-240A382.805333 382.805333 0 0 0 810.666667 426.666667C810.666667 214.613333 638.72 42.666667 426.666667 42.666667S42.666667 214.613333 42.666667 426.666667s171.946667 384 384 384c90.666667 0 173.984-31.466667 239.690666-83.946667l240 240A42.666667 42.666667 0 0 0 936.533333 979.2c10.890667 0 21.866667-4.16 30.186667-12.48a42.752 42.752 0 0 0 0-60.362667zM426.666667 725.333333c-164.949333 0-298.666667-133.717333-298.666667-298.666666s133.717333-298.666667 298.666667-298.666667 298.666667 133.717333 298.666666 298.666667-133.717333 298.666667-298.666666 298.666666z" fill="<?php echo color(); ?>" p-id="768"></path></svg>
<?php
header('Content-Type:image/svg+xml');
function color() {
  if ($_GET["color"] == "black"){
    return "#333";
  }else {
    return "#fff";
  }
}
?>
