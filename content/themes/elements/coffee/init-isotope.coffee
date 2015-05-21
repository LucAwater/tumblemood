if $('.isotope').length > 0
  masonry = $('.isotope_masonry')
  
  Pace.on 'done', ->
    $('main').imagesLoaded(->
      masonry.isotope {
        layoutMode: 'masonry'
      }
      return
    )