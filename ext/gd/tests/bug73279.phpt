--TEST--
Bug #73279 (Integer overflow in gdImageScaleBilinearPalette())
--SKIPIF--
<?php
if (!extension_loaded('gd')) die('skip gd extension not available');
if (!GD_BUNDLED && version_compare(GD_VERSION, '2.2.4', '<')) {
    die('skip only for bundled libgd or external libgd >= 2.2.4');
}
?>
--FILE--
<?php
$src = imagecreate(100, 100);
imagecolorallocate($src, 255, 255, 255);
$dst = imagescale($src, 200, 200, IMG_BILINEAR_FIXED);
printf("color: %x\n", imagecolorat($dst, 99, 99));
?>
===DONE===
--EXPECT--
color: ffffff
===DONE===
