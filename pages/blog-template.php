<?php
$page_title = "About Us | Famous Tours India – Best Travel Agency in Jaipur & Rajasthan";
$page_description = "Learn about Famous Tours India (FTI Travel), a leading travel agency in Jaipur offering reliable taxi services, customized Rajasthan tour packages, and city sightseeing with expert support.";
$page_keywords = "about Famous Tours India, travel agency Jaipur, Rajasthan tour experts, Jaipur city tours, best taxi service Jaipur, travel company India, Rajasthan travel agency, FTI Travel Jaipur";
$page_canonical = "https://www.famoustoursindia.com/about.php";


ob_start();
$custom_css = '
 <style>
    .smooth {
      transition: box-shadow 0.3s ease-in-out;
    }

    ::selection {
      background-color: aliceblue
    }

    :root {
      ::-webkit-scrollbar {
        height: 10px;
        width: 10px;
      }

      ::-webkit-scrollbar-track {
        background: #efefef;
        border-radius: 6px
      }

      ::-webkit-scrollbar-thumb {
        background: #d5d5d5;
        border-radius: 6px
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #c4c4c4
      }
    }

    /*scroll to top*/
    .scroll-top {
      position: fixed;
      z-index: 50;
      padding: 0;
      right: 30px;
      bottom: 100px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(15px);
      height: 46px;
      width: 46px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      transition: all .4s ease;
      border: none;
      box-shadow: inset 0 0 0 2px #ccc;
      color: #ccc;
      background-color: #fff;
    }

    .scroll-top.is-active {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .scroll-top .icon-tabler-arrow-up {
      position: absolute;
      stroke-width: 2px;
      stroke: #333;
    }

    .scroll-top svg path {
      fill: none;
    }

    .scroll-top svg.progress-circle path {
      stroke: #333;
      stroke-width: 4;
      transition: all .4s ease;
    }

    .scroll-top:hover {
      color: var(--ghost-accent-color);
    }

    .scroll-top:hover .progress-circle path,
    .scroll-top:hover .icon-tabler-arrow-up {
      stroke: var(--ghost-accent-color);
    }
  </style>
';
?>

<!--Title-->
<div class="text-center pt-16 md:pt-32">
  <p class="text-sm md:text-base text-green-500 font-bold"><?= $data['date']; ?></p>
  <h1 class="font-bold break-normal text-3xl md:text-5xl"><?= $data['title']; ?></h1>
</div>

<!--image-->
<div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded" style="background-image:url('https://images.unsplash.com/photo-1763386840769-8484a2a02442?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 75vh;"></div>

<!--Container-->
<div class="container max-w-5xl mx-auto -mt-32">
  <div class="mx-0 sm:mx-6">
    <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
      <?= $data['content']; ?>
    </div>
  </div>
</div>

<script>
  /* Progress bar */
  //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
  var h = document.documentElement,
    b = document.body,
    st = 'scrollTop',
    sh = 'scrollHeight',
    progress = document.querySelector('#progress'),
    scroll;
  var scrollpos = window.scrollY;
  var header = document.getElementById("header");

  document.addEventListener('scroll', function() {

    /*Refresh scroll % width*/
    scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
    progress.style.setProperty('--scroll', scroll + '%');

    /*Apply classes for slide in bar*/
    scrollpos = window.scrollY;

    if (scrollpos > 100) {
      header.classList.remove("hidden");
      header.classList.remove("fadeOutUp");
      header.classList.add("slideInDown");
    } else {
      header.classList.remove("slideInDown");
      header.classList.add("fadeOutUp");
      header.classList.add("hidden");
    }

  });

  // scroll to top
  const t = document.querySelector(".js-scroll-top");
  if (t) {
    t.onclick = () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      })
    };
    const e = document.querySelector(".scroll-top path"),
      o = e.getTotalLength();
    e.style.transition = e.style.WebkitTransition = "none", e.style.strokeDasharray = `${o} ${o}`, e.style.strokeDashoffset = o, e.getBoundingClientRect(), e.style.transition = e.style.WebkitTransition = "stroke-dashoffset 10ms linear";
    const n = function() {
      const t = window.scrollY || window.scrollTopBtn || document.documentElement.scrollTopBtn,
        n = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight),
        s = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
      var l = o - t * o / (n - s);
      e.style.strokeDashoffset = l
    };
    n();
    const s = 100;
    window.addEventListener("scroll", (function(e) {
      n();
      (window.scrollY || window.scrollTopBtn || document.getElementsByTagName("html")[0].scrollTopBtn) > s ? t.classList.add("is-active") : t.classList.remove("is-active")
    }), !1)
  }
</script>



<?php
$page_content = ob_get_clean();
include ROOT_PATH . '/layouts/main.php';
?>
