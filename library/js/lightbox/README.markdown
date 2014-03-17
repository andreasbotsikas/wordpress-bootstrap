## Lightbox2
by Lokesh Dhakar | [lokeshdhakar.com](http://www.lokeshdhakar.com) | [twitter.com/lokesh](http://twitter.com/lokesh)

### Information and support
For examples, downloads, and information on using Lightbox, visit the Lightbox2 homepage:
[http://lokeshdhakar.com/projects/lightbox2/](http://lokeshdhakar.com/projects/lightbox2/)

For personal support issues and feature requests, visit the Lightbox forums:
[http://lokeshdhakar.com/forums/](http://lokeshdhakar.com/forums/)

### License
Licensed under the Creative Commons Attribution 2.5 License - http://creativecommons.org/licenses/by/2.5/

* Free for use in both personal and commercial projects.
* Attribution requires leaving author name, author homepage link, and the license info intact.

How to use
Step-by-step instructions

PART 1 - GET SETUP
Download and unzip the latest version of Lightbox from above.
Look inside the js folder to find jquery-1.10.2.min.js and lightbox-2.6.min.js and load both of these files from your html page. Load jQuery first:
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
Look inside the css folder to find lightbox.css and load it from your html page:
<link href="css/lightbox.css" rel="stylesheet" />
Look inside the img folder to find close.png, loading.gif, prev.png, and next.png. These files are used in lightbox.css. By default, lightbox.css will look for these images in a folder called img.
PART 2 - TURN IT ON
Add a data-lightbox attribute to any image link to activate Lightbox. For the value of the attribute, use a unique name for each image. For example:
<a href="img/image-1.jpg" data-lightbox="image-1" title="My caption">image #1</a>
Optional: Set the title attribute if you want to show a caption.
If you have a group of related images that you would like to combine into a set, use the same data-lightbox attribute value for all of the images. For example:
<a href="img/image-2.jpg" data-lightbox="roadtrip">image #2</a>
<a href="img/image-3.jpg" data-lightbox="roadtrip">image #3</a>
<a href="img/image-4.jpg" data-lightbox="roadtrip">image #4</a>
For you long time Lightbox users, don't fret, you can still enable Lightbox by using rel="lightbox". The new data-lightbox approach is preferred though as it is valid html.