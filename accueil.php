<?php

include('connexionBD.php');

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>VR - Formations</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/aframe.min.js"></script>
    <script src="js/aframe-event-set-component.js"></script>
    <meta name="description" content="Panorama — A-Frame">
    <script src="https://npmcdn.com/aframe-animation-component@3.0.1"></script>
    <script src="https://npmcdn.com/aframe-layout-component@3.0.1"></script>
    <script src="https://npmcdn.com/aframe-template-component@3.0.1"></script>
    <script src="js/set-image.js"></script>
    <script src="js/update-raycaster.js"></script>


    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css" media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="js/aframe.min.js"></script>


    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<a-scene>
    <a-assets>
        <img id="city" crossorigin="anonymous" src="img/test.jpg">

        <img id="city-thumb" crossorigin="anonymous" src="img/formation2.jpg">
        <img id="cu bes-thumb" crossorigin="anonymous" src="img/formation1.png">
        <!--<img id="cubes" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/cubes.jpg">-->


        <!-- Image link template to be reused. -->
        <script id="link" type="text/nunjucks">
          <a-plane class="link" height="1" width="1"
            material="shader: flat; src: {{ thumb }}"
            event-set__1="_event: mousedown; scale: 1 1 1"
            event-set__2="_event: mouseup; scale: 1.2 1.2 1"
            event-set__3="_event: mouseenter; scale: 1.2 1.2 1"
            event-set__4="_event: mouseleave; scale: 1 1 1"
            set-image="on: click; target: #image-360; src: {{ src }}"
            sound="on: click; src: #click-sound"
            update-raycaster="#cursor"></a-plane>

        </script>
    </a-assets>

    <!-- 360-degree image. -->
    <a-sky id="image-360" radius="10" src="#city"></a-sky>

    <!-- Image links. -->
    <a-entity id="links" class="link1"  layout="type: line; margin: 1.5" position="-3 1 -2" rotation="0 60 -5">
        <a-entity template="src: #link" data-src="#cubes" data-thumb="#cubes-thumb"></a-entity>
    </a-entity>

    <a-entity id="links" class="link2" layout="type: line; margin: 1.5" position="3 1 -2" rotation="0 -60 -5">
        <a-entity template="src: #link" data-src="#city" data-thumb="#city-thumb"></a-entity>
    </a-entity>

    <!-- <a-entity id="links" layout="type: line; margin: 1.5" position="4 3 -4">
         <a-entity template="src: #link" data-src="#sechelt" data-thumb="#sechelt-thumb"></a-entity>
     </a-entity>-->

    <!-- Camera + cursor. -->
    <a-entity camera look-controls>
        <a-cursor id="cursor"
                  animation__click="property: scale; startEvents: click; from: 0.1 0.1 0.1; to: 1 1 1; dur: 150"
                  animation__fusing="property: fusing; startEvents: fusing; from: 1 1 1; to: 0.1 0.1 0.1; dur: 1500"
                  event-set__1="_event: mouseenter; color: springgreen"
                  event-set__2="_event: mouseleave; color: black"
                  raycaster="objects: .link"></a-cursor>
    </a-entity>
</a-scene>

<script>
    $(document).ready(function() {
        $(".link1").click(function() {
            $(location).attr('href', 'formation1.php');
        });

        $(".link2").click(function() {
            $(location).attr('href', 'formation2.php');
        });
    })

</script>

</body>
</html>
