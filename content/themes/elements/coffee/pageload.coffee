$ ->
  Pace.on 'done', ->
    $('body').removeClass "is-loading"
    
    $('.pace').remove()
    
    x = 0;
    delay = (ms, func) -> setTimeout func, ms
    
    $('main').imagesLoaded(->
      $('ul.isotope li').each (index, element) ->
        x = x + 80
        delay x, -> $(element).addClass "is-animated"
        console.log x
    )