new Glide('.ostali-partneri .glide', {
  type: 'carousel',
  startAt: 0,
  perView: 5,
  autoplay: 3000,
  breakpoints: {
    800: {
      perView: 3,
    }
  }
}).mount()

