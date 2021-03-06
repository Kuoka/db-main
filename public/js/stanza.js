jQuery(function($) {
  var RE = /^data-stanza-(.+)/

  $('[data-stanza]').each(function(index) {
    var $this  = $(this),
        data   = $this.data(),
        params = {};

    $.each(this.attributes, function(i, attr) {
      var key = (RE.exec(attr.name) || [])[1]

      if (key) {
        params[key.replace('-', '_')] = attr.value;
      }
    });

    var src = data.stanza + '?' + $.param(params);


    setTimeout(function(){
      $("<iframe></iframe>")
        .addClass('unload')
        .attr({src: src, frameborder: 0, id: 'stanza-frame-' + index, name: 'stanza-frame-' + index, class: 'autoHeight'})
        .width(data.stanzaWidth || '100%')
        .height(data.stanzaHeight)
        .appendTo($this)
        .load(function(){
          $(this).removeClass("unload");
        });
      }, index * 500);

    setInterval(function(){
	$('iframe.autoHeight').each(function(){
	    var D = $(this).get(0).contentWindow.document;
            if(D.body){
 	      var innerHeight = Math.max( D.body.offsetHeight, D.body.clientHeight );
 	      $(this).removeAttr("height").css('height', innerHeight + 'px');
            }
	});
    }, 10);


  });

  window.onmessage = function(e) {
    if(e.data){
    var message = JSON.parse(e.data),
        iframe  = $('#' + message.id);

    if (iframe.attr('style').search(/height/) === -1) {
      iframe.height(message.height);
    }
    }
  };
});

