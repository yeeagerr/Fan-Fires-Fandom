import { recentcardimg, sidebar } from "./array.js";

function recentimgfunc() {
  let htmlrecenttimg = "";
  let recentimgcount = 0;

  recentcardimg.forEach((recentfoto) => {
    htmlrecenttimg += `

  <div class="recent-card">
  <div class="recentimg${(recentimgcount += 1)}" style="background-image: url(${
      recentfoto.foto
    });">
    <div class="type">
        <p>GAMES</p>
    </div>
    </div>
    <p
    style="
        font-size: 20px;
        font-weight: bold;
        color: white;
        margin-left: 10px;
        letter-spacing: 1px;
        margin-top: 10px;
        cursor: pointer;
    "
    >
    ${recentfoto.txt};
</p>
  </div>

  `;
  });

  document.querySelector(".contentwiki2").innerHTML = htmlrecenttimg;
}
recentimgfunc();

function sidebarfunc() {
  let counter = 1;
  let counter2 = 1;
  let htmlcreate = "";

  sidebar.forEach((sidebarinfo) => {
    htmlcreate += `
    <a href="${sidebarinfo.id}" class="games-icon${counter++} icon games">
    <i class="${sidebarinfo.iclass}">
      <div class="showup${counter2++}">
        <div class="content">
          <p
            style="
              font-family: 'Poppins', sans-serif;
              font-family: 'Roboto Slab', serif;
              letter-spacing: 1px;
              margin-top: 15px;
              margin-left: 15px;
            "
          >
            <i class="fa fa-book" aria-hidden="true"></i>

            Informasi ${sidebarinfo.name} populer
          </p>

          <div class="games-card">
            <div class="gcard">
              <img
              ${sidebarinfo.foto1}
                alt=""
              />
              <p>${sidebarinfo.nama1}</p>
            </div>
            <div class="gcard">
              <img
              ${sidebarinfo.foto2}
                alt=""
              />
              <p>${sidebarinfo.nama2}</p>
            </div>
            <div class="gcard">
              <img
              ${sidebarinfo.foto3}
                alt=""
              />
              <p>${sidebarinfo.nama3}</p>
            </div>
            <div class="gcard">
              <img
              ${sidebarinfo.foto4}
                alt=""
              />
              <p>${sidebarinfo.nama4}</p>
            </div>
            <div class="gcard">
              <img
              ${sidebarinfo.foto5}
                alt=""
              />
              <p>${sidebarinfo.nama5}</p>
            </div>
            <div class="gcard">
              <img
              ${sidebarinfo.foto6}
                alt=""
              />
              <p>${sidebarinfo.nama6}</p>
            </div>
            <div class="gcard">
              <img
              ${sidebarinfo.foto7}
                alt=""
              />
              <p>${sidebarinfo.nama7}</p>
            </div>
            <div class="gcard">
              <img
              ${sidebarinfo.foto8}
                alt=""
              />
              <p>${sidebarinfo.nama8}</p>
            </div>
            <div class="gcard">
              <img
              ${sidebarinfo.foto9}
                alt=""
              />
              <p>${sidebarinfo.nama9}</p>
            </div>
          </div>
        </div>

        <!--- Segitiga pada navigasi -->

        <div
          style="
            position: absolute;
            top: ${sidebarinfo.top};
            left: -16px;
            transform: rotate(270deg);
            height: 0px;
            width: 0px;
            border-bottom: solid 20px blue;
            border-left: solid 10px transparent;
            border-right: solid 10px transparent;
          "
        ></div>
      </div>
    </i>
  </a>
  <p>${sidebarinfo.name}</p>
    `;
  });

  let realhtml = `
  <a href="#awal">
  <i class="fa-solid fa-fire" style="font-size: 65px"></i>
</a>
<p style="text-align: center; margin-bottom: 10px">Fan Fires Fandom</p>
<a href="#input">
  <i class="fa-solid fa-magnifying-glass search-btn"></i>
</a>

${htmlcreate}

<a class="games-icon5 icon">
  <i class="fa-solid fa-video"></i>
</a>
<p>Video</p>

<i class="fa-solid fa-book "></i>
<p>Literasi</p>
  `;

  document.querySelector(".top").innerHTML = realhtml;
}

window.addEventListener("DOMContentLoaded", () => {
  console.log("website loaded");
  sidebarfunc();
  recentimgfunc();
});
