$(document).ready(
  function(){
    $('nav li:eq(0)').click(
      function(event){
        event.preventDefault();
        $('#results h3').text('index.php/api/user/:number');
        $('#results p').load('index.php/api/user/1');
    });
    
    $('nav li:eq(1)').click(
      function(event){
        event.preventDefault();
        $('#results h3').text('index.php/api/admin/count');
        $('#results p').load('index.php/api/admin/count');
      
    });
    $('nav li:eq(2)').click(
      function(event){
        event.preventDefault();
        $('#results h3').text('index.php/api/admin/today');
        $('#results p').load('index.php/api/admin/today');
      
    });
    $('nav li:eq(3)').click(
      function(event){
        event.preventDefault();
        $('#results h3').text('index.php/api/admin/all');
        $('#results p').load('index.php/api/admin/all');
      
    });
    $('nav li:eq(4)').click(
      function(event){
        event.preventDefault();
        $('#results h3').text('index.php/api/admin/top10');
        $('#results p').load('index.php/api/admin/top10');
      
    });
    $('nav li:eq(5)').click(
      function(event){
        event.preventDefault();
        $('#results h3').text('index.php/api/admin/top10Improved');
        $('#results p').load('index.php/api/admin/top10Improved');
      
    });
  }
);