import Swiper from "swiper";
import "swiper/css";
import { FreeMode } from "swiper/modules";

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".slider")) {
    const opciones = {
        slidesPerView:1,
        spaceBetween:15,
        FreeMode:true,
        breakpoints:{
            640:{
                slidesPerView:2,
            },
            1024:{
                slidesPerView:3,
            },
            1200:{
                slidesPerView:4,
            }
        }
    };

    new Swiper(".slider", opciones);
  }
});
