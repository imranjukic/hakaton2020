new Glide('.galerija .glide', {
  type: 'carousel',
  startAt: 0,
  perView: 3,
  peek: 100,
  autoplay: 3000,
  breakpoints: {
    800: {
      perView: 1,
      peek: 75
    }
  }
}).mount()
