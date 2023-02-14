// Form Submition Code
var $form = $('form#test-form'),
    url = 'https://script.google.com/macros/s/AKfycbwTVyK2PUBa1wys5WBpD-H81tutzxw6-463RWPFkmtv8OVoN573TEZJYpXESCkm9HlHWw/exec'

$('#submit-form').on('click', function(e) {
  e.preventDefault();
  var jqxhr = $.ajax({
    url: url,
    method: "GET",
    dataType: "json",
    data: $form.serializeObject()
  }).success(
    // do something
  );
})