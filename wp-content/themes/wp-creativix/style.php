<?php
header('Content-type: text/css');
header("Cache-Control: must-revalidate");

$pattern    =   '/^[^a-z0-9]{6}$/';
if (preg_replace('/[^a-z0-9]/i', '', $_GET['style']) && isset($_GET['style'])) {
$color = $_GET["style"];
} else {
$color = "9d60c1";
}
?>
/*  
Theme Name: WP-Creativix
Theme URI: http://creativix.iwebix.de/
Description: WP-Creativix is a beautifull business & portfolio Wordpress Theme. It has unlimited variations due to the possibility to define a custom color code as highlight color.
It comes with a Portfolio Template already included which may display your latest work with nice Lightbox support. On the Frontpage it has a nice working Javascript Slideshow.
This Theme comes with a Javascript 3-Level Dropdown Menu. Of course there are many more features! Have fun while discovering. (Please use my theme DEMO to see how the Theme looks).
Version: 1.5
Author: Dennis Nissle
Author URI: http://www.iwebix.de/
Tags: white, silver, purple, light, three-columns, two-columns, fixed-width, right-sidebar, left-sidebar, theme-options, purple, front-page-post-form, photoblogging, custom-colors, custom-header, sticky-post, microformats
*/

/* General Styles */


html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
margin: 0;
padding: 0;
border: 0;
outline: 0;
font-size: 100%;
vertical-align: baseline;
background: transparent;
}

body {
line-height: 1;
}

ol, ul {
list-style: none;
}
blockquote, q {
quotes: none;
}

blockquote:before, blockquote:after,
q:before, q:after {
content: '';
content: none;
}

:focus {
outline: 0;
}

ins {
text-decoration: none;
}

del {
text-decoration: line-through;
}

table {
border-collapse: collapse;
border-spacing: 0;
}

a {
color: #<?php echo $color;?>;
text-decoration: none;
}

a:hover {
color: #<?php echo $color;?>;
text-decoration: underline;
}

a:visited {
color: #<?php echo $color;?>;
text-decoration: none;
}

body {
font-size: 12px;
font-family: Tahoma, Geneva, sans-serif;
line-height:18px;
}

blockquote {
color: #CCC;
font-size: 11px;
font-style: italic;
}

h1, h2, h3 {
color: 9d60c1;
}

address, caption, cite, code, dfn, em, strong, th, var {
font-style: normal;
font-weight: normal;
}

table {
border-collapse: collapse;
border-spacing: 0;
}
fieldset, img {
border: 0;
}
caption, th {
text-align: left;
}
q:before, q:after {
content: '';
}
abbr {
border:0;
}

#wrapper {
width:925px;
margin:0 auto;
}
		
#topmenu {
margin-top: 5px;
float: right;
clear: both;
}

#header {
float: left;
width: 925px;
height: 180px;
}

#logo {
float: left;
width: 230px;
}

#logo a {
font-family: Juni;
font-size: 46px;
text-transform: uppercase;
padding-bottom: 18px;
}

#logo a, img {
border: none;
}

/* Navigation Styles */

.navigation {
background: url(images/navbar.jpg) no-repeat;
padding-right:18px;
font-size:12px;
position: relative;
z-index: 6;
width: 689px;
height: 48px;
margin-left: 245px;
margin-top: 130px;
}

#search {
width: 200px;
float: right;
height: 28px;
}

#search form {
width: 200px;
height: 28px;
}

#searchbox {
background: url(images/search.gif) no-repeat top;
width: 144px;
height: 28px;
border: none;
margin-top: 10px;
padding: 5px 3px 0px 15px;
color: #6e6e6e;
}

#searchbutton {
background: url(images/search_btn.gif) no-repeat;
width: 27px;
height: 28px;
border: none;
position: relative;
top: -4px;
left: -12px;
cursor: pointer;
}

#header #navbar {
float:left;
height:50px;
line-height:50px;
padding-left:13px;
}

#navbar, #navbar ul {
margin:0;
padding:0;
list-style-type:none;
position:relative;
line-height:50px; 
z-index:5;
}

#header #navbar a {
height:48px;
display:block;
padding:0 21px;
text-decoration:none;
text-align:center;
line-height:28px; 
outline:none;
float: left;
z-index:35;
position:relative;
color: #6e6e6e;
}

#header #navbar a:hover {
color: #<?php echo $color;?>;
}

#header #navbar ul a {
line-height: 35px; 
}

#header #navbar li {
float:left;
position:relative;
z-index:20;
margin-top:10px;
}

#header #navbar li li {
border-left:none;
margin-top:0;
}

#header #navbar ul {
position:absolute;
display:none;
width:172px;
top:36px;
left:-1px;
background: #f5f5f5;
}

#header #navbar li ul a {
width:130px;
height:auto;
float:left;
text-align:left;
padding:0 21px;
}

#header #navbar ul ul {
top:auto;
}	

#header #navbar li ul ul {
left:172px;
top: 0px;
}

#header #navbar li ul ul a {
border-left:none;
}

#header #navbar a{
color:#888;
}

#header #navbar ul {
border:1px solid #c0c0c0;
border-top:none;
}

#header #navbar li ul a {
border-bottom:1px solid #fff;
border-top:1px solid #c0c0c0;
}

#header #navbar ul a, #header #navbar ul li {
background-color:#f5f5f5;
}

#header #navbar ul a:hover, #header #navbar ul a:focus {
color: #<?php echo $color;?>;
}

#header #navbar .current_page_item a {
}

#header #navbar li:hover ul ul, #header #navbar li:hover ul ul ul,#header  #navbar li:hover ul ul ul ul {
display:none;	
}
#header #navbar li:hover ul, #header #navbar li li:hover ul, #header #navbar li li li:hover ul, #header #navbar li li li li:hover ul {
display:block;
}

/* Slideshow Styles */

#slide-wrapper {
background: url(images/slider-bg.gif) no-repeat;
width: 921px;
height: 365px;
margin-top: 10px;
padding-top:5px;
z-index:1;
margin-left: 10px;
clear: both;
float: left;
}

.featurebox {
width: 921px;
height: 365px;
clear:both;
margin:auto;
}


#image-wrapper {
margin:0 auto;
display:none;
padding:0;
width: 921px;
}

#image-wrapper * {
margin:0;
padding:0;
}
	
#full-image {
position:relative;
padding:0;
width: 860px;
}

.frontslide {
display: none;
}

#text {
float:right;
position:absolute;
top:10px;
width:400px;
height:0;
color:#6e6e6e;
overflow:hidden;
z-index:4;
padding:0px;
left: 490px;
}

#text h3 a {
padding:3px 0 10px 3px;
color: #<?php echo $color;?>;
font-size: 18px;
font-weight:bold;
letter-spacing:-1px;
text-decoration: none;
}

#text h3 a:hover {
text-decoration: underline;
}

#text p {
padding:0 0 5px 3px;
color:#6e6e6e;
float:right;
font-size:12px;
text-align: justify;
margin: 0px;
}

#text p a {
color:#993399;
}

.date {
color:#9d9c9c;
font-size: 10px;
font-style: italic;
}


#image {
width:440px;
height:250px;
}

#image img {
position:absolute;
z-index:2;
width:440px;
height:200px;
left:20px;
top:10px;
border:2px solid #bfbfbf;
}

.imgnav {
position:absolute;
width:25%;
height:180px;
cursor:pointer;
z-index:3;
}

#imgprev {left:0;background:none;}
#imgnext {right:0;background:none;}

#imglink {
position:absolute;
height:150px;
width:100%;
z-index:5;
opacity:.4;
filter:alpha(opacity=40);
}

.linkhover { }

#thumbnails {margin-top:20px;height:38px;}

#arrowleft {
float:left;
width:26px;
height:49px;
background:url(images/left.gif) top center no-repeat;
padding-left:40px;
margin-top: 30px;
z-index:6;
}

#slideleft:hover {}

#arrowright {
float:right;
width:26px;
height:49px;
background:url(images/right.gif) top center no-repeat;
padding-right:40px;
margin-top: 30px;
z-index:7;
}

#slideright:hover {	}

#frontarea {
float:left;
position:relative;
width:785px;
margin-left:3px;
height:100px;
overflow:hidden;
}

html* #frontarea {margin-left:0;}

#fronter {
position:absolute;
left:0;
height:100px;
top: 10px;
}

#fronter img {
cursor:pointer;
border:2px solid #<?php echo $color;?>;
}

/* Frontpage Column Styles */

#big-column {
width: 925px;
margin: 0px auto;
}

#column-top {
background: url(images/top-column.gif) no-repeat;
width: 925px;
height: 9px;
float: left;
margin-left: 7px;
}

#column-content {
background: url(images/center-column.gif) repeat-y;
width: 925px;
float: left;
padding-bottom: 20px;
margin-left: 7px;
}

/* Featured Posts & Articles on Frontpage */

.feat-post {
width: 300px;
padding: 10px 10px 10px 20px;
float: left;
}

.feat-post h2 {
font-size: 18px;
text-decoration: none;
color: #6e6e6e;
}

.feat-post h2 a {
text-decoration: none;
color: #6e6e6e;
}

.feat-post h2 a:hover {
text-decoration: none;
color: #<?php echo $color;?>;
}

.desc h3 {
font-size: 10px;
font-style: italic;
color: #<?php echo $color;?>;
font-weight: normal;
clear:both;
border-bottom: 1px solid #b1b1b1;
}

.feat-post p {
text-align: justify;
color: #6e6e6e;
margin-top: 15px;
}

.feat-post img {
margin-top: 20px;
border: 1px solid #<?php echo $color;?>;
}

.latest-posts {
width: 220px;
padding: 10px 10px 10px 20px;
float: left;
}

.latest-posts h2 {
font-size: 18px;
text-decoration: none;
color: #6e6e6e;
}

.latest-posts h2 a {
text-decoration: none;
color: #6e6e6e;
}

.latest-posts ul {
color: #<?php echo $color;?>;
margin-top: 10px;
list-style-type: disc;
}

.latest-posts ul li {
color: #<?php echo $color;?>;
padding-left: 10px;
margin-bottom: 5px;
}

.latest-posts ul li a {
text-decoration: none;
display: block;
line-height: 15px;
color: #<?php echo $color;?>;
}

.latest-posts ul li a:hover {
text-decoration: underline;
color: #<?php echo $color;?>;
}

.latest-posts p {
text-align: justify;
color: #6e6e6e;
margin-top: 10px;
}


/* Subpage Column Styles */

#sub-column {
width: 925px;
height: auto;
margin: 0px auto;
}

#sub-top {
background: url(images/sub-top.gif) no-repeat;
width: 925px;
height: 42px;
margin-left: 7px;
float: left;
margin-top: 10px;
}

#sub-content {
background: url(images/sub-content.gif) repeat-y;
width: 925px;
float: left;
margin-left: 7px;
}


/* Subpage Content Styles */


.content {
width: 620px;
float: left;
padding: 10px 15px 10px 15px;
}

.content h1 {
font-size: 24px;
color: #8a8a8a;
margin: 20px 0px 20px 0px;
font-weight: normal;
}

.content p {
text-align: justify;
color: #8a8a8a;
}

.post ul {
border-top: 1px solid #CCC;
list-style-type: disc;
list-style-position:inside;
color: #6e6e6e;
margin: 20px 40px 10px 10px;
}

.post ul li {
color: #6e6e6e;
border-bottom: 1px solid #CCC;
padding: 5px;
}

.post ul li a {
color: #<?php echo $color;?>;
}

.post ol {
border-top: 1px solid #CCC;
list-style-type: disc;
list-style-position:inside;
color: #6e6e6e;
margin: 20px 40px 10px 10px;
}

.post ol li {
color: #6e6e6e;
border-bottom: 1px solid #CCC;
padding: 5px;
}

.post ol li a {
color: #<?php echo $color;?>;
}

/* Breadcrumb Navigation Styles */

.breadcrumb {
float: left;
padding: 13px 15px 10px 15px;
color: #8a8a8a;
font-size: 12px;
}

.breadcrumb a {
color: #<?php echo $color;?>;
font-weight: normal;
text-decoration: none;
}

.breadcrumb a:hover {
text-decoration: underline;
}

/* Sidebar Styles */

.sidebar {
width: 220px;
float: left;
margin-left: 30px;
margin-top: 0px;
padding-bottom: 50px;
}

.widgettitle {
color: #8a8a8a;
font-size: 18px;
font-weight: normal;
padding: 20px 0px 10px 0px; 
list-style-type: none;
}

#sidebar ul li {
list-style-type: none;
}

#sidebar ul ul li a {
padding-left: 30px;
}

#sidebar ul ul ul li a {
padding-left: 40px;
}

.textwidget {
margin: 10px 8px 20px 0px;
color: #6e6e6e;
}

.sidebar ul li a {
color: #<?php echo $color;?>;
text-decoration: none;
border-bottom: 1px solid #CCC;
display: block;
padding: 5px;
padding-left: 20px;
background: url(images/listenpunkt.gif) no-repeat left center;
}

.sidebar ul li a:hover {
color: #<?php echo $color;?>;
text-decoration: underline;
}

.posted {
color:#9d9c9c;
font-size: 10px;
font-style: italic;
display: block;
padding-left: 10px;
}

#wp-calendar {
border:1px solid #cccccc;
color:#6e6e6e;
width: 220px;
}

#wp-calendar caption {
color: #8a8a8a;
font-size: 18px;
font-weight: normal;
padding: 0px 0px 10px 0px; 
list-style-type: none;
}

tbody .pad {
background-color:#dddddd;
}

#wp-calendar a {
font-weight:bold;
font-size:12px;
background: none;
padding: 0px;
margin: 0px;
border: none;
}

thead tr th {
width:20px;
height:20px;
text-align:center;
background-color: #<?php echo $color;?>;
color: #FFF;
border:1px solid #cccccc;
padding: 3px; 
}

tbody tr td {
width:20px;
height:20px;
text-align:center;
border:1px solid #cccccc;
}

tfoot #prev {
width:58px;
height:20px;
text-align:left;
background-color:#ffffff;
background: none;
padding-left: 10px;
}

tfoot #next {
width:58px;
height:20px;
text-align:right;
background-color:#ffffff;
background: none;
padding-right: 10px;
}

/* Comment Styles */

.alt {margin: 0;padding: 10px;}

#comment-wrap {
border: 0px;
color: #6e6e6e;
font-size: 11px;
}

#comment-wrap h6 {
font-size: 12px;
margin-bottom: 10px;
}

#comments ol {
list-style-type: none;
line-height: 18px;
border: 0px;
}

#comments ul li {
list-style-type: none;
list-style-image: none;
list-style-position: outside;
border: 0px;
}

.commentlist {
padding: 0;
text-align: justify;
border: none;
}

.comment-body {
margin-bottom: 20px;
}

.reply {
font-size:11px;
clear: both;
float: right;
margin-top: -20px;
}

.commentlist em {
font-size: 11px;
}

.commentlist li {
margin: 5px 0 0px 10px;
padding: 5px 5px 0px 5px;
list-style: none;
border: 0px;
}

.commentlist li ul li { 
margin-right: -5px;
margin-left: 30px;
margin-bottom: 0px;
list-style: none;
border: 0px;
}

.commentlist li li {
background:none;
border:none;
list-style:none;
margin:3px 0 3px 20px;
padding:3px 0;
border: 0px;
}

.commentlist li .avatar {
border:1px solid #ccc;
margin:5px 8px 6px 5px;
float: left;
padding:2px;
width:45px;
height:45px;
}

.commentlist cite, .commentlist cite a {
font-style: normal;
font-size: 11px;
margin-top: 2px;
}

.commentlist p {
font-weight: normal;
line-height: 1.5em;
text-transform: none; 
margin: 10px 5px 5px 65px;
font-size: 11px;
border: none;
}

#commentform p {
}

.commentmetadata {
font-weight: normal; 
margin: 0;
display: block; 
font-size: 10px;
font-style: italic;
}

.commentmetadata a, .commentmetadata a:visited {
color: #6e6e6e;
}

.commentmetadata a:hover{
}

.children { 
padding: 0;
border: none;
}

.thread-alt {
border: none;
}

.thread-even li {
}
.depth-1 {
border: none;
}

.even, .alt li {
margin-bottom: 20px;
}

#respond input {
margin-right: 10px;
font-size: 11px;
color: #8a8a8a;
display: block;
margin-bottom: 5px;
}

#respond h4 {
font-size: 12px;
margin-bottom: 5px;
}

#submit {
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF !important;
padding: 3px 5px 3px 5px;
margin-top: 10px;
text-decoration: none;
font-size: 12px;
cursor: pointer;
}

#submit:hover {
background-color: #FFF;
border: 1px solid #8a8a8a;
color: #8a8a8a !important;
padding: 3px 5px 3px 5px;
text-decoration: none;
}

/* Portfolio Styles */

#portfolio {
margin: 20px 10px 50px 30px;
float: left;
}

.port-pic {
width: 270px;
height: auto;
background-color: #FFF;
border: 1px solid #CCC;
float: left;
margin-bottom: 20px;
margin-right: 20px;
display: block;
}

.port-pic h3 {
font-size: 16px;
font-weight: normal;
color: #<?php echo $color;?>;
margin: 10px 10px 0px 12px;
}

.port-pic h3 a {
text-decoration: none;
color: #<?php echo $color;?>;
}

.port-pic h3 a:hover {
text-decoration: underline;
color: #<?php echo $color;?>;
}

.port-pic p {
text-align: justify;
color: #8a8a8a;
padding: 5px 10px 10px 10px;
font-style: italic;
font-size: 11px;
}

.port-pic img {
border: 2px solid #CCC;
margin: 10px 10px 0px 7px;
text-align: center;
}

/* Blog Styles */

.post {
padding-bottom: 20px;
margin-bottom: 30px;
border-bottom: 1px solid #CCC;
}

.post h1 a {
color: #<?php echo $color;?>;
text-decoration: none;
}

.post h1 a:hover {
color: #<?php echo $color;?>;
text-decoration: underline;
}

.post p {
margin-top: 20px;
}

.blogpic {
text-align: center;
}

.blogpic img {
margin-top: 20px;
border: 2px solid #CCC;
}

.category a {
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF;
padding: 3px 5px 3px 5px;
text-decoration: none;
font-size: 11px;
margin: 0px 5px;
line-height: 25px;
}

.category a:hover {
background-color: #d4d4d4;
border: 1px solid #8a8a8a;
color: #8a8a8a;
padding: 3px 5px 3px 5px;
text-decoration: none;
}


/* Footer Styles */

#footer {
background: url(images/footer-column.gif) no-repeat;
width: 925px;
height: 45px;
margin-bottom: 5px;
clear: both;
padding: 12px 30px 0px 20px;
margin-left: 7px;
}

#footer .copyright {
color: #8a8a8a;
text-transform: uppercase;
}

#footer a {
color: #<?php echo $color;?>;
text-decoration: none;
padding: 0px 2px;
}

#footer p {
color: #6e6e6e;
text-transform: uppercase;
float: left;
}

#footer a img  {
margin: 0px;
padding: 0px;
display: inline;
}

#footer p.footer-right {
color: #6e6e6e;
float: right;
text-transform: none;
margin: 0px 30px 0px 0px;
}

#footer p.footer-right a {
color: #6e6e6e;
text-decoration: none;
clear: both;
padding: 0px 0px 0px 15px;
}

#footer p.footer-right a:hover {
text-decoration: underline;
}

.wordpress-icon {
float: left;
margin-right: 10px;
margin-bottom: 12px;
}

.supported {
color: #CCC;
font-size: 10px;
text-align: center;
width: 925px;
}

.supported a {
color: #CCC;
font-size: 10px;
text-decoration: none;
}

/* Lightbox Images */

#grow {
background:#000 url(images/ajax-loader.gif) no-repeat center center;
border: none;
}

#nycloser {
background: url(images/closed.png) no-repeat center center;
border: none;
}

#next {
background: url(images/next.png) no-repeat center center;
border: none;
}

#next {
background: url(images/next.png) no-repeat center center;
border: none;
}

#prev {
background: url(images/prev.png) no-repeat center center;
border: none;
}

/* Pagenavi */

.wp-pagenavi a, .wp-pagenavi a:link {
padding: 2px 4px 2px 4px; 
margin: 2px;
text-decoration: none;
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF;	
}

.wp-pagenavi a:visited {
padding: 2px 4px 2px 4px; 
margin: 2px;
text-decoration: none;
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF;
}

.wp-pagenavi a:hover {	
background-color: #d4d4d4;
border: 1px solid #8a8a8a;
color: #8a8a8a;
}

.wp-pagenavi a:active {
padding: 2px 4px 2px 4px; 
margin: 2px;
text-decoration: none;
background-color: #d4d4d4;
border: 1px solid #8a8a8a;
color: #8a8a8a;	
}

.wp-pagenavi span.pages {
padding: 2px 4px 2px 4px; 
margin: 2px 2px 2px 2px;
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF;
}

.wp-pagenavi span.current {
padding: 2px 4px 2px 4px; 
margin: 2px;
font-weight: bold;
background-color: #d4d4d4;
border: 1px solid #8a8a8a;
color: #8a8a8a;
}

.wp-pagenavi span.extend {
padding: 2px 4px 2px 4px; 
margin: 2px;	
border: 1px solid #000000;
color: #000000;
background-color: #FFFFFF;
}

