// JavaScript Document
 $(function(){
   var path = location.pathname.substring(1);
   if ( path )
     $('.tabs a[href$="' + path + '"]').attr('class', 'active');
 });