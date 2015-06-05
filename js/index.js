$('#puppies').click(function() {
  $('div').html("<a href='test.html'> Puppies </a><br> <a href='test2.html'> Lions</a><br><a href='test3.html'> Tigers</a>");
  
});

$('#kittens').click(function() {
  $('div').html('Kittens');
});


$('#aardvark').click(function() {
  $('div').html('Aardvark');
});
  
/** --OR-- you could get the images alt attribute and print that out 

$('#aardvark').click(function() {
  var alt = $(this).attr('alt');
  $('div').html(alt);
});
**/