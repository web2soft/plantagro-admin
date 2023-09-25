new Splide( '.splide',{
  type   : 'fade',
  autoplay: true,

  heightRatio: 0.5625,
  cover      : true,

  video: {     
    autoplay: true,
    mute: true,
    disableOverlayUI: true,
    hideControls: true,
    loop: false,

    playerOptions: {
      youtube: {},
      vimeo: {},
      htmlVideo: {
        playsInline: true
      }
      }, 
    },

  speed: 4000,
  interval: 15000,
  perPage: 1,

  rewind: true,
  drag: 'free',
  snap: true, 
  
  arrows: false,             
  pagination: true,                 

  breakpoints: {
    3840: { fixedHeight: 2160, },
    1920:  { fixedHeight: 1080, },
  },
}).mount(window.splide.Extensions);