<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="146" height="173"
  viewBox="0 0 146 173" class="svg-slider-arrow" id="svgObject-2">
  <defs>
    <style>
      body.isIE .filler-next {
        display: none;
      }

      .filler-next {
        stroke-dasharray: 240;
        stroke-dashoffset: 0;
        transition: all 0.5s ease;
        -webkit-animation: dash-fill linear forwards;
        animation: dash-fill linear forwards;
        animation-iteration-count: 1;
        animation-duration: 0.5s;
        opacity: 0;
      }

      @-webkit-keyframes dash-empty {
        from {
          stroke-dashoffset: 240;
        }

        to {
          stroke-dashoffset: 0;
        }
      }

      .hover-fill-item-right:hover+.filler-next {
        transition: all 0.5s ease;
        -webkit-animation: dash-empty linear forwards;
        animation: dash-empty linear forwards;
        animation-iteration-count: 1;
        animation-duration: 1s;
        opacity: 1;
      }

      @-webkit-keyframes dash-fill {
        from {
          stroke-dashoffset: 0;
        }

        to {
          stroke-dashoffset: 240;
        }
      }
    </style>
    <filter id="icon_arrow_gallery_loader_web-a" width="271.4%" height="185.7%" x="-85.7%" y="-42.9%"
      filterUnits="objectBoundingBox">
      <feOffset in="SourceAlpha" result="shadowOffsetOuter1" />
      <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="2" />
      <feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0" />
      <feMerge>
        <feMergeNode in="shadowMatrixOuter1" />
        <feMergeNode in="SourceGraphic" />
      </feMerge>
    </filter>
    <polygon id="icon_arrow_gallery_loader_web-b" points="0 0 7 0 7 14 0 14" />
    <rect id="icon_arrow_gallery_loader_web-r" class="next icon_arrow_loader_slick" width="70" height="70"
      x="5" y="5" rx="35" />
    <filter id="icon_arrow_gallery_loader_web-d" width="378.6%" height="378.6%" x="-137.9%" y="-117.9%"
      filterUnits="objectBoundingBox">
      <feOffset dx="1" dy="15" in="SourceAlpha" result="shadowOffsetOuter1" />
      <feMorphology in="SourceAlpha" radius="1.5" result="shadowInner" />
      <feOffset dx="1" dy="15" in="shadowInner" result="shadowInner" />
      <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out" result="shadowOffsetOuter1" />
      <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="30" />
      <feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0" />
    </filter>
  </defs>
  <g fill="none" fill-rule="evenodd" transform="rotate(-90 81.5 61.5)">
    <g filter="url(#icon_arrow_gallery_loader_web-a)" transform="rotate(90 5 41)">
      <mask id="icon_arrow_gallery_loader_web-c" fill="#fff">
        <use xlink:href="#icon_arrow_gallery_loader_web-b" />
      </mask>
      <path fill="#FFF" d="M1.42458261,13 L0,11.555896 L4.98603915,6.50051064 L0,1.4451253 L1.42458261,0 L6.41062176,5.05640663 C7.19645941,5.85199152 7.19645941,7.14902977 6.41062176,7.94461466 L1.42458261,13 Z"
        mask="url(#icon_arrow_gallery_loader_web-c)" />
    </g>
    <g transform="rotate(-83 40 40)">
      <use class="hover-fill-item-right next icon_arrow_loader_slick" fill="#000" filter="url(#icon_arrow_gallery_loader_web-d)"
        xlink:href="#icon_arrow_gallery_loader_web-r" />
      <rect class="fill-load filler-next" width="68.5" height="68.5" x="5.75" y="5.75" stroke="#FFF"
        stroke-width="1.5" rx="34.25" />
    </g>
  </g>
</svg>