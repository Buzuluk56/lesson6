<?php
    require 'vendor/autoload.php';

    use Intervention\Image\ImageManagerStatic as Image;

    $source =  'ava.jpg';
    $result =  'ava_new.jpg';


    $image = Image::make($source)->resize(200,null,function ($image){
        $image->aspectRatio();})
        ->rotate(45)
        ->save($result,80);
    watermark($image);
    $image = Image::make($image)->save($result,80);



   function watermark (\Intervention\Image\Image $image)
   {
       $image->text(
           "LoftSchool.com",
           $image->width() / 2,
           $image->height() / 2,
           function ($font){
               $font->color(array(255,0,0,0.5));
               $font->align('right');
               $font->valign('center');
           });
   }

